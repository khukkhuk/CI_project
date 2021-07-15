<?php
class student extends CI_Controller
{
public function __construct()
{
        parent::__construct();
        date_default_timezone_set('UTC');
        $this->load->library('session');

		$Ses_id=$this->session->userdata('id');
		if ($Ses_id == NUll){redirect("welcome/index","refresh");}
			if($this->input->POST('btn-years')){
		$ch_year=$this->input->post('ch_year');
		$data = array(
			'years'=>$ch_year
		)  ;
		$this->session->set_userdata($data);
		redirect('student',"refresh");
	}
}
	public function index()
	{ 
		$this->load->view('student/dashboard');
	}


	//conclude

	public function show_activity()
	{ 
		$code=$this->session->userdata('id');
		$sql ="SELECT * FROM student where code='$code'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('student/show_activity',$data);
		
			
	}


//end conclude


	//profile
	public function profile()
	{
		$this->load->view('student/profile');

	}

	public function Logout(){ 
		$this->session->sess_destroy('id');
		redirect("welcome/index","refresh");
	}
}
