<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();
        if(empty($this->session->userdata('logged_in'))){
            redirect('/');
        }
        $this->load->model('dashboard_model');
    }
    
	public function index(){
        $this->load->view('dashboard');
	}
}
