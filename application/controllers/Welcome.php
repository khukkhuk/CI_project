<?php
class welcome extends CI_Controller
{
public function __construct() {
		
        parent::__construct();
}

	public function index() 
	{ 	
		$sqly = "SELECT * FROM terms WHERE term_status = 'active'";
		$shy= $this->db->query($sqly);
		$data['shy']= $shy->result_array();
		
		foreach($shy->result() AS $dt){
			$yearsnow = $dt->term_name;
		}

		$data = array(
			'years'=>$yearsnow
		)  ;
		$this->session->set_userdata($data);
		

		$this->load->view('index',$data);

		if($this->input->post('username') == !Null OR $this->input->post('password') ==! NULL) {
		

		$username =  $this->input->post('username');
		$password =  $this->input->post('password'); 

		 
		$query_admin = $this->db->query("select * from admin where username = '$username' and password = '$password'");
		$chk_admin = $query_admin->num_rows();
		
		if($chk_admin == 1){
			foreach($query_admin->result() As $row){
			$id= $row->a_id;
			$name= $row->a_fname;
			$username = $row->username;
			$lname= $row->a_lname;
			$data = array(
			'id'=>$id,
			'name'=>$name,
			'lname'=>$lname,
			'username'=>$username
			);
			$this->session->set_userdata($data);
			}
			redirect("admin/index");
		}
		$query_std = $this->db->query("SELECT * FROM student WHERE code = '$username' and pin_id = '$password'");
		$chk_std = $query_std->num_rows();
		
		if($chk_std == 1){
			foreach($query_std->result() As $row){
			$id= $row->code;
			$name= $row->name;
			$gro=$row->gro;
			$level=$row->std_level;
			
			$data = array(
			'id'=>$id,
			'name'=>$name,
			'gro'=>$gro,
			'std_level'=>$level
			);
			$this->session->set_userdata($data);
			}
			$std_id=$this->session->userdata('id');
			$std_name=$this->session->userdata('name');
			$std_level=$this->session->userdata('std_level');

			redirect("/student/index");
		}

		$query_prs = $this->db->query("SELECT * from person where username = '$username' and password = '$password'");
		$chk_prs = $query_prs->num_rows();
		
		if($chk_prs == 1){

			$rs_her= $query_prs->result();
			$person_id=$rs_her[0]->person_id;
			
			$sql_tcode = ("SELECT * from teacher where teacher_code ='$username'");
			$show=$this->db->query($sql_tcode);
			
			

			foreach ($show -> result() as $row)
			{
				$t_code=$row->teacher_code;

			    $t_group1=$row->std_gro1;
			    $t_group2=$row->std_gro2;
			    $t_group3=$row->std_gro3;
			    $t_dep=$row->teacher_dep;

			$data = array(
				't_group1'=>$t_group1,
				't_group2'=>$t_group2,
				't_group3'=>$t_group3,
				't_dep'=>$t_dep,
				't_code'=>$t_code
						);
			$this->session->set_userdata($data);
			}
			$tdp=$this->session->userdata('t_dep');
			$tcc=$this->session->userdata('t_code');
			

			//echo "t_dep =".$tdp;
		$query_hdr = $this->db->query("SELECT * From header WHERE teacher_id = '$person_id'");
		$chk_hdr = $query_hdr->num_rows();

		$query_drt = $this->db->query("SELECT * From director WHERE person_id = '$person_id'");
		$chk_drt = $query_drt->num_rows();
		
			foreach($query_prs->result() As $row){
			$id= $row->person_id;
			$name= $row->name;
			$data = array(
			'id'=>$id,
			'name'=>$name
			);
			$this->session->set_userdata($data);
			}
		if($chk_hdr == 1 ){ ///สำหรับมี header
				redirect("teacher/index");
			}
		if($chk_hdr == 0 ){ 
				redirect("teacher/index");
			}
		if($chk_drt == 0 ){ ///สำหรับมี director
				redirect("teacher/index");
			}	
		}
		
		if($chk_prs ==0 AND $chk_std ==0){ 
			echo "<script>
			alert('กรุณาตรวจสอบ Username หรือ Password อีกครั้ง');
			</script>";
			redirect("","refresh");
		}

}
 }
	public function logout(){
		$this->session->sess_destroy();
		redirect("member","refresh");
		exit();
	}
}