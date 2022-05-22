<?php
class m_rating{
    private $id_user;
    private $id_menu;
    private $bintang;

    private $tabel = "rating";

    public function postRating($id_user, $id_menu, $bintang){
        $this->id_user = $id_user;
        $this->id_menu = $id_menu;
        $this->bintang = $bintang;
    }

    public function insertRating($db){
        $result = $db->query("INSERT INTO $this->tabel VALUES ('$this->bintang', $this->id_user, $this->id_menu)");
        return $result;
    }

    public function checkRating($db){
        $result = $db->query("SELECT * FROM $this->tabel WHERE id_user = $this->id_user AND id_menu = $this->id_menu");
        return $result;
    }

    public function deleteRating($db){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_user = $this->id_user AND id_menu = $this->id_menu");
        return $result;
    }

}