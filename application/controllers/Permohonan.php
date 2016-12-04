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
      else{
        $this->load->model('PermohonanModel');
        $data['no_form'] = $this->PermohonanModel->GetForm();
        // echo $data['no_form'];
        $this->load->view('form_perseorangan',$data);
      }
    }

    public function FormBadanUsaha(){
      if($this->session->userdata('userDetail') == null)
        redirect(base_url().'Homepage/login');
      else{
        $this->load->model('PermohonanModel');
        $data['no_form'] = $this->PermohonanModel->GetForm();
        // echo $data['no_form'];
        $this->load->view('form_badanusaha',$data);
      }
    }

    public function TambahPermohonanPerseorangan(){
      $dataPermohonan['noForm'] = $this->input->post('noForm');
      $dataPermohonan['idIdentitas'] = $this->input->post('idIdentitas');
      $tempTanggal = $this->input->post('tanggalPermohonan');
      $dataPermohonan['tanggalPermohonan'] = date("Y-m-d", strtotime($tempTanggal));
      $dataPermohonan['alamatPerihal'] = $this->input->post('alamatPerihal');
      $dataPermohonan['desaPerihal'] = $this->input->post('desaPerihal');
      $dataPermohonan['kecamatanPerihal'] = $this->input->post('kecamatanPerihal');
      $dataPermohonan['namaBadanUsaha'] = null;
      $dataPermohonan['namaIdentitas'] = $this->input->post('namaIdentitas');
      $dataPermohonan['alamatIdentitas'] = $this->input->post('alamatIdentitas');
      $dataPermohonan['noTelpIdentitas'] = $this->input->post('noTelpIdentitas');
      $dataPermohonan['emailIdentitas'] = $this->input->post('emailIdentitas');
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
      $dataTanah['latitute'] = $this->input->post('latitute');
      $dataTanah['longitude'] = $this->input->post('longitude');

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
        $m = "Terima Kasih telah mengajukan Form Advise Planning, berkas anda sudah diterima, silahkan menunggu konfirmasi";
        $this->send($dataPermohonan['emailIdentitas'],$m);
        redirect(base_url());
      }
      else {
        $this->session->set_flashdata('message', 'anda berhasil menginput data');
        redirect(base_url()."Permohonan/FormPerseorangan");
      }
    }

    public function TambahPermohonanBadanUsaha(){
      $dataPermohonan['noForm'] = $this->input->post('noForm');
      $dataPermohonan['idIdentitas'] = $this->input->post('idIdentitas');
      $tempTanggal = $this->input->post('tanggalPermohonan');
      $dataPermohonan['tanggalPermohonan'] = date("Y-m-d", strtotime($tempTanggal));
      $dataPermohonan['alamatPerihal'] = $this->input->post('alamatPerihal');
      $dataPermohonan['desaPerihal'] = $this->input->post('desaPerihal');
      $dataPermohonan['kecamatanPerihal'] = $this->input->post('kecamatanPerihal');
      $dataPermohonan['namaBadanUsaha'] = $this->input->post('namaBadanUsaha');
      $dataPermohonan['namaIdentitas'] = $this->input->post('namaIdentitas');
      $dataPermohonan['alamatIdentitas'] = $this->input->post('alamatIdentitas');
      $dataPermohonan['noTelpIdentitas'] = $this->input->post('noTelpIdentitas');
      $dataPermohonan['emailIdentitas'] = $this->input->post('emailIdentitas');
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
      $dataTanah['latitute'] = $this->input->post('latitute');
      $dataTanah['longitude'] = $this->input->post('longitude');

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
        $m = "Terima Kasih telah mengajukan Form Advise Planning, berkas anda sudah diterima, silahkan menunggu konfirmasi";
        $this->send($dataPermohonan['emailIdentitas'],$m);
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
      $data['survey'] = $this->PermohonanModel->CekSurvey($id);

      if ($jenis == 1) {
        $this->load->view('DetailPerseorangan', $data);
      }
      else {
        $this->load->view('DetailBadanUsaha', $data);
      }
    }

    public function DetailSurvey($id){
      $this->load->model('PermohonanModel');
      $tempData = $this->PermohonanModel->DetailSurvey($id);

      $data['detail'] = $tempData;
      $data['file'] = $this->PermohonanModel->ListFileSurvey($id);

      $this->load->view('DetailSurvey', $data);
    }

    public function GantiStatusPermohonan(){
      $id = $this->input->post('id');
      $status = $this->input->post('status');
      $this->load->model('PermohonanModel');
      $this->PermohonanModel->GantiStatus($id, $status);
      if($status == 5){
        $email = $this->PermohonanModel->GetEmail($id);
        $m = "Permohonan Advice Planning anda telah disetujui.";
        $this->send($email,$m);
      }
      elseif ($status == 6) {
        $email = $this->PermohonanModel->GetEmail($id);
        $m = "Permohonan Advice Planning anda telah ditolak.";
        $this->send($email,$m);
      }
      redirect(base_url()."Permohonan/DetailPermohonan/$id");
    }

    public function DataPengajuanUser(){
      $sess = $this->session->userdata('userDetail');
      $id = $sess['idUser'];
      $this->load->model('PermohonanModel');
      $data['permohonan'] = $this->PermohonanModel->ListPermohonanUser($id);
      $this->load->view('RiwayatPermohonan', $data);
    }

    public function TambahDokumen(){
      $idFile =  $this->input->post('id');
      $status =  $this->input->post('statusdokumen');
      $this->load->model('PermohonanModel');
      $this->load->library('Uploader');

      $uploader = new Uploader();
      $data = $uploader->upload($_FILES['files'], array(
        'limit' => 10, //Maximum Limit of files. {null, Number}
        'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => 'uploads/', //Upload directory {String}
        'title' => Array($idFile.'_tambahan_'.'{{file_name}}'), //New file name {null, String, Array} *please read documentation in README.md
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
            $this->PermohonanModel->TambahDokumen($idFile, $i['old_name'], $i['file'], $status);
          }
      }
      if($data['hasErrors']){
          $errors = $data['errors'];
          // echo '<pre>';
          // print_r($errors);
          // echo '</pre>';
      }
      redirect(base_url()."Permohonan/DetailPermohonan/".$idFile);
    }

    public function FormSurvey($id){
      $data['id'] = $id;
      if($this->session->userdata('userDetail') == null)
        redirect(base_url().'Homepage/login');
      else
        $this->load->view('form_survey', $data);
    }

    public function Survey(){
      $idFile =  $this->input->post('id');
      //$tanggal =  $this->input->post('tanggal');
      $tempTanggal = $this->input->post('tanggal');
      $tanggal = date("Y-m-d", strtotime($tempTanggal));
      $petugas = $this->input->post('nama');
      $keterangan =  $this->input->post('keterangan');
      $status = "file_survey";
      $this->load->model('PermohonanModel');
      $this->load->library('Uploader');

      $uploader = new Uploader();
      $data = $uploader->upload($_FILES['files'], array(
        'limit' => 10, //Maximum Limit of files. {null, Number}
        'maxSize' => 10, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => 'uploads/', //Upload directory {String}
        'title' => Array($idFile.'_survey_'.'{{file_name}}'), //New file name {null, String, Array} *please read documentation in README.md
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
            $this->PermohonanModel->TambahDokumen($idFile, $i['old_name'], $i['file'], $status);
          }
      }
      if($data['hasErrors']){
          $errors = $data['errors'];
          // echo '<pre>';
          // print_r($errors);
          // echo '</pre>';
      }
      $this->PermohonanModel->TambahSurvey($idFile, $tanggal, $petugas, $keterangan);
      redirect(base_url()."Permohonan/DetailPermohonan/".$idFile);
    }

    public function send($email, $pesan)
    {
      //error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      $ci = get_instance();
      $ci->load->library('email');
      $config['protocol'] = "smtp";
      $config['smtp_host'] = "ssl://smtp.gmail.com";
      //$config['smtp_host'] = "ssl://smtp.zoho.com";
      $config['smtp_port'] = "465";
      //$config['smtp_user'] = "customer@ngooyakk.com";
      $config['smtp_user'] = "dummy.ap.banyuwangi@gmail.com";
      $config['smtp_pass'] = "apdummy1234567890";
      $config['charset'] = "utf-8";
      $config['mailtype'] = "html";
      $config['newline'] = "\r\n";
      $config['validation']   = TRUE;

      $ci->email->initialize($config);
      $ci->email->from('dummy.ap.banyuwangi@gmail.com', '[no-replay] Advise Planning Banyuwangi');
      $list = array($email);
      $ci->email->to($list);
      $ci->email->subject('Advise Planning Banyuwangi');
      $m = $pesan;
      $ci->email->message($m);
      if ($this->email->send()) {
        //echo 'Email sent.';
      } else {
        //show_error($this->email->print_debugger());
      }
    }
}
