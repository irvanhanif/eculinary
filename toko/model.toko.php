<?php
class m_toko{
    private $namaToko;
    private $alamat;
    private $kota;
    private $email;
    private $nomorTelepon;
    private $id_user;
    private $jamAwal;
    private $jamAkhir;
    private $avatar;

    private $id_toko;

    private $tabel = "toko";

    public function postToko($namaToko, $alamat, $kota, $email, $nomorTelepon, $id_user, $jamAwal, $jamAkhir, $avatar){
        $this->namaToko = $namaToko;
        $this->alamat = $alamat;
        $this->kota = $kota;
        $this->email = $email;
        $this->nomorTelepon = $nomorTelepon;
        $this->id_user = $id_user;
        $this->jamAwal = $jamAwal;
        $this->jamAkhir = $jamAkhir;
        $this->avatar = $avatar;
    }

    public function createToko($db) {
        $result = $db->query("INSERT INTO $this->tabel VALUES('', '$this->namaToko', '$this->alamat', '$this->kota', '$this->email' ,'$this->nomorTelepon', '$this->id_user', '$this->jamAwal', '$this->jamAkhir', '$this->avatar')");
        return $result;
    }

    public function getDetailToko($db, $id_toko) {
        $result = $db->query("SELECT * FROM $this->tabel WHERE id_toko = $id_toko");
        return $result;
    }

    public function getAllToko($db){
        $result = $db->query("SELECT * FROM $this->tabel");
        return $result;
    }

    public function dataUpdate($namaToko, $alamat, $kota, $email, $nomorTelepon, $jamAwal, $jamAkhir, $avatar, $id_toko){
        $this->namaToko = $namaToko;
        $this->alamat = $alamat;
        $this->kota = $kota;
        $this->email = $email;
        $this->nomorTelepon = $nomorTelepon;
        $this->jamAwal = $jamAwal;
        $this->jamAkhir = $jamAkhir;
        $this->avatar = $avatar;
        $this->id_toko = $id_toko;
    }

    public function updateToko($db){
        $result = $db->query("UPDATE $this->tabel SET nama_toko = '$this->namaToko', alamat = '$this->alamat', kota = '$this->kota', email = '$this->email', nomor_telepon = '$this->nomorTelepon', jam_awal = '$this->jamAwal', jam_akhir = '$this->jamAkhir', avatar = '$this->avatar' WHERE id_toko = $this->id_toko");
        return $result;
    }

    public function deleteToko($db, $id_toko){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_toko = $id_toko");
        return $result;
    }

    public function filterLokasiToko($db, $kota){
        $result = $db->query("SELECT * FROM $this->tabel WHERE kota = '$kota'");
        return $result;
    }

    public function getIdToko($db, $id_user){
        $result = $db->query("SELECT id_toko FROM $this->tabel WHERE id_user = $id_user");
        return $result;
    }
}