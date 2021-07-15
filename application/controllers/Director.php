<?php
class director extends CI_Controller //Controller ชื่อ product
{
public function __construct() //คือการเรียกใช้เป็นอันดับแรก
{
	//7071003	
        parent::__construct();
		 
}
public function index(){

	$this->load->view('director/dashboard');
}

}

?>