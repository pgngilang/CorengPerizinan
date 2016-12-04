<?php
Class PermohonanModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function GetForm()
    {
      return $this->db->query("call sp_no_form()")->result();
    }

    public function TambahPermohonan($dataPermohonan, $dataTanah, $jenis)
    {
      $sql = "insert into permohonan(kode_form, id_user, tanggal, waktu, perihal, desa, kecamatan, jenis_permohonan, status_permohonan, badan_usaha, nama, alamat, no_telp, email)
            values(?,?,?,now(),?,?,?,$jenis,1,?,?,?,?,?)";
      $query = $this->db->query($sql, $dataPermohonan);
      $getId = $this->db->query("select max(id_permohonan) as id from permohonan")->row();
      //echo "$idPermohonan->id";
      $idPermohonan = $getId->id;

      $sql2 = "insert into detail_tanah(id_permohonan, alamat, desa, kecamatan, kabupaten, luas_kepemilikan,
              luas_dimohon, status_tanah, no_shm, tahun_shm, luas_shm, an_shm, petok_letc, persil_letc,
              luas_letc, an_letc, lain_lain, batas_utara, batas_timur, batas_selatan, batas_barat,
              penggunaan_sekarang, rencana_pembangunan, rencana_perluasan, lat_tanah, long_tanah) values($idPermohonan,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $query2 = $this->db->query($sql2, $dataTanah);

      $sql3 = "insert into log_perizinan(id_permohonan, waktu, status) values($idPermohonan, now(), 1)";
      $query3 = $this->db->query($sql3);

      if ($query && $query2 && $query3) {
        $ret = array('status' => true,
                    'id' => $idPermohonan );
        return $ret;
      }
      else {
        $ret = array('status' => false);
        return $ret;
      }
    }

    public function TambahDokumen($idPermohonan, $nama, $direktori, $status)
    {
      $sql = "insert into dokumen_perizinan(id_permohonan, nama, waktu_upload, direktori, status)
            values('$idPermohonan', '$nama', now(), '$direktori', '$status')";
      $query = $this->db->query($sql);
    }

    public function TambahSurvey($idPermohonan, $tanggal, $petugas, $keterangan)
    {
      $sql = "insert into hasil_survey(permohonan, tanggal, petugas, keterangan)
            values('$idPermohonan', '$tanggal', '$petugas', '$keterangan')";
      $query = $this->db->query($sql);
    }

    public function ListPermohonan($status)
    {
      $sql = "SELECT *,
              	COALESCE(jenis_permohonan.nama_jenis, permohonan.jenis_permohonan) AS jenis,
              	COALESCE(status_permohonan.nama_status, permohonan.status_permohonan) AS status,
                COALESCE(pengguna.nama, permohonan.id_user) AS nama_pemohon
              FROM permohonan
              LEFT JOIN jenis_permohonan
              ON jenis_permohonan.id_jenis=permohonan.jenis_permohonan
              LEFT JOIN status_permohonan
              ON status_permohonan.id_status=permohonan.status_permohonan
              LEFT JOIN pengguna
              ON pengguna.id_user=permohonan.id_user";
      if($status == "daftar")
        $sql = $sql." where status_permohonan = 1";
      elseif ($status == "proses")
        $sql = $sql . " where status_permohonan = 2 or status_permohonan = 3";
      elseif($status == "selesai")
      $sql = $sql . " where status_permohonan = 4 or status_permohonan = 5 or status_permohonan = 6";

      $query = $this->db->query($sql);
      return $query->result();
    }

    public function DetailPermohonan($id)
    {
      $sql = "SELECT *,
              	COALESCE(jenis_permohonan.nama_jenis, permohonan.jenis_permohonan) AS jenis,
              	COALESCE(status_permohonan.nama_status, permohonan.status_permohonan) AS STATUS
              FROM detail_tanah, permohonan, status_permohonan, jenis_permohonan
              WHERE permohonan.id_permohonan = detail_tanah.id_permohonan
              AND status_permohonan.id_status = permohonan.status_permohonan
              AND jenis_permohonan.id_jenis = permohonan.jenis_permohonan
              AND permohonan.id_permohonan = $id
              ";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function DetailSurvey($id)
    {
      $sql = "select * from hasil_survey where permohonan = $id";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function GantiStatus($id, $status)
    {
      $sql = "update permohonan set status_permohonan = $status where id_permohonan = $id";
      $query = $this->db->query($sql);

      $sql3 = "insert into log_perizinan(id_permohonan, waktu, status) values($id, now(), $status)";
      $query3 = $this->db->query($sql3);
    }

    public function ListPermohonanUser($id)
    {
      $sql = "SELECT *,
              	COALESCE(jenis_permohonan.nama_jenis, permohonan.jenis_permohonan) AS jenis,
              	COALESCE(status_permohonan.nama_status, permohonan.status_permohonan) AS status,
                COALESCE(pengguna.nama, permohonan.id_user) AS nama_pemohon
              FROM permohonan
              LEFT JOIN jenis_permohonan
              ON jenis_permohonan.id_jenis=permohonan.jenis_permohonan
              LEFT JOIN status_permohonan
              ON status_permohonan.id_status=permohonan.status_permohonan
              LEFT JOIN pengguna
              ON pengguna.id_user=permohonan.id_user
              where permohonan.id_user = $id";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function ListFile($id)
    {
      $sql = "select * from dokumen_perizinan where id_permohonan = $id";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function ListFileSurvey($id)
    {
      $sql = "select * from dokumen_perizinan where id_permohonan = $id and status='file_survey'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function CekSurvey($id)
    {
      $sql = "select count(1) as jum from hasil_survey where permohonan = $id";
      $query = $this->db->query($sql)->result();
      foreach($query as $q){
        $ada = $q->jum;
      }

      if ($ada == 0) {
        return 0;
      }
      else {
        return 1;
      }
    }

    public function GetEmail($id)
    {
      $sql = "select email from permohonan where id_permohonan = $id";
      $query = $this->db->query($sql)->result();
      foreach($query as $q){
        $email = $q->email;
      }
      return $email;
    }

	/*
	--untuk hasilkan query
	public function nama_fungsi($parameter1, $parameter2)
    {
        $query = $this->db->query("query statement");
        $data = $query->result();
        return $data;
    }
	*/
}

?>
