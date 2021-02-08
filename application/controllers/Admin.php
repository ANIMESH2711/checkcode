<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('lib');
		$this->load->model('lib_model');
		
		$this->load->library(array('emaillibrary','uploadfiles'));
		$this->load->helper(array('email_helper'));
			
	}
    
    public function index()
	{
		$this->load->view('admin/landing');
	}

     
    public function validateForm()
	{
		
        $Serial = $this->input->post('Serial');
        $Code = $this->input->post('Code');
$available  = $this->lib_model->Select('product_master', '*', array('code'=>$Code,'status' => 0));
$av  = $this->lib_model->Select('product_master', '*', array('code'=>$Code,'status' => 1));

            $data = $available[0];
            $Used = $av[0];

            if(!empty($data)){
                $this->session->set_flashdata('category_success1', 'Coupon Available .');
            }
            
            if(!empty($Used)){
                unset($_SESSION['category_error1']);
                $this->session->set_flashdata('category_error', 'Coupon already Used .');
            }
            if(empty($data) && empty($Used)){
                $this->session->set_flashdata('category_error1', 'Coupon not available .');
            }
            redirect(base_url());  
	}


public function prx($data)
{

echo '<pre>';  print_r ($data);  echo '</pre>';exit();
}

}