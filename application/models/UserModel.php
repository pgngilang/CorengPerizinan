<?php
Class UserModel extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function GetUser($username, $password)
    {
        $query = $this->db->query("select * from user where email = '$username' and pass = md5('$password')");
        $data = $query->row();
        if (!isset($data)) {
          return NULL;
        }
        else {
          $user = array(
            'idUser' => $data->id_user,
            'email' => $data->email,
            'password' => $data->pass,
            'nama' => $data->nama,
            'alamat' => $data->alamat,
            'noTelp' => $data->no_telp,
            'statusAktif' => $data->status_aktif,
            'tanggalDaftar' => $data->tanggal_daftar,
            'role' => $data->role
          );
        }
        return $user;
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
