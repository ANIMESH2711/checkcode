<?php


class Faculty extends CI_Controller
{
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
	 * Index
	 */

/*	public function index()
	{
		$this->load->view('faculty/index');


	}

*/









/*faculty functions
 ---------------------------------------------------------------------------------------------------------------------------
	 */

/*
	 * Dashboard
	 */
	

public function f_dashboard()
	{
		$this->load->view('f/f_header');
		$this->load->view('f/f_dashboard');
		$this->load->view('f/f_footer');
	}

/*
	 *  CategoryList
	 */
	public function f_SubjectList()
	{

		$data['rs'] = $this->lib_model->Select('m_subject', 'id,name,about,status,subjectcode', array());
		$this->load->view('f/f_header', $data);
		$this->load->view('f/f_SubjectList');
		$this->load->view('f/f_footer');
	}



/*
	 * show pending question tp Faculty
	 */
public function f_pendingqueslist()
	{

		$data['rs'] = $this->lib_model->Select('m_addques', 'name,about,status,subjectcode', array());
		$this->load->view('f/f_header', $data);
		$this->load->view('f/f_pendingqueslist');
		$this->load->view('f/f_footer');
	}



/*
	 * show approved question tp Faculty
	 */
public function f_approved_question()
	{

		$data['rs'] = $this->lib_model->Select('m_addques', 'name,about,status,subjectcode', array());
		$this->load->view('f/f_header', $data);
		$this->load->view('f/f_approved_ques_list');
		$this->load->view('f/f_footer');
	}




/*
	 * show approved question tp Faculty
	 */
public function f_unapproved_question()
	{

		$data['rs'] = $this->lib_model->Select('m_addques', 'name,about,status,subjectcode', array());
		$this->load->view('f/f_header', $data);
		$this->load->view('f/f_Unapproved_ques_list');
		$this->load->view('f/f_footer');
	}



/*
	 * Add subject Category page
	 */
	public function f_AddSubject()
	{

		$this->load->view('f/f_header');
		$this->load->view('f/f_AddSubject');
		$this->load->view('f/f_footer');
	}


	/*
	 * faculty  Add suject Process
	 */
	public function f_AddSubjectProcess()
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
	 * faculty Add question
	 */

public function f_AddQues()
	{

		$this->load->view('f/f_header');
		$this->load->view('f/f_Addques');
		$this->load->view('f/f_footer');
	}






public function f_Addquesprocess()
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
				redirect(base_url('admin/f_Addques'));
			} else {
				$Msg = array('Msg' => 'Subject Alredy Exist in Database', 'Type' => 'danger');
				$this->session->set_flashdata($Msg);
				redirect(base_url('admin/f_Addques'));
			}


		}

}



















}
