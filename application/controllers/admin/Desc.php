<?php
  defined ('BASEPATH') OR exit('No direct script access allowed');

  class Desc extends CI_Controller
  {
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model("admin/desc_model");
  		$this->load->library('form_validation');
  	}

  	public function index()
  	{
      $data["view_user"] = $this->desc_model->getAll();
      $this->load->view("admin/desc/list",$data);
    }

    
  }

 ?>
