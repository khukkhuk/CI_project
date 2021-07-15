<?php 
echo "test";
$hello = "hello";
echo $hello;


$conn=mysqli_connect("localhost","root","myadmin-uroot-p243","activity");

		$query_hdr = $this->db->query("SELECT * From terms ");
		$chk_hdr = $query_hdr->num_rows();
		// $sql =  "SELECT * FROM terms";

		echo $chk_hdr;

?>