<?php


class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('lib');
		$this->load->model('lib_model');
		$this->load->helper('string');
		$this->load->library(array('emaillibrary','uploadfiles'));
		$this->load->helper(array('email_helper'));
			
	}

	public function index()
	{
		$this->load->view('admin/landing');
	}


	

}