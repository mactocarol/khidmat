<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller 
{
	//private $connection;
        public function __construct(){            
            parent::__construct();
            $this->load->model('user_model');
            $this->load->helper('my_helper');
            $page = '';
            if( $this->session->userdata('user_group_id') == 3){
                redirect('user');
            }
        }
        public function index(){
            if($this->session->userdata('logged_in')){
                redirect('user/dashboard');
            }
            
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
            $data->return_url = isset($_GET['return']) ? $_GET['return'] : '' ;
            $data->title = "Login | Khidmat";
            $this->load->view('login_view',$data);			
        }
        
        public function register(){
//        $this->load->library('email');    
	    //$this->email("mss.parvezkhan@gmail.com","My subject",'$msg');
	    
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
                            
                
            if(!empty($_POST)){                
               // print_r($_POST);die;
               if ( $this->user_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Email Already Exists';
                    $this->session->set_flashdata('item',$data);
                    redirect('user/register');
                } 
                
                        $key=md5 (uniqid());
                        //sending conformation mail to signup user
                        
                        $to = $this->input->post('email');
                        $sub = "Confirm Your Account";                                                					
			

                               $udata=array(                                            
                                    'email'=>$this->input->post('email'),
                                    'username'=>$this->input->post('username'),                                    
                                    'password'=>md5($this->input->post('password')),
                                    'user_type'=> ($this->input->post('user') == 'buyer') ? '1' : '2',
                                    'key'=> $key,
                                    'is_verified' => '0'
                                );
                                    $new_id = $this->user_model->new_user($udata);
                                    
                                    $body['to'] = get_user($new_id)->f_name;						
                                    $body['title'] = 'Thank You Registration';			
                                    $message = "<a href='".base_url()."user/register_user/$key'>Click here</a>"." to confirm your account";								
                                    $this->email($to,$sub,$message);
                                if($this->input->post('user') == 'seller'){
                                    redirect('user/service_register/'.base64_encode($new_id));
                                }
                                    //$this->user_model->InsertRecord('wallet',array("user_id"=>$new_id,"amount"=>"0","user_type"=>'2'));
                                    //$this->user_model->InsertRecord('membership',array("user_id"=>$new_id,"plan_id"=>"1"));
                                    $data->error=0;
                                    $data->success=1;
                                    $data->message='You are successfully registered, please verify your mail to avail all services.';
                                    $this->session->set_flashdata('item',$data);
                       
                }                                              
               //print_r($this->db->last_query()); die;
               $data->title = "Register | Khidmat";
               $this->load->view('register_view',$data);
                
        }
        
        
        public function service_register($id=Null){
        //print_r($id);   
	    //$this->sendemail("parvezkhan03@gmail.com","My subject",'$msg');
            
            $data=new stdClass();
            $data->sellerid = ($id);
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
                            
                
            if(!empty($_POST)){                
                //print_r($_POST);die;                               
                        $key=md5 (uniqid());
                        //sending conformation mail to signup user
                                                			
                               $udata=array(                                            
                                    'vendor_id'=>base64_decode($this->input->post('sellerid')),
                                    'services'=>json_encode(array_merge($this->input->post('category'),$this->input->post('subcategory')))                                                                        
                                );                                    
                                    $this->user_model->InsertRecord('vendor_services',$udata);
                                                                                                            
                                    redirect('user/service_register_two/'.($this->input->post('sellerid')));                                   
                }                                              
               //print_r($this->db->last_query()); die;
               $categories = $this->user_model->SelectRecord('category','*',array("level"=>0,"status"=>'1',"is_deleted"=>"0"),'id asc');
               foreach($categories as $key => $value){
                    $subcategories = $this->user_model->SelectRecord('category','*',array("parent_id"=>$value['id'],"status"=>'1',"is_deleted"=>"0"),'id asc');
                    $categories[$key]['subcategories'] = $subcategories;
               }
               $data->categories = $categories;
               $data->title = "Register | Khidmat";
               $this->load->view('seller_register_one_view',$data);
                
        }
        
        
        public function service_register_two($id=Null){	    
	    //$this->sendemail("parvezkhan03@gmail.com","My subject",'$msg');
            
            $data=new stdClass();
            $data->sellerid = ($id);
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
                            
                
            if(!empty($_POST)){                
                
                    $udata=array(                                            
                         'country'=>$this->input->post('location'),
                         'city'=>$this->input->post('city')                                                                        
                     );                                    
                         $this->user_model->UpdateRecord('users',$udata,array("id"=>base64_decode($this->input->post('sellerid'))));
                                                                                                
                         redirect('user/service_register_three/'.($this->input->post('sellerid')));                                   
            }
            $data->users = $this->user_model->SelectSingleRecord('users','*',array("id"=>base64_decode($this->input->post('sellerid'))),'id desc');
               //print_r($data->users); die;
               $data->title = "Register | Khidmat";
               $this->load->view('seller_register_two_view',$data);
                
        }
        
        public function service_register_three($id=Null){	    
	    //$this->sendemail("parvezkhan03@gmail.com","My subject",'$msg');
            
            $data=new stdClass();
            $data->sellerid = ($id);
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
                            
                
            if(!empty($_POST)){                
                //print_r($_POST);die;                                                                               			
                    $udata=array(                                            
                         'f_name'=>$this->input->post('fname'),
                         'l_name'=>$this->input->post('lname'),
                         'phone'=>$this->input->post('phone')
                     );                                    
                         $this->user_model->UpdateRecord('users',$udata,array("id"=>base64_decode($this->input->post('sellerid'))));
                                                                                                
                         redirect('user/service_register_fourth/'.($this->input->post('sellerid')));                                   
                }                                              
               $data->users = $this->user_model->SelectSingleRecord('users','*',array("id"=>base64_decode($id)),'id desc');
               
               $data->title = "Register | Khidmat";
               $this->load->view('seller_register_three_view',$data);
                
        }
        
        public function service_register_fourth($id=Null){	    
	    //$this->sendemail("parvezkhan03@gmail.com","My subject",'$msg');
            
            $data=new stdClass();
            $data->sellerid = ($id);
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
                            
                
            if(!empty($_POST)){                
                //print_r(base64_decode($this->input->post('sellerid')));die;                                                                               			
                    $udata=array(                                            
                         'image'=>$_FILES['fileupload']['name']                                                                                                
                     );                                    
                         $this->user_model->UpdateRecord('users',$udata,array("id"=>base64_decode($this->input->post('sellerid'))));
                                                                                                
                    $result1 = $this->user_model->SelectSingleRecord('users','*',array("id"=>base64_decode($this->input->post('sellerid'))),'id desc');    
                        $sess_array = array(
                        'user_id' => $result1->id,
                        'email' => $result1->username,
                        'image' => $result1->image,
                        'user_group_id' => 2,
                        'logged_in' => TRUE
                        );
                    
                        
                        //print_r($sess_array); die;
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        //print_r($this->session->userdata('email')); die;
                        if($this->input->post('return_url')){ redirect(($this->input->post('return_url')));	}
                        redirect('user/dashboard');	                                
                }                                              
               $data->users = $this->user_model->SelectSingleRecord('users','*',array("id"=>base64_decode($id)),'id desc');
               
               $data->title = "Register | Khidmat";
               $this->load->view('seller_register_fourth_view',$data);
                
        }
        
        public function register_user($key){
            if(!empty($key)){                
                if ($this->user_model->is_key_valid($key))
                {
                    //$user = $this->user_model->UpdateRecord('users',array("status"=>'1'),array());
                    //$userdata = array("user_id"=>$user->parent_id,"child_id"=>$user->id);
                    //$this->user_model->InsertRecord('downline',$userdata);
                    $data= new stdClass();
                    $data->page_title = "Registration";
                    $data->page_text = "New User Registration!";
                    $data->page = "signup";
                    
                    $data->error=0;
                    $data->success=1;
                    $data->message='verified successfully, you can login now.';
                    $this->session->set_flashdata('item',$data);
                    //echo "<script>alert('verified successfully, you can login now.') </script>";
                    redirect('user');
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid key.';
                    $this->session->set_flashdata('item',$data);
                    redirect('user/register');
                }
            }            
        }
        
        function check_username_exists()
        {                
            if (array_key_exists('username',$_POST)) 
            {
                if ( $this->user_model->username_exists($this->input->post('username')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_username_exists1()
        {                
            if (array_key_exists('username',$_POST)) 
            {
                if ( $this->user_model->username_exists_user($this->input->post('username')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_email_exists()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->email_exists($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        function check_email_exists1()
        {                
            if (array_key_exists('email',$_POST)) 
            {
                if ( $this->user_model->email_exists_user($this->input->post('email')) == TRUE ) 
                {
                    $isAvailable=false;
                } 
                else 
                {
                    $isAvailable= true;
                }
                 echo json_encode(array('valid' => $isAvailable, ));
            }
        }
        
        public function login_check()
        {            
            $data=new stdClass();
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');       
            if ($this->form_validation->run() == FALSE)
            {
                $data->error=1;
                $data->success=0;
                $data->message=validation_errors();
            }
            else
            {
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->security->xss_clean($this->input->post('password'));
                $Selectdata = array('id','email','username','image');
                $udata = array("email"=>$email,"password"=>md5($password),"is_verified"=>'1');                
                $result = $this->user_model->SelectSingleRecord('users',$Selectdata,$udata,$orderby=array());
                
                $udata = array("username"=>$email,"password"=>md5($password),"is_verified"=>'1');                
                $result1 = $this->user_model->SelectSingleRecord('users',$Selectdata,$udata,$orderby=array());
                //echo "<pre>";
                //print_r($result); die;
                if($result || $result1)
                {
                    if($result){
                        $sess_array = array(
                        'user_id' => $result->id,
                        'email' => $result->username,
                        'image' => $result->image,
                        'user_group_id' => $result->user_type,
                        'logged_in' => TRUE
                        );
                    }else if($result1){
                        $sess_array = array(
                        'user_id' => $result1->id,
                        'email' => $result1->username,
                        'image' => $result1->image,
                        'user_group_id' => $result->user_type,
                        'logged_in' => TRUE
                        );
                    }
                        
                        //print_r($sess_array); die;
                        $this->session->set_userdata($sess_array);
                        $data->error=0;
                        $data->success=1;
                        $data->message='Login Successful';
                        //print_r($this->session->userdata('email')); die;
                        if($this->input->post('return_url')){ redirect(($this->input->post('return_url')));	}
                        redirect('user/dashboard');	
                    
                }
                else
                {
                    $data->error=1;
                    $data->success=0;
                    $data->message='Invalid Username or Password.';
                    
                }
            }
            $data->msg = 1;
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
        
        public function dashboard()
        {            
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->msg=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            if($this->session->userdata('user_group_id') == 1){                
                $where = array('o.user_id'=>$this->session->userdata('user_id'));
            }else{
                $where = array('o.user_id'=>$this->session->userdata('user_id'));
            }
            //echo $this->session->userdata('user_id'); die;
            $data->orders = $this->user_model->joindatapagination('o.order_no','od.order_id',$where,'o.payment_status,o.payment_type,od.*','order as o','order_detail as od','o.id desc',10,0);
            
            //print_r($data->orders); die;
                      
            $data->title = 'Dashboard';
            $data->field = 'Dashboard';
            $data->page = 'dashboard';
            
            $this->load->view('dashboard_view',$data);            
        }
        
        
        public function orderDetail($id)
        {
            $id = base64_decode($id);
            
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            $data=new stdClass();
            if($this->session->flashdata('item')) {
                
                $items = $this->session->flashdata('item');
                if($items->success){
                    $data->error=0;
                    $data->success=1;
                    $data->msg=$items->message;
                }else{
                    $data->error=1;
                    $data->success=0;
                    $data->message=$items->message;
                }
                
            }
            $udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            $data->order = $this->user_model->joindata('o.order_no','od.order_id',array('o.order_no'=>$id,'o.user_id'=>$this->session->userdata('user_id')),'o.payment_status,o.payment_type,od.*','order as o','order_detail as od','o.id desc');
            
            //print_r($data->orders); die;
                      
            $data->title = 'Dashboard';
            $data->field = 'Dashboard';
            $data->page = 'dashboard';
            
            $this->load->view('order_detail_view',$data);            
        }
        
        public function profile(){
            //print_r($this->session->userdata());die();
            if(!$this->session->userdata('logged_in')){
                redirect('user');
            }
            if($this->session->userdata('user_group_id') != 2){
                
            }
            $data=new stdClass();
            
			$udata = array("id"=>$this->session->userdata('user_id'));                
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());
            
            //print_r($data);die();
            
			if($_POST){                                                
                
                $udata=array(                                            
                        'email'=>$this->input->post('email'),
                        'phone'=>$this->input->post('contact'),
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'dob'=>$this->input->post('dob'),                        
                        'address'=>$this->input->post('address'),
                        'country'=>$this->input->post('country'),
                        'zip_code'=>$this->input->post('zip_code')                        
                        );
                    
                    if($this->input->post('password') != ''){
                        $udata=array(                                            
                        'email'=>$this->input->post('email'),                        
                        'phone'=>$this->input->post('contact'),                        
                        'f_name'=>$this->input->post('f_name'),
                        'l_name'=>$this->input->post('l_name'),
                        'dob'=>$this->input->post('dob'),                        
                        'address'=>$this->input->post('address'),                        
                        'country'=>$this->input->post('country'),
                        'zip_code'=>$this->input->post('zip_code'),
                        'password'=>md5($this->input->post('password'))
                        );
                    }
                    //print_r($udata); die;
				if ($this->user_model->UpdateRecord('users',$udata,array("id"=>$this->session->userdata('user_id'))))
				{
                    $data->error=0;
                    $data->success=1;
                    $data->message='Profile Update Sucessfully.';
                     					
				}else{
                    $data->error=1;
                    $data->success=0;
                    $data->message='Network Error!';                    
                }
                //print_r($this->db->last_query()); die;
            $this->session->set_flashdata('item',$data);
            //redirect('user/profile');
			//print_r($this->session->flashdata('item')); die;	
			}                        
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                    
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';            	
            $this->load->view('profile_view',$data);            
		}
        
        
        public function upload_image(){
            
            $data=new stdClass();
            
            //$data = $_POST['image'];
            //
            //list($type, $data) = explode(';', $data);
            //list(, $data)      = explode(',', $data);
            //
            //$data = base64_decode($data);
            //$imageName = uniqid().time().'.png';
            //file_put_contents('./upload/profile_image/thumb/'.$imageName, $data);
            //
            //$userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());
            //if($userpic->image != 'no_image.jpg'){
            //    unlink('./upload/profile_image/thumb/'.$userpic->image);    
            //}            
            //
            //$this->user_model->UpdateRecord('users',array("image"=>$imageName),array("id"=>$this->session->userdata('user_id')));
            //
            //echo 'done';
            
            if($_FILES){
                
                $config=[	'upload_path'	=>'./upload/profile_image/',
                        'allowed_types'	=>'jpg|gif|png|jpeg',
                        'file_name' => strtotime(date('y-m-d h:i:s')).$_FILES["profile_pic"]['name']
                    ];
                //print_r($_FILES); die;
                $this->load->library ('upload',$config);
                
                if ($this->upload->do_upload('profile_pic'))
                {
                    $userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());                                        
                    unlink('./upload/profile_image/'.$userpic->image);
                    unlink('./upload/profile_image/thumb/'.$userpic->image);
                    $udata = $this->upload->data();
                    //resize profile image
                                    $config10['image_library'] = 'gd2';
                                    $config10['source_image'] = $udata['full_path'];
                                    $config10['new_image'] = './upload/profile_image/thumb/'.$udata['file_name'];
                                    $config10['maintain_ratio'] = TRUE;
                                    $config10['width']         = 200;
                                    $config10['height']       = 200;
                                    
                                    $this->load->library('image_lib', $config10);
                                    
                                    $this->image_lib->resize();
                    //print_r($udata); die;
                    $image_path= $udata['file_name']; 
                    $this->user_model->UpdateRecord('users',array("image"=>$image_path),array("id"=>$this->session->userdata('user_id')));
                    $data->error=0;
                    $data->success=1;
                    $data->message='Uploaded Successfully'; 
                    $this->session->set_flashdata('item', $data);
                    redirect('user/profile');	
                }
                else
                {
                    //print_r($this->upload->display_errors()); die;
                    $data->error=1;
                    $data->success=0;
                    $data->message='Only jpeg/png/gif/jpg allowed!'; 
                    $this->session->set_flashdata('item', $data);
                    //redirect('user/profile');	
                }
            }
            $data->result = $this->user_model->SelectSingleRecord('users','*',$udata,$orderby=array());                                    
            $data->title = 'User Profile';
            $data->field = 'User Profile';
            $data->page = 'profile';            	
            $this->load->view('profile_view',$data);

		}
        
        public function cover_image(){
            
            $data=new stdClass();
            
            $data = $_POST['image'];

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            
            $data = base64_decode($data);
            $imageName = uniqid().time().'.png';
            file_put_contents('./upload/cover_image/'.$imageName, $data);
            
            $userpic=$this->user_model->SelectSingleRecord('users','*',array("id"=>$this->session->userdata('user_id')),$orderby=array());
            if($userpic->cover_image != 'bgprofile.png'){
                unlink('./upload/cover_image/'.$userpic->cover_image);    
            }
            
            
            $this->user_model->UpdateRecord('users',array("cover_image"=>$imageName),array("id"=>$this->session->userdata('user_id')));
            
            echo 'done';            

		}
        
        public function logout()
        {
            $data=new stdClass();
            if($this->session->userdata('logged_in')){
                $this->session->sess_destroy();    
            }
            
            $data->error=0;
            $data->success=1;
            $data->message='Logged Out Successfully';
            $this->session->set_flashdata('item',$data);            
            redirect('user');
        }
			
        public function update_notification($id){
            if($this->session->userdata('user_group_id') != 2){
                redirect('user');
            }
            $data=new stdClass();
			    $udata = array("id"=>$id);                
                $url = $this->user_model->SelectSingleRecord('notifications','*',$udata,$orderby=array());        
				if ($this->user_model->UpdateRecord('notifications',array("status"=>1),array("id"=>$id)))
				{                                         					
				}else{
                    
                }
            redirect(site_url().''.$url->url);
			
		}

        function vendor_services(){
            $where = array("vendor_id"=>$this->session->userdata('user_id'));                
            $data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            $services = json_decode($data->services);
            $servicesArr = array();

            //echo "<pre>";
            //print_r($data);die();

            foreach ($services as $key => $value) {
                $where = array("id"=>$value);     
                $oneArr = $this->user_model->SelectSingleRecord('category','*',$where,$orderby=array());

                $where1['userId'] = $this->session->userdata('user_id');
                $where1['userServicesId'] = $value;
                $data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where1,$orderby=array());
                if(isset($data) && !empty($data)){
                    $oneArr->price = $data->price;
                }else{
                    $oneArr->price = '';
                }
                
                $servicesArr['servicesArr'][] = $oneArr;
            }
            //echo '<pre>';
            //print_r($servicesArr);die();
            $this->load->view('vendor_services',$servicesArr);  
        }

        function add_price(){
            $postData = $this->input->post();
            if($postData['price'] != 0){
                $where['userId'] = $this->session->userdata('user_id');
                $where['userServicesId'] = $postData['id'];
                $data = $this->user_model->SelectSingleRecord('vendor_services_price','*',$where,$orderby=array());
                if(empty($data)){
                    $insert = $where;
                    $insert['price'] = $postData['price'];
                    $this->user_model->InsertRecord('vendor_services_price',$insert);
                }else{
                    $insert = $where;
                    $insert['price'] = $postData['price'];
                    $this->user_model->UpdateRecord('vendor_services_price',$insert,$where);
                }
            }
        }

        function add_vendor_services(){
            $categories = $this->user_model->SelectRecord('category','*',array("level"=>0,"status"=>'1',"is_deleted"=>"0"),'id asc');
            $where = array("vendor_id"=>$this->session->userdata('user_id'));                
            $data = $this->user_model->SelectSingleRecord('vendor_services','*',$where,$orderby=array());
            $services = json_decode($data->services);
            foreach($categories as $key => $value){
                $subcategories = $this->user_model->SelectRecord('category','*',array("parent_id"=>$value['id'],"status"=>'1',"is_deleted"=>"0"),'id asc');
                $isAdded = 0;

                if (in_array($value['id'], $services)){ 
                    $isAdded = 1;
                }


                foreach ($subcategories as $key1 => $value) {
                    $subcategories[$key1]['isAdded'] = 0;
                    if (in_array($value['id'], $services)){ 
                        $subcategories[$key1]['isAdded'] = 1;
                        $isAdded = 1;
                    } 
                }
                $categories[$key]['isAdded'] = $isAdded;
                $categories[$key]['subcategories'] = $subcategories;
            }
            //echo '<pre>';
            //print_r($categories);
            $this->load->view('add_vendor_services',array('categories' => $categories));
        }

        function update_vendor_services(){

            $category = $this->input->post('category');
            $subcategory = $this->input->post('subcategory');
            $where = array("vendor_id"=>$this->session->userdata('user_id'));
            $update = array(
               'services' =>  json_encode(array_merge($category,$subcategory))
            );
            $this->user_model->UpdateRecord('vendor_services',$update,$where);         
            redirect('user/vendor_services');
        }

        function social_login(){
            $postData = $this->input->post();
            $where = array(
                'social_id' => $postData['socialId'],
                'social_type' => $postData['socialType'],
            );

            $data = $this->user_model->SelectSingleRecord('users','*',$where,$orderby=array());

            if(empty($data)){
                $insert = array(                                            
                    'f_name' => $postData['firstName'],
                    'l_name' => $postData['lastName'],
                    'email' => $postData['email'],
                    'username' => $postData['fullName'],
                    'password' => md5(rand()),
                    'image' => $postData['image'],
                    'user_type' => '1',
                    'is_verified' => '1',
                    'social_id' => $postData['socialId'],
                    'social_type' => $postData['socialType'],
                );

                $new_id = $this->user_model->new_user($insert);

                $sess_array = array(
                    'user_id' => $new_id,
                    'email' => $postData['email'],
                    'image' => $postData['image'],
                    'user_group_id' => 1,
                    'logged_in' => TRUE
                );
                        
                $this->session->set_userdata($sess_array);
                $data->error=0;
                $data->success=1;
                $data->message='Login Successful';
                redirect('user/dashboard'); 

            }else{
                $sess_array = array(
                    'user_id' => $data['id'],
                    'email' => $data['email'],
                    'image' => $data['image'],
                    'user_group_id' => 1,
                    'logged_in' => TRUE
                );
                        
                $this->session->set_userdata($sess_array);
                $data->error=0;
                $data->success=1;
                $data->message='Login Successful';
                redirect('user/dashboard');
            }

        }
}
?>