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
        redirect(base_url().'Homepage');
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

      $idFile =  $statusTambah['id'];
      $this->load->library('Uploader');

      $uploader = new Uploader();
      $data = $uploader->upload($_FILES['files'], array(
        'limit' => 10, //Maximum Limit of files. {null, Number}
        'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => 'uploads/', //Upload directory {String}
        'title' => Array($idFile.'_'.'{{file_name}}'), //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'replace' => true, //Replace the file if it already exists  {Boolean}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
      ));

      if($data['isComplete']){
          $info = $data['data'];
          // echo '<pre>';
          // print_r($info);
          // echo '</pre>';

          foreach($info['metas'] as $i)
          {
            $this->PermohonanModel->TambahDokumen($idFile, $i['old_name'], $i['file'], 'file_permohonan');
          }
      }
      if($data['hasErrors']){
          $errors = $data['errors'];
          // echo '<pre>';
          // print_r($errors);
          // echo '</pre>';
      }

      if ($statusTambah) {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url());
      }
      else {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url()."Permohonan/FormPerseorangan");
      }
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

      $idFile =  $statusTambah['id'];
      $this->load->library('Uploader');

      $uploader = new Uploader();
      $data = $uploader->upload($_FILES['files'], array(
        'limit' => 10, //Maximum Limit of files. {null, Number}
        'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => 'uploads/', //Upload directory {String}
        'title' => Array($idFile.'_'.'{{file_name}}'), //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'replace' => true, //Replace the file if it already exists  {Boolean}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
      ));

      if($data['isComplete']){
          $info = $data['data'];
          // echo '<pre>';
          // print_r($info);
          // echo '</pre>';

          foreach($info['metas'] as $i)
          {
            $this->PermohonanModel->TambahDokumen($idFile, $i['old_name'], $i['file'], 'file_permohonan');
          }
      }
      if($data['hasErrors']){
          $errors = $data['errors'];
          // echo '<pre>';
          // print_r($errors);
          // echo '</pre>';
      }

      if ($statusTambah) {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url());
      }
      else {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url()."Permohonan/FormPerseorangan");
      }
    }

    public function DetailPermohonan($id){
      $this->load->model('PermohonanModel');
      $tempData = $this->PermohonanModel->DetailPermohonan($id);
      foreach($tempData as $dat){
        $jenis = $dat->jenis_permohonan;
      }
      $data['detail'] = $tempData;
      $data['file'] = $this->PermohonanModel->ListFile($id);

      if ($jenis == 1) {
        $this->load->view('DetailPerseorangan', $data);
      }
      else {
        $this->load->view('DetailBadanUsaha', $data);
      }

    }

    public function GantiStatusPermohonan(){
      $id = $this->input->post('id');
      $status = $this->input->post('status');
      $this->load->model('PermohonanModel');
      $this->PermohonanModel->GantiStatus($id, $status);
      redirect(base_url()."Permohonan/DetailPermohonan/$id");
    }

    public function DataPengajuanUser(){
      $sess = $this->session->userdata('userDetail');
      $id = $sess['idUser'];
      $this->load->model('PermohonanModel');
      $data['permohonan'] = $this->PermohonanModel->ListPermohonanUser($id);
      $this->load->view('RiwayatPermohonan', $data);
    }
}
