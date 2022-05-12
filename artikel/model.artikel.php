<?php
class m_artikel{
    private $judulArtikel;
    private $id_user;
    private $isiArtikel;
    
    private $id_artikel;

    private $tabel = "artikel";

    public function postArtikel($judulArtikel, $id_user, $isiArtikel){
        $this->judulArtikel = $judulArtikel;
        $this->id_user = $id_user;
        $this->isiArtikel = $isiArtikel;
    }

    public function updateData($judulArtikel, $id_user, $isiArtikel, $id_artikel){
        $this->judulArtikel = $judulArtikel;
        $this->id_user = $id_user;
        $this->isiArtikel = $isiArtikel;
        $this->id_artikel = $id_artikel;
    }

    public function insertArtikel($db){
        $result = $db->query("INSERT INTO $this->tabel VALUES ('', '$this->judulArtikel', '$this->id_user', '$this->isiArtikel', NOW())");
        return $result;
    }

    public function updateArtikel($db){
        $result = $db->query("UPDATE $this->tabel SET judul_artikel = '$this->judulArtikel', id_user = '$this->id_user', isi_artikel = '$this->isiArtikel' WHERE id_artikel = $this->id_artikel");
        return $result;
    }

    public function deleteArtikel($db, $id_artikel){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_artikel = $id_artikel");
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