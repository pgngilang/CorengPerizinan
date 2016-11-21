<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Homepage extends CI_Controller {
    public $data = array();
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->view('advice_planning', $this->data);
    }

    public function login(){
      $this->load->view('home/login');
    }

    public function PostLogin(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      echo "$username - $password";
    }

    public function contact(){
        $this->load->view('contact', $this->data);
    }

    public function form_perseorangan(){
        $this->load->view('form_perseorangan',$this->data);
    }

    public function form_badan(){
        $this->load->view('form_badanusaha',$this->data);
    }

}
