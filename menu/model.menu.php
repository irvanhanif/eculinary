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

    public function updateDataMenu($nama_menu, $harga, $kategori, $jenis, $id_menu, $avatar){
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

    public function getMenu($db, $id_menu){
        $result = $db->query("SELECT m.*, t.jam_awal, t.jam_akhir, t.kota,
        (SELECT AVG(bintang) FROM rating WHERE id_menu = $id_menu) as bintang
        FROM $this->tabel m JOIN toko t ON m.id_toko = t.id_toko WHERE m.id_menu = $id_menu");
        return $result;
    }

    public function getAllMenu($db, $filter, $value, $order, $flow){
        $query = "SELECT M.*, AVG(R.bintang) as bintang, t.kota FROM $this->tabel M LEFT JOIN rating R ON M.id_menu = R.id_menu LEFT JOIN toko t ON t.id_toko = M.id_toko";
        if($filter){
            $query = $query . " WHERE " . $filter . " = '" . $value . "' ";
        }
        $query = $query . " GROUP BY M.id_menu ";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function getAllMenuToko($db, $id_toko, $order, $flow){
        $query = "SELECT M.*, AVG(R.bintang) as bintang FROM $this->tabel M LEFT JOIN rating R ON M.id_menu = R.id_menu WHERE M.id_toko = $id_toko GROUP BY M.id_menu";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function searchEngine($db, $keyword, $filter, $value, $order, $flow){
        $query = "SELECT M.*, AVG(R.bintang) as bintang, t.kota FROM $this->tabel M LEFT JOIN rating R ON M.id_menu = R.id_menu LEFT JOIN toko t ON t.id_toko = M.id_toko WHERE M.nama_menu LIKE '%$keyword%' ";
        if($filter){
            $query = $query . " AND " . $filter . " = '" . $value . "' ";
        }
        $query = $query . " GROUP BY M.id_menu ";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    public function filterMenubyKategori($db, $kategori, $filter, $value, $order, $flow){
        $query = "SELECT M.*, AVG(R.bintang) as bintang, t.kota FROM $this->tabel M LEFT JOIN rating R ON M.id_menu = R.id_menu LEFT JOIN toko t ON t.id_toko = M.id_toko WHERE kategori = '$kategori' ";
        // if(count($filter) > 0){
        //     for ($i=0; $i < count($filter); $i++) { 
        //         $query = $query . " AND " . $filter->key . " " . $filter->value;
        //     }
        // }
        if($filter){
            $query = $query . " AND " . $filter . " = '" . $value . "' ";
        }
        $query = $query . " GROUP BY M.id_menu ";
        if($order){
            $query = $query . " ORDER BY $order";
            if($flow == 'down') $query = $query . " DESC";
        }
        $result = $db->query($query);
        return $result;
    }

    // public function filterMenubyKota($db, $kota){
    //     $query = "SELECT M.*, AVG(R.bintang) as bintang FROM $this->tabel M LEFT JOIN rating R ON M.id_menu = R.id_menu WHERE kategori = '$kategori' GROUP BY M.id_menu";
    //     if($order){
    //         $query = $query . " ORDER BY $order";
    //         if($flow == 'down') $query = $query . " DESC";
    //     }
    //     $result = $db->query($query);
    //     return $result;
    // }
    
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