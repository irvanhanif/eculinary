<?php
class m_wishlist{
    private $id_user;
    private $id_menu;

    private $tabel = "wishlist";

    public function postWishlist($id_user, $id_menu){
        $this->id_user = $id_user;
        $this->id_menu = $id_menu;
    }

    public function insertWishlist($db){
        $result = $db->query("INSERT INTO $this->tabel VALUES ($this->id_user, $this->id_menu)");
        return $result;
    }

    public function deleteWishlist($db){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_user = $this->id_user AND id_menu = $this->id_menu");
        return $result;
    }

    public function deleteAllWishlist($db, $id_user){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_user = $id_user");
        return $result;
    }

    public function checkWishlist($db){
        $result = $db->query("SELECT * FROM $this->tabel WHERE id_user = $this->id_user AND id_menu = $this->id_menu");
        return $result;
    }

    public function getMyWishlist($db, $id_user){
        $result = $db->query("SELECT w.*, m.*, AVG(R.bintang) as bintang FROM $this->tabel w JOIN menu m ON w.id_menu = m.id_menu LEFT JOIN rating R ON m.id_menu = R.id_menu WHERE w.id_user = $id_user GROUP BY m.id_menu");
        return $result;
    }

}