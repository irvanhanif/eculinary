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
        $result = $db->query("INSERT INTO $this->tabel VALUES ($this->id_user, $this->id_menu, '$this->bintang')");
        return $result;
    }
}