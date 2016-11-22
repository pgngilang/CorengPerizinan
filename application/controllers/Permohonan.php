<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Permohonan extends CI_Controller {
    public $data = array();
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->view('advice_planning', $this->data);
    }

    public function FormPerseorangan(){
      if($this->session->userdata('userDetail') == null)
        redirect(base_url().'Homepage/login');
      else
        $this->load->view('form_perseorangan',$this->data);
    }

    public function FormBadanUsaha(){
      if($this->session->userdata('userDetail') == null)
        redirect(base_url().'Homepage/login');
      else
        $this->load->view('form_badanusaha',$this->data);
    }

    public function TambahPermohonanPerseorangan(){
      $dataPermohonan['idIdentitas'] = $this->input->post('idIdentitas');
      $dataPermohonan['tanggalPermohonan'] = $this->input->post('tanggalPermohonan');
      $dataPermohonan['alamatPerihal'] = $this->input->post('alamatPerihal');
      $dataPermohonan['desaPerihal'] = $this->input->post('desaPerihal');
      $dataPermohonan['kecamatanPerihal'] = $this->input->post('kecamatanPerihal');
      $data['namaIdentitas'] = $this->input->post('namaIdentitas');
      $data['alamatIdentitas'] = $this->input->post('alamatIdentitas');
      $data['noTelpIdentitas'] = $this->input->post('noTelpIdentitas');
      $data['emailIdentitas'] = $this->input->post('emailIdentitas');
      $dataTanah['alamatTanah'] = $this->input->post('alamatTanah');
      $dataTanah['desaTanah'] = $this->input->post('desaTanah');
      $dataTanah['kecamatanTanah'] = $this->input->post('kecamatanTanah');
      $dataTanah['kabupatenTanah'] = $this->input->post('kabupatenTanah');
      $dataTanah['luasTanahKepemilikan'] = $this->input->post('luasTanahKepemilikan');
      $dataTanah['luasTanahDimohon'] = $this->input->post('luasTanahDimohon');
      $dataTanah['statusTanah'] = $this->input->post('statusTanah');
      $dataTanah['noShm'] = $this->input->post('noShm');
      $dataTanah['tahunShm'] = $this->input->post('tahunShm');
      $dataTanah['luasShm'] = $this->input->post('luasShm');
      $dataTanah['namaShm'] = $this->input->post('namaShm');
      $dataTanah['petokLetc'] = $this->input->post('petokLetc');
      $dataTanah['persilLetc'] = $this->input->post('persilLetc');
      $dataTanah['luasLetc'] = $this->input->post('luasLetc');
      $dataTanah['namaLetc'] = $this->input->post('namaLetc');
      $dataTanah['lainLain'] = $this->input->post('lainLain');
      $dataTanah['batasUtara'] = $this->input->post('batasUtara');
      $dataTanah['batasTimur'] = $this->input->post('batasTimur');
      $dataTanah['batasSelatan'] = $this->input->post('batasSelatan');
      $dataTanah['batasBarat'] = $this->input->post('batasBarat');
      $dataTanah['penggunaanSekarang'] = $this->input->post('penggunaanSekarang');
      $dataTanah['pembangunanBaru'] = $this->input->post('pembangunanBaru');
      $dataTanah['perluasan'] = $this->input->post('perluasan');

      $this->load->model('PermohonanModel');
      $statusTambah = $this->PermohonanModel->TambahPermohonan($dataPermohonan, $dataTanah, 1);

      if ($statusTambah) {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url());
      }
      else {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url()."Permohonan/FormPerseorangan");
      }

      // echo '<pre>';
      // print_r($data);
      // echo '</pre>';

    }

    public function TambahPermohonanBadanUsaha(){
      $dataPermohonan['idIdentitas'] = $this->input->post('idIdentitas');
      $dataPermohonan['tanggalPermohonan'] = $this->input->post('tanggalPermohonan');
      $dataPermohonan['alamatPerihal'] = $this->input->post('alamatPerihal');
      $dataPermohonan['desaPerihal'] = $this->input->post('desaPerihal');
      $dataPermohonan['kecamatanPerihal'] = $this->input->post('kecamatanPerihal');
      $data['namaIdentitas'] = $this->input->post('namaIdentitas');
      $data['alamatIdentitas'] = $this->input->post('alamatIdentitas');
      $data['noTelpIdentitas'] = $this->input->post('noTelpIdentitas');
      $data['emailIdentitas'] = $this->input->post('emailIdentitas');
      $dataTanah['alamatTanah'] = $this->input->post('alamatTanah');
      $dataTanah['desaTanah'] = $this->input->post('desaTanah');
      $dataTanah['kecamatanTanah'] = $this->input->post('kecamatanTanah');
      $dataTanah['kabupatenTanah'] = $this->input->post('kabupatenTanah');
      $dataTanah['luasTanahKepemilikan'] = $this->input->post('luasTanahKepemilikan');
      $dataTanah['luasTanahDimohon'] = $this->input->post('luasTanahDimohon');
      $dataTanah['statusTanah'] = $this->input->post('statusTanah');
      $dataTanah['noShm'] = $this->input->post('noShm');
      $dataTanah['tahunShm'] = $this->input->post('tahunShm');
      $dataTanah['luasShm'] = $this->input->post('luasShm');
      $dataTanah['namaShm'] = $this->input->post('namaShm');
      $dataTanah['petokLetc'] = $this->input->post('petokLetc');
      $dataTanah['persilLetc'] = $this->input->post('persilLetc');
      $dataTanah['luasLetc'] = $this->input->post('luasLetc');
      $dataTanah['namaLetc'] = $this->input->post('namaLetc');
      $dataTanah['lainLain'] = $this->input->post('lainLain');
      $dataTanah['batasUtara'] = $this->input->post('batasUtara');
      $dataTanah['batasTimur'] = $this->input->post('batasTimur');
      $dataTanah['batasSelatan'] = $this->input->post('batasSelatan');
      $dataTanah['batasBarat'] = $this->input->post('batasBarat');
      $dataTanah['penggunaanSekarang'] = $this->input->post('penggunaanSekarang');
      $dataTanah['pembangunanBaru'] = $this->input->post('pembangunanBaru');
      $dataTanah['perluasan'] = $this->input->post('perluasan');

      $this->load->model('PermohonanModel');
      $statusTambah = $this->PermohonanModel->TambahPermohonan($dataPermohonan, $dataTanah, 2);

      if ($statusTambah) {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url());
      }
      else {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url()."Permohonan/FormPerseorangan");
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
