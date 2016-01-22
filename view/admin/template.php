<?php
	$this->load->view('admin/common/header');	
	$this->load->view('admin/common/left_side');
	$this->load->view(@$file);
	$this->load->view('admin/common/footer');
?>