<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment extends MY_Controller 
{
	//private $connection;
        public function __construct(){
            parent::__construct();
            $this->load->model('payment_model');
            $this->load->library('paypal_lib');
            $page = '';
        }
        public function index(){
            $data=new stdClass();            
            $charge = 0;//$this->get_Charge();
            
            $order_no = $this->create_order_no();//"ORDER_".uniqid();
            $vendorid = $this->session->userdata('provider_cart')['vndor'];            
            $vendor_services = $this->payment_model->SelectSingleRecord('vendor_services','*',array("vendor_id"=>$vendorid),'id asc');
            $amt = $vendor_services->charges;
            $amt = $amt + $charge;
            
            $udata['order_no'] = $order_no;
            $udata['amount'] = $amt;
            $udata['payment_type'] = $this->input->post('payment_method');
            $udata['user_id'] = $this->session->userdata('user_id');
            
            if($this->input->post('payment_method') == 'paypal'){
                    if($lastid = $this->payment_model->InsertRecord('order',$udata)){
                        $odata['servicename'] = json_encode($this->session->userdata('services')->title);
                        $odata['services'] = ($this->session->userdata('service_cart')) ? json_encode($this->session->userdata('service_cart')) : json_encode($this->session->userdata('service_cart1'));
                        $odata['location'] = json_encode($this->session->userdata('location_cart'));
                        $odata['vendor_id'] = $vendorid;
                        $odata['billing'] = json_encode($this->session->userdata('billing_cart'));
                        
                        $odata['order_id'] = $order_no;
                        $odata['amount'] = $amt;
                        $odata['qty'] = 1;
                            
                        $this->payment_model->InsertRecord('order_detail',$odata);
                    }
                    //Set variables for paypal form
                    $returnURL = base_url().'payment/success'; //payment success url
                    $cancelURL = base_url().'payment/cancel'; //payment cancel url
                    $notifyURL = base_url().'payment/ipn'; //ipn url
                    //get particular product data
                    //$product = $this->product->getRows($id);
                    
                    $userID = $this->session->userdata('user_id'); //current user id
                    $logo = base_url().'assets/images/codexworld-logo.png';
                    
                    $this->paypal_lib->add_field('return', $returnURL);
                    $this->paypal_lib->add_field('cancel_return', $cancelURL);
                    $this->paypal_lib->add_field('notify_url', $notifyURL);
                    $this->paypal_lib->add_field('item_name', '');
                    $this->paypal_lib->add_field('custom', $order_no);
                    $this->paypal_lib->add_field('item_number',  $userID);            
                    $this->paypal_lib->add_field('amount',  $amt);		
                    $this->paypal_lib->image($logo);
                    
                    $this->paypal_lib->paypal_auto_form();
            }else if($this->input->post('payment_method') == 'wallet'){                
                    $userid = $this->session->userdata('user_id');
                    $wallet_amt = get_wallet($userid);
                    //echo $wallet_amt->amount.'/'.$amt; die;
                    if(floatval($wallet_amt->amount) <= floatval($amt)){ 
                        $data->error = 1;
                        $data->success = 0;
                        $data->message = "You don't have enough balance to make this payment";
                        $this->session->set_flashdata('item',$data);
                        redirect('products/checkout');
                    }else{
			//echo "<pre>"; print_r($this->cart->contents()); die;
                        $udata['payment_status'] = '2';                        
                        if($lastid = $this->payment_model->InsertRecord('order',$udata)){
                            foreach($this->cart->contents() as $item){
				if($item['options']['tbl'] == 'other_products'){
					$odata['other_product_id'] = $item['id'];
					$odata['album_id'] = Null;
					$odata['product_id'] = 0;
					$product = $this->payment_model->SelectSingleRecord('other_products','user_id,price,title',array("id"=>$item['id']),'id desc');
				}else if($item['options']['tbl'] == 'album'){
					$odata['album_id'] = $item['id'];
					$odata['product_id'] = 0;
					$odata['other_product_id'] = Null;
					$product = $this->payment_model->SelectSingleRecord('album','user_id,price,title',array("id"=>$item['id']),'id desc');
				}else{
					$odata['product_id'] = $item['id'];
					$odata['other_product_id'] = Null;
					$odata['album_id'] = Null;
					$product = $this->payment_model->SelectSingleRecord('products','user_id,price,title',array("id"=>$item['id']),'id desc');
				}
                                
                                $odata['order_id'] = $order_no;
                                $odata['amount'] = $item['price'];
                                $odata['qty'] = $item['qty'];
                                
                                
                                $odata['seller_id'] = $product->user_id;
                                $odata['seller_commission'] = $product->price - ($product->price * ($charge/100));
                                $this->payment_model->InsertRecord('order_detail',$odata);
				
				//send mail to user
				//echo "<pre>"; print_r($product); die;
				$to = get_user($product->user_id)->email;
				$sub = 'New order for '.$product->title;
								
				$body['to'] = get_user($product->user_id)->f_name;
				$body['from'] = get_user($userid)->f_name;				
				$body['view'] = site_url()."products/orders";
				$body['amt'] = '<b>'.$item['price'].'</b> has been credited to your wallet as product fee';
				$body['message'] = 'Congrats! You received new order for <strong>'.$product->title.'</strong> and $'.$item['price'].' has been credited to your wallet ( exlcluding transaction charges )';								
				$this->sendpurchaseemail($to,$sub,$body);
				//
				$to = get_user($userid)->email;
				$sub = "You have ordered for ".$product->title."";
				
				$body['to'] = get_user($userid)->f_name;
				$body['from'] = get_user($product->user_id)->f_name;				
				$body['view'] = site_url()."earnings";
				$body['amt'] = 'You have made purchase of <b>$'.$item['price'].'</b>';
				$body['message'] = 'Congrats! You have successfully ordered  <strong>'.$product->title.' </strong>. You can find download link in your order section.';								
				$this->sendpurchaseemail($to,$sub,$body);
				//// insert notifications				
				$idata['url'] = 'earnings';
				$idata['message'] = 'New order for '.$product->title;
				$idata['user_id'] = $product->user_id;
				$idata['is_read'] = 0;
				$this->payment_model->InsertRecord('notifications',$idata);
                            }
                            deduct_wallet($userid,$amt);
                            $charge = $this->get_Charge();
                            $data->payment_amt = $amt;
                            $amt = ($amt*($charge/100));
                                                                                    
                                $tdata['user_id'] = $userid;            
                                $tdata['txn_id'] = '';
                                $tdata['order_id'] = $order_no;
                                $tdata['payment_amt'] = $data->payment_amt;
                                $tdata['currency_code'] = 'USD';
                                $tdata['status'] = 'Completed';
                                $tdata['payment_type'] = '2';
                                $tdata['payment_mode'] = 'Wallet';
                                if($this->payment_model->InsertRecord('transactions',$tdata)){                                    
                                        $orders = $this->payment_model->SelectRecord('order_detail','*',array("order_id"=>$order_no),'id desc');
                                        foreach($orders as $row){
                                            $product = $this->payment_model->SelectSingleRecord('products','*',array("id"=>$row['product_id']),'id desc');
                                            $price = $product->price - ($product->price * ($charge/100));
                                            added_wallet($product->user_id,$price);
                                        }
                                    
                                    added_wallet(0,$amt);
                                    $this->cart->destroy();
                                    $data->error=0;
                                    $data->success=1;
                                    $data->message= "Payment has been made successfully, You can download Link from my orders.";
                                    $this->session->set_flashdata('item',$data);
                                    redirect('products/cart_view');
                                }
                            
                            
                        }
                    }
                        
            }
            
        }
        
        public function success(){
            $data=new stdClass();
            $paypalInfo = $this->input->get();
                //print_r($paypalInfo); die;
                $data->user_id = $paypalInfo['item_number'];
                //$data->plan_id = $paypalInfo['item_name']; 
                $data->txn_id = $paypalInfo["tx"];
                $data->payment_amt = $paypalInfo["amt"];
                $data->currency_code = $paypalInfo["cc"];
                $data->order_id = $paypalInfo["cm"];
                $data->status = $paypalInfo["st"];
                
                //$charge = $this->get_Charge();
                $amt = $data->payment_amt;
                //$amt = ($amt*($charge/100));
                
                $is_txn = $this->payment_model->SelectSingleRecord('transactions','*',array('txn_id'=>$data->txn_id),'id desc');
                if(empty($is_txn)){
                    $udata['user_id'] = $data->user_id;            
                    $udata['txn_id'] = $data->txn_id;
                    $udata['order_id'] = $data->order_id;
                    $udata['payment_amt'] = $data->payment_amt;
                    $udata['currency_code'] = $data->currency_code;
                    $udata['status'] = $data->status;
                    $udata['payment_type'] = '2';
                    $udata['payment_mode'] = 'Paypal';
                    if($this->payment_model->InsertRecord('transactions',$udata)){
                        $this->payment_model->UpdateRecord('order',array("transaction_id"=>$data->txn_id,"payment_status"=>"2"),array("order_no"=>$data->order_id));
                            $orders = $this->payment_model->SelectRecord('order_detail','*',array("order_id"=>$data->order_id),'id desc');                           
                        
                        //added_wallet(0,$amt);
                        $this->cart->destroy();
                        $data->error=0;
                        $data->success=1;
                        $data->message= "Payment has been made successfully, Your request has been booked successfully.";
                        $this->session->set_flashdata('item',$data);
                        redirect('user/dashboard');
                    }
                }
        }
        
        public function cancel(){
                $data=new stdClass();                                
                
                    $data->error=1;
                    $data->success=0;
                    $data->message= "Payment Failed , Plese Try Again.";
                    $this->session->set_flashdata('item',$data);
                    redirect('welcome/checkout');
        }
        
        public function create_order_no(){
            $order = "ORDER_".uniqid();                   
            if($this->payment_model->SelectRecord('order','*',array("order_no"=>$order),$orderby=array())){
                $this->create_order_no();
            }
            return $order;
        }
                
}
?>