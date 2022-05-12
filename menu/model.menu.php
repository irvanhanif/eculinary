<?php
class m_menu{
    private $nama_menu;
    private $harga;
    private $kategori;
    private $jenis;
    private $id_toko;
    private $avatar;

    private $id_menu;

    private $tabel = "menu";

    public function postMenu($nama_menu, $harga, $kategori, $jenis, $id_toko, $avatar){
        $this->nama_menu = $nama_menu;
        $this->harga = $harga;
        $this->kategori = $kategori;
        $this->jenis = $jenis;
        $this->id_toko = $id_toko;
        $this->avatar = $avatar;
    }

    public function insertMenu($db){
        $result = $db->query("INSERT INTO $this->tabel VALUES ('', '$this->nama_menu', '$this->harga', '$this->jenis', '$this->kategori', $this->id_toko, '$this->avatar')");
        return $result;
    }

    public function updateDataMenu($nama_menu, $harga, $kategori, $jenis, $id_toko, $id_menu, $avatar){
        $this->nama_menu = $nama_menu;
        $this->harga = $harga;
        $this->kategori = $kategori;
        $this->jenis = $jenis;
        $this->id_menu = $id_menu;
        $this->avatar = $avatar;
    }

    public function updateMenu($db){
        $result = $db->query("UPDATE $this->tabel SET nama_menu = '$this->nama_menu', harga = '$this->harga', kategori = '$this->kategori', jenis = '$this->jenis' WHERE id_menu = $this->id_menu");
        return $result;
    }

    public function deleteMenu($db, $id_menu){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_menu = $id_menu");
        return $result;
    }

    public function getAllMenu($db, $order, $flow){
        $query = "SELECT * FROM $this->tabel";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query();
        return $result;
    }

    public function getAllMenuToko($db, $id_toko, $order, $flow){
        $query = "SELECT * FROM $this->tabel WHERE id_toko = $id_toko";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function searchEngine($db, $keyword, $order, $flow){
        $query = "SELECT * FROM $this->tabel WHERE nama_menu LIKE '%$keyword%'";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function filterMenubyKategori($db, $kategori, $order, $flow){
        $query = "SELECT * FROM $this->tabel WHERE kategori = '$kategori'";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }
    
    public function filterMenubyJenis($db, $jenis, $order, $flow){
        $query = "SELECT * FROM $this->tabel WHERE jenis = '$jenis'";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function getIdToko($db, $id_menu){
        $result = $db->query("SELECT id_toko FROM $this->tabel WHERE id_menu = $id_menu");
        return $result;
    }
}