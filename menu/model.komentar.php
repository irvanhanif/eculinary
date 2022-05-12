<?php
class m_komentar{
    private $id_user;
    private $id_menu;
    private $isi_komentar;

    private $id_komentar = null;

    private $tabel = "komentar";

    public function postKomentar($id_user, $id_menu, $isi_komentar, $id_komentar){
        $this->id_user = $id_user;
        $this->id_menu = $id_menu;
        $this->isi_komentar = $isi_komentar;
        if($id_komentar) $this->id_komentar = $id_komentar;
    }

    public function insertKomentar($db){
        $result = $db->query("INSERT INTO $this->tabel VALUES ($this->id_user, $this->id_menu, '$this->isi_komentar', $this->id_komentar)");
        return $result;
    }

    public function deleteKomentar($db, $id_user, $id_menu){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_user = $id_user AND id_menu = $id_menu");
        return $result;
    }
}