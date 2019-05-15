<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->model('welcome_model');
        $this->load->helper('my_helper');  
    }
    
	public function index()
	{
        $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }            
                    
        $services = $this->welcome_model->SelectRecord('category','*',$udata=array("status"=>"1","level"=>0,"is_deleted"=>"0"),'id asc');
        $data->services = $services;
		$this->load->view('welcome_message',$data);
	}
    
    public function catalog($cat,$subcat=Null)
	{        
        $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }                                    
        
        if($subcat){
            $category = $this->welcome_model->SelectRecord('category','id,title,description,icon',$udata=array("status"=>"1","parent_id"=>$cat,"is_deleted"=>"0"),'id asc');
            $data->id = $subcat;            
        }else{
            $category = $this->welcome_model->SelectRecord('category','id,title,description,icon',$udata=array("status"=>"1","level"=>0,"is_deleted"=>"0"),'id asc');
            $data->id = $cat;
            $data->cat_name = '';
        }
        
        //print_r($category); die;
        $flag = 0;
        foreach($category as $key => $row){
            if(!empty($row)){
                $subcategory = $this->welcome_model->SelectRecord('category','id,title,description,icon',$udata=array("status"=>"1","parent_id"=>$row['id'],"is_deleted"=>"0"),'id asc');                            
                //foreach($subcategory as $keyy => $rows){
                //    //print_r($rows); die;
                //    if(!empty($rows)){
                //        $cosubcategory = $this->welcome_model->SelectRecord('category','id,title,description,icon',$udata=array("status"=>"1","parent_id"=>$rows['id'],"is_deleted"=>"0"),'id asc');                        
                //    }
                //    $subcategory[$keyy]['cosubcategory'] = $cosubcategory;
                //}
                if(empty($subcategory)){                    
                    $subcategory = $this->welcome_model->SelectRecord('services','id,title,description,icon',$udata=array("status"=>"1","category_id"=>$row['id'],"is_deleted"=>"0"),'id asc');                            
                }
                
                $category[$key]['subcategory'] = $subcategory;
            }else{
            
            }            
        }
        //print_r($category); die;
        
        foreach($category as $c){
            if($c['id'] == $subcat){
                if(empty($c['subcategory'])){
                    redirect('welcome/services/'.$subcat);        
                }
            }
        }
        if(empty($category)){
            redirect('welcome/services/'.$subcat);
        }
        
        
        $data->services = $category;
		$this->load->view('catalog',$data);
	}
    
    public function services($serviceid=Null)
	{
        $this->session->unset_userdata('service_cart');
        $this->session->unset_userdata('service_cart1');
        $this->session->unset_userdata('location_cart');
        $this->session->unset_userdata('provider_cart');
        $this->session->unset_userdata('billing_cart');
        
        $data=new stdClass();
        if($this->session->flashdata('item')) {
            $items = $this->session->flashdata('item');
            if($items->success){
                $data->error=0;
                $data->success=1;
                $data->message=$items->message;
            }else{
                $data->error=1;
                $data->success=0;
                $data->message=$items->message;
            }                
        }                                            
        
        $services = $this->welcome_model->SelectSingleRecord('services','*',$udata=array("status"=>"1","id"=>$serviceid,"is_deleted"=>"0"),'id asc');
        
        $options = $this->welcome_model->SelectRecord('options','*',$udata=array("status"=>"1","service_id"=>$serviceid,"is_deleted"=>"0"),'id asc');
        
        $arr = array();
        foreach ($options as $key => $item) {
           $arr[$item['field_position']][$key] = $item;
        }
        
        ksort($arr, SORT_NUMERIC);
        
        //print_r($options); die;
        $this->session->set_userdata('services',$services);
        $data->services = $services;
        $data->options = $arr;
		$this->load->view('services',$data);
	}
    
    public function add_services($serviceid=Null)
	{        
        $data=new stdClass();
        
        //print_r($_POST); die;
        
        $this->session->set_userdata('service_cart',$_POST);
        
        foreach($_POST as $key=>$value){
            echo '<p><strong>'.ucwords(implode(' ',explode('_',$key))).'</strong> : '.$value.'</p>';
        }
	}
    
    public function add_services1($serviceid=Null)
	{        
        $data=new stdClass();        
        //$this->session->unset_userdata('service_cart1'); die;
        //print_r($_POST); die;
        if(!$this->session->userdata('service_cart1')){
            $arr[] = $_POST;
            $this->session->set_userdata('service_cart1',$arr);    
        }else{
            $arr = $this->session->userdata('service_cart1');
            $flag = 0;
            foreach($arr as $k=>$r){                
                if($r['label'] == $_POST['label']){
                    if(isset($_POST['select'])){
                        $arr[$k]['select'] = $_POST['select'];
                    }
                    $arr[$k]['qty'] = $_POST['qty'];
                    $flag += 1;
                }else{
                            
                }
            }
            //print_r($arr); print_r($_POST);
            if($flag == 0){
                $arr[] = $_POST;
            }
            
            //print_r($arr); die;
            $this->session->set_userdata('service_cart1',$arr);
        }
        //print_r($this->session->userdata('service_cart1')); die;
        $listt = [];
        foreach($this->session->userdata('service_cart1') as $key=>$value){            
            if($value['list'] != '_'){
                if(!in_array($value['list'],$listt)){
                    $listt[] = $value['list'];
                    echo '<p><h4>'.implode(' ',explode('_',$value['list'])).'</h4></p>';
                }            
            }
            
            foreach($value as $keyy=>$row){
                if($keyy != 'list'){
                    if($keyy == 'label'){                        
                        echo '<p><strong>'.ucwords(implode(' ',explode('_',$value['keylabel']))).'</strong> : '.$row.'</p>';
                    }
                    if($keyy == 'select'){                        
                        echo '<p><strong>'.ucwords(implode(' ',explode('_',$value['keyselect']))).'</strong> : '.$row.'</p>';
                    }
                    if($keyy == 'qty'){                        
                        echo '<p><strong>'.ucwords(implode(' ',explode('_',$value['keyqty']))).'</strong> : '.$row.'</p>';
                    }
                }                
            }
        }
        //foreach($_POST as $key=>$value){
        //    echo '<p><strong>'.ucwords(implode(' ',explode('_',$key))).'</strong> : '.$value.'</p>';
        //}
	}
    
    
    public function checkout(){
        $this->session->set_userdata('billing_cart',$_POST);
        //print_r($_POST); die;
        $data = new stdClass();
        if(!$this->session->userdata('user_id')){
            $this->session->set_userdata('return_url','welcome/checkout');
            redirect('user');
        }
        
        $vendorid = $this->session->userdata('provider_cart')['vndor'];
        $data->vendor = $this->welcome_model->SelectSingleRecord('users','*',$udata=array("id"=>$vendorid),'id asc');
        $data->vendor_services = $this->welcome_model->SelectSingleRecord('vendor_services','*',$udata=array("vendor_id"=>$vendorid),'id asc');
        
        $services = $this->session->userdata('services');
        $this->load->view('checkout.php',$data);          
    }
    
    
    public function load_next_tab(){
        //print_r($_POST); die;
        $data = new stdClass();
        if($_POST['nextpage'] == 'location'){
            if(($this->session->userdata('service_cart')) || ($this->session->userdata('service_cart1'))){            
                    $this->load->view('location_tab.php');                    
            }else{
                echo 0;
            }
        }
        
        if($_POST['nextpage'] == 'provider'){
            if(($this->session->userdata('location_cart')) ){
                    $vendors = $this->welcome_model->joindataResult('v.vendor_id','u.id',array(),'u.*,v.charges','vendor_services as v','users as u',$orderby=Null);
                    //print_r($vendors); die;
                    $data->vendors = $vendors;
                    $this->load->view('provider_tab.php',$data);
            }else{
                echo 0;
            }            
        }
        
        if($_POST['nextpage'] == 'checkout'){
            
            if(($this->session->userdata('provider_cart')) ){                    
                    $this->load->view('checkout_tab.php');
            }else{
                echo 0;
            }            
        }
        
        //if($_POST['nextpage'] == 'finished'){            
        //    if(($this->session->userdata('billings_cart')) ){
        //        echo 0;
        //    }else{
        //        echo 0;
        //    }            
        //}
    }
    
    
    public function load_next_tab1(){
        
        $data = new stdClass();        
        
        if($_POST['nextpage'] == 'finished'){            
            if(($this->session->userdata('billing_cart')) ){
                echo 1;
            }else{
                echo 0;
            }            
        }
    }
    
    public function save_location()
	{
       
        $this->session->set_userdata('location_cart',$_POST);
        //print_r($_POST);
        foreach($_POST as $key=>$value){
            echo '<p><strong>'.ucwords(implode(' ',explode('_',$key))).'</strong> : '.$value.'</p>';
        }
	}
    
    public function select_provider()
	{
       
        $this->session->set_userdata('provider_cart',$_POST);
        $vendor = $this->welcome_model->SelectSingleRecord('users','*',$udata=array("id"=>$_POST['vndor']),'id asc');
        $vendor_services = $this->welcome_model->SelectSingleRecord('vendor_services','*',$udata=array("vendor_id"=>$_POST['vndor']),'id asc');
        //print_r($_POST['vendor']); die;        
            echo '<p><strong>Vendor</strong> : '.ucwords($vendor->f_name).' '.ucwords($vendor->l_name).'</p>';
            echo '<p><strong>Charges</strong> : '.($vendor_services->charges).'</p>';        
	}
    
    public function save_billing()
	{
        print_r($_SESSION); die;
        //$this->session->set_userdata('billing_cart',$_POST);
        print_r($_POST);
        //foreach($_POST as $key=>$value){
        //    echo '<p><strong>'.ucwords(implode(' ',explode('_',$key))).'</strong> : '.$value.'</p>';
        //}
	}
}
