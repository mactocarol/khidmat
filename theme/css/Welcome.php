<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = new stdClass();
		$this->load->helper('url','form');
		$this->load->model('welcome_model');
		$data->result = $this->welcome_model->SelectRecord('images',array('id','name'),array(),$orderby=NULL);
		//echo $data->result; die;		
		$this->load->view('welcome_message',$data);
	}
	
	public function upload(){
		$data = new stdClass();
		$this->load->helper('url','form');
		$this->load->model('welcome_model');
		//
		//$ds          = DIRECTORY_SEPARATOR;  //1
		//
		//$storeFolder = '../uploads/';   //2
		// 
		if (!empty($_FILES)) {
			// print_r($_FILES); die;
			$tempFile = $_FILES['file']['tmp_name'];          //3             
			  
			//$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
			 
			//$targetFile =  $targetPath.time()."_".$_FILES['file']['name'];  //5
			
				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;
				$config['file_name']           = time()."_".implode('-',explode(' ',$_FILES['file']['name']));

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        print_r($error); die;
                }
                else
                {
						$imgdata['name'] = $config['file_name'];				
                      $this->welcome_model->InsertRecord('images',$imgdata);
                      echo $this->db->last_query(); die;
                }
		 			
			
			echo '<script>alert("success");</script>';
			 
		}
		$this->load->view('welcome_message',$data);
	}
	
	public function my_images()
	{
		$data = new stdClass();
		$this->load->helper('url','form');
		$this->load->model('welcome_model');
		$data->result = $this->welcome_model->SelectRecord('images',array('id','name'),array("parent_id"=>'0'),'id desc');
		$data->result1 = $this->welcome_model->SelectRecord('images',array('id','name'),array("parent_id !="=>'0'),$orderby=NULL);
		//echo $data->result; die;		
		$this->load->view('my_images',$data);
	}
    
    public function images($id)
	{
		$data = new stdClass();
		$this->load->helper('url','form');
		$this->load->model('welcome_model');
		$data->result = $this->welcome_model->SelectRecord('images',array('id','name'),array("id"=>$id),$orderby=NULL);
		$data->result1 = $this->welcome_model->SelectRecord('images',array('id','name'),array("parent_id"=>$id),$orderby=NULL);
		//echo $data->result; die;		
		$this->load->view('detail_images',$data);
	}
	
	public function resize($id)
	{
		$data = new stdClass();
		$this->load->helper('url','form');
		$this->load->model('welcome_model');
		
		if($_POST){
            
            //print_r($_POST); die;
            $width = $this->input->post('width');
            $height = $this->input->post('height');
			$image = $this->welcome_model->SelectsingleRecord('images',array('id','name'),array("id"=>$id),$orderby=NULL);
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$image->name;
			$config['new_image'] = './uploads/thumbs/'.$width.'x'.$height.'_'.$image->name;
			$config['create_thumb'] = False;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = $width;
			$config['height']       = $height;
			//print_r($config); die;
			$this->load->library('image_lib', $config);
			
			if($this->image_lib->resize()){
				$imgdata['name'] = $width.'x'.$height.'_'.$image->name;
				$imgdata['parent_id'] = $id;
				$this->welcome_model->InsertRecord('images',$imgdata);
			}else{
				//echo $this->image_lib->display_errors(); die;
			}
            redirect('welcome/my_images');
		}
        $data->id = $id;
		$this->load->view('resize_image',$data);
		
	}
	
	
}
