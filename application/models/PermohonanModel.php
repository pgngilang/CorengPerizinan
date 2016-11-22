<?php
Class PermohonanModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function TambahPermohonan($dataPermohonan, $dataTanah, $jenis)
    {
      $sql = "insert into permohonan(id_user, tanggal, waktu, perihal, desa, kecamatan, jenis_permohonan, status_permohonan)
            values(?,?,now(),?,?,?,$jenis,1)";
      $query = $this->db->query($sql, $dataPermohonan);
      $getId = $this->db->query("select max(id_permohonan) as id from permohonan")->row();
      //echo "$idPermohonan->id";
      $idPermohonan = $getId->id;

      $sql2 = "insert into detail_tanah(id_permohonan, alamat, desa, kecamatan, kabupaten, luas_kepemilikan,
              luas_dimohon, status_tanah, no_shm, tahun_shm, luas_shm, an_shm, petok_letc, persil_letc,
              luas_letc, an_letc, lain_lain, batas_utara, batas_timur, batas_selatan, batas_barat,
              penggunaan_sekarang, rencana_pembangunan, rencana_perluasan) values($idPermohonan,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $query2 = $this->db->query($sql2, $dataTanah);

      if ($query && $query2) {
        return true;
      }
      else {
        return false;
      }
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
