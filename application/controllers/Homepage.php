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

    public function Register(){
      $this->load->view('home/Register');
    }

    public function logout(){
      $this->session->unset_userdata('userDetail');
      redirect(base_url().'Homepage/login');
    }

    public function PostLogin(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      //echo "$username - $password";
      $this->load->model('UserModel');
      $data = $this->UserModel->GetUser($username, $password);
      if ($data == null) {
        redirect(base_url().'Homepage/login');
      }
      else {
        if ($data['role'] == 1) {
          $this->session->set_userdata('userDetail', $data);
          redirect(base_url().'Admin');
        }
        elseif ($data['role'] == 2) {
          $this->session->set_userdata('userDetail', $data);
          redirect(base_url());
        }
      }
    }

    public function PostRegister(){
      $data['email'] = $this->input->post('email');
      $pass = $this->input->post('password');
      $data['password'] = md5($pass);
      //$data['password'] = $this->input->post('password');
      $data['nama'] = $this->input->post('nama');
      $data['alamat'] = $this->input->post('alamat');
      $data['noTelp'] = $this->input->post('noTelp');
      //echo "$username - $password";
      $this->load->model('UserModel');
      $statusDaftar = $this->UserModel->TambahUser($data, 2);
      $data = $this->UserModel->GetUser($data['email'], $pass);
      if ($data == null) {
        redirect(base_url().'Homepage/Register');
      }
      else {
        if ($data['role'] == 1) {
          $this->session->set_userdata('userDetail', $data);
          redirect(base_url().'Admin');
        }
        elseif ($data[role] == 2) {
          $this->session->set_userdata('userDetail', $data);
          redirect(base_url());
        }
      }
    }

    public function contact(){
        $this->load->view('contact', $this->data);
    }

    public function form_perseorangan(){
      if($this->session->userdata('userDetail') == null)
        redirect(base_url().'Homepage/login');
      else
        $this->load->view('form_perseorangan',$this->data);
    }

    public function form_badan(){
      if($this->session->userdata('userDetail') == null)
        redirect(base_url().'Homepage/login');
      else
        $this->load->view('form_badanusaha',$this->data);
    }

}
