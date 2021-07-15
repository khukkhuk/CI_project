<?php
class header extends CI_Controller //Controller ชื่อ product
{
public function __construct() //คือการเรียกใช้เป็นอันดับแรก
{
	//7071003	
        parent::__construct();
		 //$this->load->model('mymodel');
		
		// $this->load->library('form_validation');
}
public function index(){

	$this->load->view('header/dashboard');

}
public function manage()
    {
		if(('btnS')!=null){
        $keyword  =   $this->input->post('keyword');

		$sql = "SELECT * FROM activity WHERE act_name like '%$keyword%' AND type = 'กิจกรรมแผนก'";
		$show = $this->db->query($sql);
		$data['rs'] = $show->result_array();
		
		}
		else{
		$sql = "SELECT * FROM activity WHERE type ='กิจกรรมแผนก'";
		$show = $this->db->query($sql);
		$data['rs'] = $show->result_array(); 
		}
		
        $this->load->view('header/manage',$data);
		
    }

public function del($act_id) //method หรือ  function ชื่อว่า  del และรับค่า  $id จาก form
	{						//ฐานข้อมูล          //field  //ตัวแปล
		$this->db->delete('activity', array('act_id' => $act_id)); 
		redirect("header/manage/","refresh");
		exit();
	}

	
/////////////////////////  insert /////////////////////////////////////////////////////////////////////////////////////
	

	public function add(){ //method หรือ  function ชื่อว่า  add
	$this->load->view('header/manage');
	if(("btn_mol_save")!= null) //ถ้าข้อมูลที่รับมาจาก form ไม่เท่ากับ ค่าว่าง
		{
			
			$ins = array( //และเก็บค่าข้อมูลแบบ array
			"act_name" => $this->input->post("name_act") ,
			"act_detail" => $this->input->post("detail_act") ,
			"type" => 'กิจกรรมแผนก',
			"date_create" => $this->input->post("date_create"),
			"date_join" => $this->input->post("date_join")

			//field ในฐานข้อมูล			//รับค่าแบบ post  //ตัวแปลจาก form
		);
			$name = $this->input->post("name_act"); 
			$detail = $this->input->post("detail_act");
			$sql = $this->db->query("select * from activity where act_name = '$name' ");
			$chk = $sql->num_rows();
			//echo $chk;
			if($chk == null){
				echo "<script>alert('เพิ่มเกิจกรรมสำเร็จ');</script>";
				$this->db->insert('activity', $ins);
				redirect("header/manage","refresh");
			}else{
				echo "<script>alert('มีกิจกรรมนี้อยูแล้ว');</script>";
				redirect("header/manage","refresh");
			}
		}
	}



///////////////////   edit   ////////////////////////////////////////////////////////////////////////////////////	

	public function edit($act_id) //method หรือ  function ชื่อว่า  del และรับค่า  $id จาก form
	{
		
		if(("btn_edit_mol") != null) //ถ้าข้อมูลที่รับมาจาก form ไม่เท่ากับ ค่าว่าง
		{
			$ins = array( //และเก็บค่าข้อมูลแบบ array
			"act_name" => $this->input->post("name_act") ,
			"act_detail" => $this->input->post("detail_act") ,
			"date_join" => $this->input->post("date_join") 
			//field ในฐานข้อมูล		 //รับค่าแบบ post  //ตัวแปลจาก form
		);	
		//	ชื่อฐานข้อมูล
			$name = $this->input->post("name_act"); 
			$detail = $this->input->post("detail_act");
			//$sql = $this->db->query("select * from activity where act_name = '$name' ");
			//$chk = $sql->num_rows();
			//echo "name",$name;
			//echo " detail   ",$detail;
			//if($chk == 0){
				//echo "name",$name;
				echo "<script>alert('แก้เกิจกรรมสำเร็จ');</script>";
				$this->db->where('act_id',$act_id);
				$this->db->update('activity', $ins);
				redirect("header/manage","refresh");

			//}else{
				//echo "<script>alert('ไม่มีการแก้ไขกิจกรรมนี้');</script>";
				//redirect("header/manage","refresh");
			//}
			
	
			
			
		//ไปยัง conntorller "member"
		//redirect("header/manage","refresh");
		//exit();
		}
		
		}


///////////////////   logout   ////////////////////////////////////////////////////////////////////////////////////	

	public function logout(){
		$this->session->sess_destroy();
		redirect("welcome","refresh");
		exit();
	}


//check	
	public function checklineup()
	{  
		$tdp=$this->session->userdata('t_dep');
		$sql ="SELECT DISTINCT gro,std_level FROM student where depwork='$tdp' order by std_level" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view("header/check_lineup",$data);
}
/*
	public function checkhomeroom()
	{ 
		$tdp=$this->session->userdata('t_dep');
		$sql ="SELECT DISTINCT gro,std_level FROM student where depwork='$tdp' order by std_level" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('teacher/check_homeroom',$data);
	}
	public function checkdepartment()
	{ 
		$tdp=$this->session->userdata('t_dep');
		$sql ="SELECT DISTINCT gro,std_level FROM student where depwork='$tdp' order by std_level" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('teacher/check_department',$data);
	}
	public function checkscout()
	{ $tdp=$this->session->userdata('t_dep');
		$sql ="SELECT DISTINCT gro,std_level FROM student where depwork='$tdp' AND std_level='ปวช.1'" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('teacher/check_scout',$data);
	}

//end check
//insert_activity
	public function checked_lineup($id)
{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('teacher/insert_lineup',$data); 
}
	public function insert_lineup(){
		echo	"<br>".$num = $this->input->post('num');
		$tdp=$this->session->userdata('t_dep');

		$tcc=$this->session->userdata('t_code');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert
		$data = array( 
  		'act_id' => "1",
  		'std_id' => $this->input->post('code'.$i), 
  		't_id' => $this->session->userdata('t_code'),
  		'depart_id' => $this->session->userdata('t_dep'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)) );
   		$this->db->insert('act_detail', $data);
		}
		if($i=$num)
			redirect("teacher/checklineup","refresh");
		exit();
}
	public function checked_homeroom($id)
{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('teacher/insert_homeroom',$data); 
}
	public function insert_homeroom(){
		echo	"<br>".$num = $this->input->post('num');
		$tdp=$this->session->userdata('t_dep');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert
		$data = array( 
  		'act_id' => "2",
  		'std_id' => $this->input->post('code'.$i), 
  		'depart_id' => $this->session->userdata('t_dep'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)) );
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/checkhomeroom","refresh");
		exit();
}
	public function checked_scout($id)
{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('teacher/insert_scout',$data); 
}
	public function insert_scout(){
		echo	"<br>".$num = $this->input->post('num');
		$tdp=$this->session->userdata('t_dep');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert
		$data = array( 
  		'act_id' => "3",
  		'std_id' => $this->input->post('code'.$i), 
  		'depart_id' => $this->session->userdata('t_dep'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)) );
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/checkscout","refresh");
		exit();
}
	public function checked_department($id)
{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('teacher/insert_department',$data); 
}
	public function insert_department(){
		echo	"<br>".$num = $this->input->post('num');
		$tdp=$this->session->userdata('t_dep');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert
		$data = array( 
  		'act_id' => "4",
  		'std_id' => $this->input->post('code'.$i), 
  		'depart_id' => $this->session->userdata('t_dep'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)) );
   		$this->db->insert('act_detail', $data); 
			}
			if($i=$num)
			redirect("teacher/checkdepartment","refresh");
		
	}
//end_insert_activity
//conclude

	public function concludelineup()
	{ 
		
		$tdp=$this->session->userdata('t_dep');
		$sql ="SELECT DISTINCT gro,std_level FROM student where depwork='$tdp' order by std_level" ; 
		$rs=$this->db->query($sql);
		
	foreach($rs as $sr) {
		$sql1 ="SELECT count('std_id') FROM student where gro='$sr' and depwork='$tdp' order by std_level" ;
		$rm=$this->db->query($sql1);
	}
		$data['rs']=$rs->result_array();
		$data['num']=$rm->result_array();
		
		
		$this->load->view("teacher/conclude_lineup",$data);
	}
	public function concludehomeroom()
	{ 
		$this->load->view('teacher/conclude_homeroom');
	}
	public function concludedepartment()
	{ 
		$this->load->view('teacher/conclude_department');
	}
	public function concludescout()
	{ 
		$this->load->view('teacher/conclude_scout');
	}
	public function concludespecial()
	{ 
		$this->load->view('teacher/conclude_special');
	}


//end conclude
*/
}
?>
