<?php


class Supervisior extends CI_Controller
{
	/*
	 * Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('lib');
		$this->load->model('lib_model');
		$this->load->helper('string');
		/*
		 * Session Check for ERP
		 */
		$allow_url = array('Logout', 'Auth', 'index', '');
		$url = $this->uri->segment(2);
		if (!in_array($url, $allow_url)) {
			if (!$this->session->userdata('ELogin')) {
				redirect(base_url());
			}
		}
	}

	/*
	 * index
	 */
	/*
	 * Index
	 */

/*	public function index()
	{
		$this->load->view('supervisior/index');
	}


 ---------------------------------------------------------------------------------------------------------------------------
 Supervisor functions 
	 */





/*
	 * Dashboard
	 */
	
public function supervisior_dashboard()
	{
		$this->load->view('supervisior/supervisior_header');
		$this->load->view('supervisior/supervisior_dashboard');
		$this->load->view('supervisior/supervisior_footer');
	}



/*
	 *  CategoryList
	 */
	public function supervisior_Ques_bucket()
	{

		$data['rs'] = $this->lib_model->Select('m_subject', 'id,name,about,status,subjectcode', array());
		$this->load->view('supervisior/supervisior_header', $data);
		$this->load->view('supervisior/supervisior_Ques_bucket');
		$this->load->view('supervisior/supervisior_footer');
	}



/*
	 *  CategoryList
	 */
	public function supervisior_SubjectList()
	{

		$data['rs'] = $this->lib_model->Select('m_subject', 'id,name,about,status,subjectcode', array());
		$this->load->view('supervisior/supervisior_header', $data);
		$this->load->view('supervisior/supervisior_SubjectList');
		$this->load->view('supervisior/supervisior_footer');
	}

/*
	 * supervisior Add subject Category page
	 */
	public function supervisior_AddSubject()
	{

		$this->load->view('supervisior/supervisior_header');
		$this->load->view('supervisior/supervisior_AddSubject');
		$this->load->view('supervisior/supervisior_footer');
	}
/*
	 * supervisor  Add suject Process
	 */
	public function supervisior_AddSubjectProcess()
	{
		$rules = array(
			array('field' => 'CName', 'label' => 'CName', 'rules' => 'required')
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			echo validation_errors();
			$Msg = array('Msg' => validation_errors(), 'Type' => 'danger');
			$this->session->set_flashdata($Msg);
			redirect(base_url('admin/f_AddCategory'));
		} else {

			$CName = $this->lib->validate($this->input->post('CName'));
			$CAbout = $this->lib->validate($this->input->post('CAbout'));
			$CCode = $this->lib->validate($this->input->post('CCode'));
			$CType = $this->lib->validate($this->input->post('CType'));

			$count = $this->lib_model->Counter('m_subject', array('name' => $CName));

			if ($count == 0) {
				$f = array(
					'name' => $CName,
					'about' => $CAbout,
					'subjectcode'=>$CCode,
					'type'=>$CType,
					'status' => 1,
					'created' => date('Y-m-d H:i:s'),
					'createdIp' => $this->input->ip_address(),
					'createdBy' => 'Faculty'

				);


				$this->lib_model->Insert('m_subject', $f);
				$Msg = array('Msg' => 'Subject Add Successfully', 'Type' => 'success');
				$this->session->set_flashdata($Msg);
				redirect(base_url('admin/f_AddSubject'));
			} else {
				$Msg = array('Msg' => 'Subject Alredy Exist in Database', 'Type' => 'danger');
				$this->session->set_flashdata($Msg);
				redirect(base_url('admin/f_AddSubject'));
			}


		}
	}




/*
	 * supervisior Add question
	 */

public function supervisior_Addques()
	{

		$this->load->view('supervisior/supervisior_header');
		$this->load->view('supervisior/supervisior_Addques');
		$this->load->view('supervisior/supervisior_footer');
	}





public function supervisor_Addquesprocess()
	{
		$rules = array(
			array('field' => 'CName', 'label' => 'CName', 'rules' => 'required')
		);

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == false) {
			echo validation_errors();
			$Msg = array('Msg' => validation_errors(), 'Type' => 'danger');
			$this->session->set_flashdata($Msg);
			redirect(base_url('admin/f_AddCategory'));
		} else {

			$CName = $this->lib->validate($this->input->post('CName'));
			$CAbout = $this->lib->validate($this->input->post('CAbout'));
			$CCode = $this->lib->validate($this->input->post('CCode'));
			$CType = $this->lib->validate($this->input->post('CType'));

			$count = $this->lib_model->Counter('m_addques', array('name' => $CName));

			if ($count == 0) {
				$f = array(
					'name' => $CName,
					'about' => $CAbout,
					'subjectcode'=>$CCode,
					'type'=>$CType,
					'status' => 0,
					'created' => date('Y-m-d H:i:s'),
					'createdIp' => $this->input->ip_address(),
					'createdBy' => 'Faculty'

				);


				$this->lib_model->Insert('m_addques', $f);
				$Msg = array('Msg' => 'Subject Add Successfully', 'Type' => 'success');
				$this->session->set_flashdata($Msg);
				redirect(base_url('admin/supervisior_Addques'));
			} else {
				$Msg = array('Msg' => 'Subject Alredy Exist in Database', 'Type' => 'danger');
				$this->session->set_flashdata($Msg);
				redirect(base_url('admin/supervisior_Addques'));
			}


		}

}











}
