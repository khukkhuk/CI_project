<?php
class admin extends CI_Controller 
{
public function __construct() 
{
        parent::__construct();
		$this->load->library('session');

		$Ses_id=$this->session->userdata('id');
		if ($Ses_id == NUll){redirect("welcome/index","refresh");}
			if($this->input->POST('btn-years')){
		$ch_year=$this->input->post('ch_year');
		$data = array(
			'years'=>$ch_year
		)  ;
		$this->session->set_userdata($data);
		redirect('admin',"refresh");
	}
		
}

	public function index(){
		redirect('admin/dashboard',"refresh");
	}
	public function dashboard(){ 
		$this->load->view('admin/dashboard');
	}
	public function report_act(){ 
		$choose_term=$this->session->userdata('years');
		$sql = "SELECT DISTINCT depwork FROM act_detail where terms='$choose_term'";
		$rs = $this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('admin/report_act',$data);
		if($this->input->post('btn_dep')){
			$data = array(
			'choose_dep'=>$this->input->POST('dep_name')
			);
			$this->session->set_userdata($data);
			redirect('admin/report_dep','refresh');
		}

	}
	public function report_dep(){ 
		
		$choose_dep=$this->session->userdata('choose_dep');
		$choose_term=$this->session->userdata('years');
		$sql = "SELECT DISTINCT gro FROM act_detail where depwork ='$choose_dep' and terms ='$choose_term' order by gro DESC";
		$rs = $this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('admin/report_dep',$data);
		if($this->input->post('btn_room')){
			$data = array(
			'choose_room'=>$this->input->POST('gro_room'),
			'name_room'=>$this->input->POST('name_room')
			);
			$this->session->set_userdata($data);
			redirect('admin/follow_std','refresh');
		}
	}
	public function follow_std(){

		$choose_room = $this->session->userdata('choose_room');
		$sql ="SELECT * FROM student where gro='$choose_room'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('admin/follow_std',$data); 

	}
	public function manage_term(){ 
		$sql = "SELECT * FROM terms Order by term_id DESC";
		$rs= $this->db->query($sql);
		$data['rs']= $rs->result_array();
		$this->load->view('admin/manage_term',$data);

		if($this->input->POST('btn-sub')){
			$next_term = $this->input->POST('next_term');
			$data = array(
				'term_id' => '',
				'term_name' => $next_term,
				'term_status' => 'inactive');
			$this->db->insert('terms', $data);
			redirect('admin/manage_term');
		}

		if($this->input->POST('btn-edit')){
			$term_active = $this->input->POST('term_active');
			$data = array(
						'term_status'=>'inactive'
					);
			$this->db->update('terms', $data);

			$data = array(
						'term_status'=>'active'
					);
			$this->db->where('term_name',$term_active);
			$this->db->update('terms', $data);
			
			//redirect('teacher/report_lineup/'.$id,"refresh");
						
			redirect('admin/manage_term');
		}
	}
	public function manage_day(){ 
		$choose_term=$this->session->userdata('years');
	    $sql = "SELECT * FROM days WHERE day_term='$choose_term'";
		$rs= $this->db->query($sql);
		$data['rs']= $rs->result_array();
		$this->load->view('admin/manage_day',$data);
		if($this->input->POST('btn-sub')){
			$add_dayname = $this->input->POST('add_dayname');
			$add_daydate = $this->input->POST('add_daydate');
			$add_nameday = $this->input->POST('add_nameday');
			$add_dayterm = $choose_term;
			$add_daynum  = $this->input->POST('add_daynum');
			$data = array( 
		  		'day_term' => $add_dayterm,
		  		'day_date' => $add_daydate,
		  		'name_day' => $add_nameday,
		  		'day_name' => $add_dayname,
		  		'admin_id' => $this->session->userdata('id'),
		  		'day_num' => $add_daynum,);
		   	$this->db->insert('days', $data); 
		   	redirect('admin/manage_day',"refresh");
		}
		if($this->input->POST('btn-edit')){
			$day_id = $this->input->POST('day_id');
			$edit_dayname = $this->input->POST('edit_dayname');
			$edit_daydate = $this->input->POST('edit_daydate');
			$edit_nameday = $this->input->POST('edit_nameday');
			$edit_daynum  = $this->input->POST('edit_daynum');
			if($edit_daynum=='' OR $edit_nameday=='' OR $edit_daydate =='' OR $edit_dayname==''){
			echo "<script>
			alert('กรุณากรอกข้อมูลให้ครบ');
			</script>";
			redirect("admin/manage_day","refresh");
			}else{
			$data = array( 
		  		'day_num' => $edit_daynum,
		  		'name_day' => $edit_nameday, 
		  		'day_date'=> $edit_daydate,
		  		'day_name'=> $edit_dayname);
		   	$this->db->where('day_id',$day_id);  
		   	$this->db->update('days', $data);
		   	redirect('admin/manage_day',"refresh");
		   }
		}
		if($this->input->POST('SaveCheck')){
				$id=$this->input->POST('day_id');
				$this->db->where('day_id',$id);
				$this->db->delete('days');
				redirect('admin/manage_day','refresh');
			}
	}
	public function manage_act(){ 
		$term =$this->session->userdata('years');
	    $sql = "SELECT * FROM activity where act_term='$term' Order by act_id DESC";
		$rs= $this->db->query($sql);
		$data['rs']= $rs->result_array();
		$this->load->view('admin/manage_act',$data);
		if($this->input->POST('btn-sub')){
			$actname = $this->input->POST('add_actname');
			$actdetail=$this->input->POST('add_actdetail');
			$actdate = $this->input->POST('add_actdate');
			$act_quantity = $this->input->POST('act_quantity');
			if($actname=='' OR $actdetail=='' OR $actdate =='' OR $act_quantity==''){
			echo "<script>
			alert('กรุณากรอกข้อมูลให้ครบ');
			</script>";
			redirect("admin/manage_act","refresh");
			}else{
			$data = array( 
		  		'act_name' => $actname,
		  		'act_detail' => $actdetail, 
		  		'date_create'=> date('d/m/y'),
		  		'date_join'=> $actdate,
		  		'act_quantity'=> $act_quantity,
		  		'admin_id' => $this->session->userdata('id'),
		  		'act_active'=>'active',
		  		'act_term'=>$this->session->userdata('years')
		  	);
		   	$this->db->insert('activity', $data); 
		   	redirect('admin/manage_act',"refresh");
		   }
		}
		if($this->input->POST('btn-edit')){
			 $act_id = $this->input->POST('add_actid');
			 $actname = $this->input->POST('add_actname');
			 $actdetail=$this->input->POST('add_actdetail');
			 $actdate = $this->input->POST('add_actdate');
			 $act_quantity = $this->input->POST('act_quantity');
			 $act_active = $this->input->POST("edit_active");
			if($actname=='' OR $actdetail=='' OR $actdate =='' OR $act_quantity=='' OR $act_active==''){
			echo "<script>
			alert('กรุณากรอกข้อมูลให้ครบ');
			</script>";
			//redirect("admin/manage_act","refresh");
			}else{
			$data = array( 
		  		'act_name' => $actname,
		  		'act_detail' => $actdetail, 
		  		'date_create'=> date('d/m/y'),
		  		'date_join'=> $actdate,
		  		'act_active'=>$act_active,
		  		'act_quantity'=> $act_quantity);
		   	$this->db->where('act_id',$act_id);  
		   	$this->db->update('activity', $data);
		   	//redirect('admin/manage_act',"refresh");
		   }
		}
		if($this->input->POST('SaveCheck')){
				$id=$this->input->POST('add_actid');
				$this->db->where('act_id',$id);
				$this->db->delete('activity');
				redirect('admin/manage_act','refresh');
			}
		if($this->input->POST('btn-active')){
				$id=$this->input->POST('actid');
				$data = array( 
		  		'act_active' => 'inactive');
				$this->db->where('act_id',$id);
				$this->db->update('activity',$data);
				redirect('admin/manage_act','refresh');
			}
		if($this->input->POST('btn-inactive')){
				$id=$this->input->POST('actid');
				$data = array( 
		  		'act_active' => 'active');
				$this->db->where('act_id',$id);
				$this->db->update('activity',$data);
				redirect('admin/manage_act','refresh');
			}		

	}

	public function manage_admin(){
		$sql = "SELECT * FROM admin WHERE username !='admin'";
		$rs = $this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('admin/manage_admin',$data);
		if($this->input->POST('btn-sub')){
			$add_name = $this->input->POST('add_name');
			$add_surname = $this->input->POST('add_surname');
			$add_username = $this->input->POST('add_username');
			$add_password = $this->input->POST('add_password');
			$add_cpassword = $this->input->POST('add_cpassword');
			if($add_name!='' AND $add_surname!='' AND $add_username !='' AND $add_password!='' AND $add_cpassword!=''){
				if($add_password == $add_cpassword){
				$data = array(
				'a_id'	  =>'',
		  		'a_fname' => $add_name,
		  		'a_lname' => $add_surname, 
		  		'username'=> $add_username,
		  		'password'=> $add_password
		  	);
		   	$this->db->insert('admin', $data); 
		   	redirect('admin/manage_admin',"refresh");
		  	

				}else{
				echo "<script>
			alert('รหัสผ่านไม่ตรงกัน');
			</script>";
			redirect("admin/manage_admin","refresh");
				}
			}else{
				echo "<script>
			alert('กรุณากรอกข้อมูลให้ครบ');
			</script>";
			redirect("admin/manage_admin","refresh");
			}
			}

			if($this->input->POST('btn-edit')){
			$id = $this->input->POST('a_id');
			$add_name = $this->input->POST('add_name');
			$add_surname = $this->input->POST('add_surname');
			$add_username = $this->input->POST('add_username');
			$add_password = $this->input->POST('add_password');
			$add_cpassword = $this->input->POST('add_cpassword');
			if($add_name!='' AND $add_surname!='' AND $add_username !='' AND $add_password!='' AND $add_cpassword!=''){
				if($add_password == $add_cpassword){
				$data = array(
				'a_id'	  =>'',
		  		'a_fname' => $add_name,
		  		'a_lname' => $add_surname, 
		  		'username'=> $add_username,
		  		'password'=> $add_password
		  	);
			$this->db->where('a_id',$id);
		   	$this->db->update('admin', $data); 
		   	redirect('admin/manage_admin',"refresh");
		  	

				}else{
				echo "<script>
			alert('รหัสผ่านไม่ตรงกัน');
			</script>";
			redirect("admin/manage_admin","refresh");
				}
			}else{
				echo "<script>
			alert('กรุณากรอกข้อมูลให้ครบ');
			</script>";
			redirect("admin/manage_admin","refresh");
			}
			}

			if($this->input->POST('SaveCheck')){
				$id=$this->input->POST('a_id');
				$this->db->where('a_id',$id);
				$this->db->delete('admin');
				redirect('admin/manage_admin','refresh');
			}
		}


////////////////////////////////////////////////////////////////////
	public function Mydata(){ 
    $id=$this->session->userdata('id');

	    $sql = "SELECT * FROM admin WHERE a_id = '$id'";
		$rs= $this->db->query($sql);
		$data['rs']= $rs->result_array();
		$this->load->view('admin/Mydata',$data);
	}

	public function Edit_Pass($id){ 
    
	    $sql = "SELECT * FROM admin WHERE a_id = '$id'";
		$rs= $this->db->query($sql);
		$data['rs']= $rs->result_array();


			$show= $rs->result();
			$password=$show[0]->password;

		$this->load->view('admin/Edit_Pass',$data);
		if($this->input->post('submit')){
			$oldPass=$this->input->post('old_pass');
			$new_pass1=$this->input->post('new_pass1');
			$new_pass2=$this->input->post('new_pass2');

			
			
			if($oldPass == $password){ $chk1 ='1'; }else{$chk1 ='0';}
			if($new_pass1 == $new_pass2){ $chk2 ='1'; }else{$chk2 ='0';}
 
			if($chk1 ==1 AND $chk2 ==1){
			echo"<script language=\"JavaScript\">";
			echo"alert('สำเร็จ')";
			echo"</script>";
		$SqlUp ="UPDATE admin SET password = '$new_pass1' Where a_id = '$id'";
		 $this->db->query($SqlUp);
			}
			else {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณตรวจสอบรหัสผ่านอีกครั้ง')";
			echo"</script>";
			}



		}
	}
	public function LogOut(){ 
		$this->session->sess_destroy('id');
		redirect("welcome/index","refresh");

	}	
}
?>

