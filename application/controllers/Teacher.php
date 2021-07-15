<?php
class teacher extends CI_Controller
{
public function __construct()
{
        parent::__construct();
        date_default_timezone_set('Asia/Bangkok');
        $this->load->library('session');

		$Ses_id=$this->session->userdata('id');
		if ($Ses_id == NUll){redirect("welcome/index","refresh");}

		if($this->input->POST('btn-years')){
		$ch_year=$this->input->post('ch_year');
		$data = array(
			'years'=>$ch_year
		)  ;
		$this->session->set_userdata($data);
		redirect('teacher',"refresh");
	}
}
	public function index()
	{  
		$this->load->view('teacher/dashboard');
	}
///////////////////////////////////////////////////////////////////////////////----LINEUP/////////////////////////////////////
	public function room_lineup()
	{ 
		$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view("teacher/room_lineup",$data);
		
		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/room_lineup',"refresh");
				}
	}

	public function check_lineup($id)
	{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/check_lineup',$data);

		if($this->input->post('btn1')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_lineup/'.$id,"refresh");}
		
		if($this->input->post('btn2')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"2"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_lineup/'.$id,"refresh");}

		if($this->input->post('btn3')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"3"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_lineup/'.$id,"refresh");}

		if($this->input->post('SaveCheck')){
			$num = $this->input->post('num');
		$tcc=$this->session->userdata('t_code');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert 
		$data = array( 
		'terms' => $this->session->userdata('years'),
		'depwork' => $this->input->post('depwork'),
  		'type' => "1",
  		'std_id' => $this->input->post('code'.$i), 
  		'date'=> $this->session->userdata('chday'),
  		'd_time'=> date('H:i:s'),
  		't_id' => $this->session->userdata('t_code'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)),
		'gro' => $this->input->post('std_gro'));
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/show_lineup","refresh");
		exit();
		}


	}


	public function show_lineup()
	{ 
    	$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/show_lineup",$data);

		$data = array(
			'shdate'=>"",
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/show_lineup',"refresh");
				}
	}


	public function report_lineup($id)
	{	 
		if($this->input->POST('btn-years')){
		$ch_year=$this->input->post('ch_year');
		$data = array(
			'years'=>$ch_year
		)  ;
		$this->session->set_userdata($data);
		redirect('teacher',"refresh");
	}
		
		$chday=$this->session->userdata('chday');
		$years=$this->session->userdata('years');

		$chkt = "SELECT * FROM terms WHERE term_status = 'active'";
		$rst  = $this->db->query($chkt);
		$data['d_term']= $rst->result_array();
		
		foreach($rst->result() AS $d_terms){
			$yearsnow = $d_terms->term_name;
		}
		if ($years == $yearsnow){

			$data = array(
			'edit'=>'1'
		)  ;
		$this->session->set_userdata($data);
		
		
        $sql ="SELECT * FROM act_detail where gro='$id' AND date ='$chday' AND type = '1' "; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/report_lineup',$data);

		if($this->input->POST('btne')){
			
			$std_id=$this->input->POST('stdid');
			$btne=$this->input->POST('btn-e');
			$radioe= $this->input->POST('radio-e');
			$chk_old= $this->input->POST('chk_old');
			$old_c= $this->input->POST('old_c');
				if($old_c==NULL){
					echo "old_c = ".$old_c;
						$data = array(
									'status'=>$radioe,
							        'status_edit'=>$chk_old,
							        'date_edit'=>date("d/m/y"),
							        'time_edit'=>date("H:i:s"),						        
							);

							$this->db->where('std_id', $std_id);
							$this->db->where('date',$chday);
							$this->db->where('type',1);
							$this->db->update('act_detail', $data);
							//redirect('teacher/report_lineup/'.$id,"refresh");
						}
				if($old_c>'0'){
					echo "old_c = ".$old_c;
					$data = array(
									'status'=>$radioe,
							        'date_edit'=>date("d/m/y"),
							        'time_edit'=>date("H:i:s"),						        
							);

							$this->db->where('std_id', $std_id);
							$this->db->where('date',$chday);
							$this->db->where('type',1);
							$this->db->update('act_detail', $data);
							// redirect('teacher/report_lineup/'.$id,"refresh");
			}		
		}

		}else{ 
			$data = array(
			'edit'=>'0'
		)  ;
		$this->session->set_userdata($data);
		
		}
		
	}
//////////////////////////////////////////////////////////////////////////////////END--LINEUP/////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////---HOMEROOM/////////////////////////////////////
public function room_homeroom()
	{ 
		$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view("teacher/room_homeroom",$data);
		
		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/room_homeroom',"refresh");
				}
	}

	public function check_homeroom($id)
	{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/check_homeroom',$data);

		if($this->input->post('btn1')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_homeroom/'.$id,"refresh");}
		
		if($this->input->post('btn2')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"2"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_homeroom/'.$id,"refresh");}

		if($this->input->post('btn3')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"3"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_homeroom/'.$id,"refresh");}

		if($this->input->post('SaveCheck')){
			$num = $this->input->post('num');
		$tcc=$this->session->userdata('t_code');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert 
		$data = array( 
  		'type' => "2",
		'terms' => $this->session->userdata('years'),
		'depwork' => $this->input->post('depwork'),
  		'std_id' => $this->input->post('code'.$i), 
  		'date'=> $this->session->userdata('chday'),
  		'd_time'=> date('H:i:s'),
  		't_id' => $this->session->userdata('t_code'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)),
		'gro' => $this->input->post('std_gro'));
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/show_homeroom","refresh");
		exit();
		}


	}


	public function show_homeroom()
	{ 
    	$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/show_homeroom",$data);

		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/show_homeroom',"refresh");
				}
	}


	public function report_homeroom($id)
	{	 
		$chday=$this->session->userdata('chday');
        $sql ="SELECT * FROM act_detail where gro='$id' AND date ='$chday' AND type = '2' "; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/report_homeroom',$data);

		if($this->input->POST('btne')){
			
			$std_id=$this->input->POST('stdid');
			$btne=$this->input->POST('btn-e');
			$radioe= $this->input->POST('radio-e');
			$chk_old= $this->input->POST('chk_old');

			$old_c= $this->input->POST('old_c');
			if($old_c==NULL){
					$data = array(
								'status'=>$radioe,
						        'status_edit'=>$chk_old,
						        'date_edit'=>date("d/m/y"),
						        'time_edit'=>date("H:i:s"),						        
						);

						$this->db->where('std_id', $std_id);
						$this->db->where('date',$chday);
						$this->db->where('type',2);
						$this->db->update('act_detail', $data);
						redirect('teacher/report_homeroom/'.$id,"refresh");
					}
			
				if($old_c>'0'){
				$data = array(
								'status'=>$radioe,
						        'date_edit'=>date("d/m/y"),
						        'time_edit'=>date("H:i:s"),						        
						);

						$this->db->where('std_id', $std_id);
						$this->db->where('date',$chday);
						$this->db->where('type',2);
						$this->db->update('act_detail', $data);
						redirect('teacher/report_homeroom/'.$id,"refresh");
			}		
		}
	}
//////////////////////////////////////////////////////////////////////////////////END--HOMEROOM///////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////-----SCOUT/////////////////////////////////////
	public function room_scout()
	{ 
		$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view("teacher/room_scout",$data);
		
		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/room_scout',"refresh");
				}
	}

	public function check_scout($id)
	{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/check_scout',$data);

		if($this->input->post('btn1')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_scout/'.$id,"refresh");}
		
		if($this->input->post('btn2')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"2"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_scout/'.$id,"refresh");}

		if($this->input->post('btn3')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"3"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_scout/'.$id,"refresh");}

		if($this->input->post('SaveCheck')){
			$num = $this->input->post('num');
		$tcc=$this->session->userdata('t_code');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert 
		$data = array( 
  		'type' => "3",
		'terms' => $this->session->userdata('years'),
  		'std_id' => $this->input->post('code'.$i), 
		'depwork' => $this->input->post('depwork'),
  		'date'=> $this->session->userdata('chday'),
  		'd_time'=> date('H:i:s'),
  		't_id' => $this->session->userdata('t_code'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)),
		'gro' => $this->input->post('std_gro'));
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/show_scout","refresh");
		exit();
		}


	}


	public function show_scout()
	{ 
    	$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/show_scout",$data);

		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/show_scout',"refresh");
				}
	}


	public function report_scout($id)
	{	 
		$chday=$this->session->userdata('chday');
        $sql ="SELECT * FROM act_detail where gro='$id' AND date ='$chday' AND type = '3' "; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/report_scout',$data);

		if($this->input->POST('btne')){
			
			$std_id=$this->input->POST('stdid');
			$btne=$this->input->POST('btn-e');
			$radioe= $this->input->POST('radio-e');
			$chk_old= $this->input->POST('chk_old');
			$old_c= $this->input->POST('old_c');
			if($old_c==NULL){
					$data = array(
								'status'=>$radioe,
						        'status_edit'=>$chk_old,
						        'date_edit'=>date("d/m/y"),
						        'time_edit'=>date("H:i:s"),						        
						);

						$this->db->where('std_id', $std_id);
						$this->db->where('date',$chday);
						$this->db->where('type',3);
						$this->db->update('act_detail', $data);
						redirect('teacher/report_scout/'.$id,"refresh");
					}
			
				if($old_c>'0'){
				$data = array(
								'status'=>$radioe,
						        'date_edit'=>date("d/m/y"),
						        'time_edit'=>date("H:i:s"),						        
						);

						$this->db->where('std_id', $std_id);
						$this->db->where('date',$chday);
						$this->db->where('type',3);
						$this->db->update('act_detail', $data);
						redirect('teacher/report_scout/'.$id,"refresh");
			}		
		}
	}
//////////////////////////////////////////////////////////////////////////////////END--SCOUT/////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////-----DEPART/////////////////////////////////////
	public function room_depart()
	{ 
		$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view("teacher/room_depart",$data);
		
		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/room_depart',"refresh");
				}
	}

	public function check_depart($id)
	{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/check_depart',$data);

		if($this->input->post('btn1')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_depart/'.$id,"refresh");}
		
		if($this->input->post('btn2')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"2"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_depart/'.$id,"refresh");}

		if($this->input->post('btn3')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"3"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_depart/'.$id,"refresh");}

		if($this->input->post('SaveCheck')){
			$num = $this->input->post('num');
		$tcc=$this->session->userdata('t_code');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert 
		$data = array( 
  		'type' => "4",
  		'std_id' => $this->input->post('code'.$i), 
		'terms' => $this->session->userdata('years'),
  		'date'=> $this->session->userdata('chday'),
		'depwork' => $this->input->post('depwork'),
  		'd_time'=> date('H:i:s'),
  		't_id' => $this->session->userdata('t_code'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)),
		'gro' => $this->input->post('std_gro'));
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/show_depart","refresh");
		exit();
		}


	}


	public function show_depart()
	{ 
    	$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/show_depart",$data);

		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/show_depart',"refresh");
				}
	}


	public function report_depart($id)
	{	 
		$chday=$this->session->userdata('chday');
        $sql ="SELECT * FROM act_detail where gro='$id' AND date ='$chday' AND type = '4' "; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/report_depart',$data);

		if($this->input->POST('btne')){
			
			$std_id=$this->input->POST('stdid');
			$btne=$this->input->POST('btn-e');
			$radioe= $this->input->POST('radio-e');
			$chk_old= $this->input->POST('chk_old');
			$old_c= $this->input->POST('old_c');
			if($old_c==NULL){
					$data = array(
								'status'=>$radioe,
						        'status_edit'=>$chk_old,
						        'date_edit'=>date("d/m/y"),
						        'time_edit'=>date("H:i:s"),						        
						);

						$this->db->where('std_id', $std_id);
						$this->db->where('date',$chday);
						$this->db->where('type',4);
						$this->db->update('act_detail', $data);
						redirect('teacher/report_depart/'.$id,"refresh");
					}
			
				if($old_c>'0'){
				$data = array(
								'status'=>$radioe,
						        'date_edit'=>date("d/m/y"),
						        'time_edit'=>date("H:i:s"),						        
						);

						$this->db->where('std_id', $std_id);
						$this->db->where('date',$chday);
						$this->db->where('type',4);
						$this->db->update('act_detail', $data);
						redirect('teacher/report_depart/'.$id,"refresh");
			}		
		}
	}
//////////////////////////////////////////////////////////////////////////////////END--DEPART////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////----SPECIAL/////////////////////////////////////
	public function room_special()
	{ 
		$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view("teacher/room_lineup",$data);
		
		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/room_lineup',"refresh");
				}
	}

	public function check_special($id)
	{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/check_special',$data);

		if($this->input->post('btn1')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_special/'.$id,"refresh");}
		
		if($this->input->post('btn2')){
		$this->session->unset_userdata('btnchk');
			$data = array(
			'btnchk'=>"2"
			);
			$this->session->set_userdata($data);
			redirect('teacher/check_special/'.$id,"refresh");}


		if($this->input->post('SaveCheck')){
			$num = $this->input->post('num');
		$tcc=$this->session->userdata('t_code');
		for($i=1;$i<=$num;$i++){
		$chk  = $this->input->post('Checked'.$this->input->post('code'.$i))."<br>";
		//check_insert 
		$data = array( 
		'terms' => $this->session->userdata('years'),
		'depwork' => $this->input->post('depwork'),
  		'type' => "5",
  		'act_id'=>$this->session->userdata('choose_actid'),
  		'std_id' => $this->input->post('code'.$i), 
  		'date'=> $this->session->userdata('chday'),
  		'd_time'=> date('H:i:s'),
  		't_id' => $this->session->userdata('t_code'),
  		'status' => $this->input->post('Checked'.$this->input->post('code'.$i)),
		'gro' => $this->input->post('std_gro'));
   		$this->db->insert('act_detail', $data); 
		}
		if($i=$num)
			redirect("teacher/show_special","refresh");
		exit();
		}


	}
	public function choose_special(){
    	$code=$this->session->userdata('t_code');
    	$terms = $this->session->userdata('years');
		$sql ="SELECT * FROM activity where act_term='$terms' AND act_active='active'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/choose_special",$data);
		if($this->input->POST('btn_act')){
			$act_id = $this->input->POST('act_id');
			$data = array(
			'choose_actid'=> $act_id
			);
			$this->session->set_userdata($data);
			redirect('teacher/show_special','refresh');
		}
	}

	public function show_special()
	{ 
    	$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/show_special",$data);

		$data = array(
			'btnchk'=>"1"
			);
			$this->session->set_userdata($data);

	}



	public function report_special($id)
	{	 
		
		
		$years=$this->session->userdata('years');
		$choose_actid = $this->session->userdata('choose_actid');

		$chkt = "SELECT * FROM terms WHERE term_status = 'active'";
		$rst  = $this->db->query($chkt);
		$data['d_term']= $rst->result_array();
		
		foreach($rst->result() AS $d_terms){
			$yearsnow = $d_terms->term_name;
		}
		if ($years == $yearsnow){

			$data = array(
			'edit'=>'1'
		)  ;
		$this->session->set_userdata($data);
		
		
        $sql ="SELECT * FROM act_detail where gro='$id' AND act_id='$choose_actid' AND terms ='$years' "; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
        $data['std_gro']=$id; 
		$this->load->view('teacher/report_lineup',$data);

		if($this->input->POST('btne')){
			
			$std_id=$this->input->POST('stdid');
			$btne=$this->input->POST('btn-e');
			$radioe= $this->input->POST('radio-e');
			$chk_old= $this->input->POST('chk_old');
			$old_c= $this->input->POST('old_c');
				if($old_c==NULL){
					echo "old_c = ".$old_c;
						$data = array(
									'status'=>$radioe,
							        'status_edit'=>$chk_old,
							        'date_edit'=>date("d/m/y"),
							        'time_edit'=>date("H:i:s"),						        
							);

							$this->db->where('std_id', $std_id);
							$this->db->where('date',$chday);
							$this->db->where('type',1);
							$this->db->update('act_detail', $data);
							//redirect('teacher/report_lineup/'.$id,"refresh");
						}
				if($old_c>'0'){
					echo "old_c = ".$old_c;
					$data = array(
									'status'=>$radioe,
							        'date_edit'=>date("d/m/y"),
							        'time_edit'=>date("H:i:s"),						        
							);

							$this->db->where('std_id', $std_id);
							$this->db->where('date',$chday);
							$this->db->where('type',1);
							$this->db->update('act_detail', $data);
							// redirect('teacher/report_lineup/'.$id,"refresh");
			}		
		}

		}else{ 
			$data = array(
			'edit'=>'0'
		)  ;
		$this->session->set_userdata($data);
		
		}
		
	}
//////////////////////////////////////////////////////////////////////////////////END--special/////////////////////////////////////
	
/////////end report

//follow
	public function follow(){
		$code=$this->session->userdata('t_code');
		$term = $this->session->userdata('years');
		$sql ="SELECT distinct gro FROM act_detail WHERE t_id ='$code' AND terms ='$term' "; 
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();
		$this->load->view('teacher/follow',$data);
	}
	public function follow_std($id)
{
    	$tdp=$this->session->userdata('t_dep');
        $sql ="SELECT * FROM student where gro='$id'"; 
        $rs=$this->db->query($sql);
        $data['num'] = $rs->num_rows();
        $data['rs']=$rs->result_array();
		$this->load->view('teacher/follow_student',$data); 


		
}
	public function follow_show($id)
	{ 
		$code=$id;
		//$code = $this->input->post('std_id');
		$sql="SELECT * FROM student WHERE code='$code'";
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();

		$show=$rs->result();
		$std_level=$show[0]->std_level;
		$data['std_level']=$std_level;

		$std_id = $show[0]->code;



		$sql1_1="SELECT * FROM act_detail WHERE std_id='$std_id' AND type='1' AND status='1'";
		$rs1_1=$this->db->query($sql1_1);
		$act1_1 = $rs1_1->num_rows();

		$sql1_0="SELECT * FROM act_detail WHERE std_id='$std_id' AND type='1' AND status='0'";
		$rs1_0=$this->db->query($sql1_0);
		$act1_0 = $rs1_0->num_rows();
		/////////////////////////////////////////////////////////////////////////////////////
		$sql2_1="SELECT * FROM act_detail WHERE std_id='$code' AND type='2' AND status='1'";
		$rs2_1=$this->db->query($sql2_1);
		$act2_1 = $rs2_1->num_rows();

		$sql2_0="SELECT * FROM act_detail WHERE std_id='$code' AND type='2' AND status='0'";
		$rs2_0=$this->db->query($sql2_0);
		$act2_0 = $rs2_0->num_rows();
		/////////////////////////////////////////////////////////////////////////////////////
		$sql3_1="SELECT * FROM act_detail WHERE std_id='$code' AND type='3' AND status='1'";
		$rs3_1=$this->db->query($sql3_1);
		$act3_1 = $rs3_1->num_rows();

		$sql3_0="SELECT * FROM act_detail WHERE std_id='$code' AND type='3' AND status='0'";
		$rs3_0=$this->db->query($sql3_0);
		$act3_0 = $rs3_0->num_rows();
		////////////////////////////////////////////////////////////////////////////////////
		$sql4_1="SELECT * FROM act_detail WHERE std_id='$code' AND type='4' AND status='1'";
		$rs4_1=$this->db->query($sql4_1);
		$act4_1 = $rs4_1->num_rows();

		$sql4_0="SELECT * FROM act_detail WHERE std_id='$code' AND type='4' AND status='0'";
		$rs4_0=$this->db->query($sql4_0);
		$act4_0 = $rs4_0->num_rows();
		////////////////////////////////////////////////////////////////////////////////////
		$sql5_1="SELECT * FROM act_detail WHERE std_id='$code' AND type='5' AND status='1'";
		$rs5_1=$this->db->query($sql5_1);
		$act5_1 = $rs5_1->num_rows();

		$sql5_0="SELECT * FROM act_detail WHERE std_id='$code' AND type='5' AND status='0'";
		$rs5_0=$this->db->query($sql5_0);
		$act5_0 = $rs5_0->num_rows();
		////////////////////////////////////////////////////////////////////////////////////
		$data['act1_1']=$act1_1;
		$data['act1_0']=$act1_0;
		$data['act2_1']=$act2_1;
		$data['act2_0']=$act2_0;
		$data['act3_1']=$act3_1;
		$data['act3_0']=$act3_0;
		$data['act4_1']=$act4_1;
		$data['act4_0']=$act4_0;
		$data['act5_1']=$act5_1;
		$data['act5_0']=$act5_0;
		$this->load->view('teacher/follow_show',$data);

	}
//end follow
	
////////////////////06///////////////////////

	public function report06(){
		$code=$this->session->userdata('t_code');
		$sql ="SELECT * FROM teacher where teacher_code='$code'" ;
		$rs=$this->db->query($sql);
		$data['rs']=$rs->result_array();		
		$this->load->view("teacher/report06",$data);

		$data = array(
			'shdate'=>""
			);
			$this->session->set_userdata($data);

		if($this->input->POST('btn-date')){
		$data = array(
			'shdate'=>$this->input->POST('shoosedate')
			);
			$this->session->set_userdata($data);
			redirect('teacher/report06',"refresh");
				}
	}


////////////////////06///////////////////////

//profile
	public function profile()
	{
		$this->load->view('teacher/profile');
	}
//profile



	public function LogOut(){ 
		$this->session->sess_destroy('id');
		redirect("welcome/index","refresh");
	}

}