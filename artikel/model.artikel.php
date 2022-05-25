<?php
class m_artikel{
    private $namaPenulis;
    private $judulArtikel;
    private $id_user;
    private $isiArtikel;
    private $image;
    
    private $id_artikel;

    private $tabel = "artikel";

    public function postArtikel($namaPenulis, $judulArtikel, $id_user, $isiArtikel, $image){
        $this->namaPenulis = $namaPenulis;
        $this->judulArtikel = $judulArtikel;
        $this->id_user = $id_user;
        $this->isiArtikel = $isiArtikel;
        $this->image = $image;
    }

    public function updateData($namaPenulis, $judulArtikel, $id_user, $isiArtikel, $image, $id_artikel){
        $this->namaPenulis = $namaPenulis;
        $this->judulArtikel = $judulArtikel;
        $this->id_user = $id_user;
        $this->isiArtikel = $isiArtikel;
        $this->image = $image;
        $this->id_artikel = $id_artikel;
    }

    public function insertArtikel($db){
        $result = $db->query("INSERT INTO $this->tabel VALUES ('', '$this->namaPenulis', '$this->judulArtikel', '$this->id_user', '$this->isiArtikel', '$this->image', NOW())");
        return $result;
    }

    public function updateArtikel($db){
        $result = $db->query("UPDATE $this->tabel SET nama_penulis = '$this->namaPenulis' judul_artikel = '$this->judulArtikel', id_user = '$this->id_user', isi_artikel = '$this->isiArtikel', image = '$this->image' WHERE id_artikel = $this->id_artikel");
        return $result;
    }

    public function deleteArtikel($db, $id_artikel){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_artikel = $id_artikel");
        return $result;
    }

    public function searchEngine($db, $keyword, $order, $flow){
        $query = "SELECT * FROM $this->tabel WHERE judul_artikel LIKE '%$keyword%'";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function getAllArtikel($db, $option, $id){
        $sql = "SELECT * FROM $this->tabel";
        if($option){
            if($option === 2) $sql = $sql . " WHERE id_user = $id";
            else $sql = $sql . " WHERE id_artikel = $id";
        }
        $result = $db->query($sql);
        return $result;
    }

    public function getIdUser($db, $id_artikel){
        $result = $db->query("SELECT id_user FROM $this->tabel WHERE id_artikel = $id_artikel");
        return $result;
    }
}