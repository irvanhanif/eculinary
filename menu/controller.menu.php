<?php
if(isset($menuPath)){
    require_once $menuPath . "config.php";
    require_once $menuPath . "toko/model.toko.php";
    require_once $menuPath . "uploadHandler.php";
}else{
    require_once "./config.php";
    require_once "./toko/model.toko.php";
    require_once "./uploadHandler.php";
}
require_once "model.menu.php";
require_once "model.komentar.php";
require_once "model.rating.php";
require_once "model.wishlist.php";

class c_menu{
    private $model;
    private $komentar;
    private $rating;
    private $wishlist;
    private $conn;

    public function __construct(){
        if (!isset($_SESSION)) session_start();
        $this->model = new m_menu();
        $this->conn = new database();
    }

    public function createMenu($nama_menu, $harga, $jenis, $kategori, $avatar){
        // echo "hehe";
        if(isset($_SESSION["user-culinary"])){
            $pathAvatar = (new uploadHandler($avatar))->uploadAvatar('menu');
            $id_toko = (new m_toko())->getIdToko($this->conn, $_SESSION["user-culinary"]["id_user"])[0]["id_toko"];
            $this->model->postMenu($nama_menu, $harga, $jenis, $kategori, $id_toko, $pathAvatar);
            $result = $this->model->insertMenu($this->conn);
            return $result;
        }else return false;
    }
    
    public function updateMenu($nama_menu, $harga, $kategori, $jenis, $avatar, $id_menu){
        if(isset($_SESSION["user-culinary"])){
            if($this->model->getIdToko($this->conn, $id_menu)[0]["id_toko"] === (new m_toko())->getIdToko($this->conn, $_SESSION["user-culinary"]["id_user"])[0]["id_toko"]){
                $pathAvatar = (new uploadHandler($avatar))->uploadAvatar('menu');
                $this->model->updateDataMenu($nama_menu, $harga, $kategori, $jenis, $id_menu, $pathAvatar);
                $result = $this->model->updateMenu($this->conn);
                return $result;    
            }else return false;
        }else return false;
    }

    public function deleteMenu($id_menu){
        if(isset($_SESSION["user-culinary"])){
            if($this->model->getIdToko($this->conn, $id_menu)[0]["id_toko"] === ((new m_toko())->getIdToko($this->conn, $_SESSION["user-culinary"]["id_user"])[0]["id_toko"])){
                $result = $this->model->deleteMenu($this->conn, $id_menu);
                return $result;
            }else return false;
        }else return false;
    }

    public function getMenu($id_menu){
        $result = $this->model->getMenu($this->conn, $id_menu);
        return $result;
    }

    public function getAllMenu($filter, $value, $order, $flow){
        $result = $this->model->getAllMenu($this->conn, $filter, $value, $order, $flow);
        return $result;
    }

    public function getAllMenuToko($id_toko, $order, $flow){
        $result = $this->model->getAllMenuToko($this->conn, $id_toko, $order, $flow);
        return $result;
    }

    public function searchMenu($keyword, $filter, $value, $order, $flow){
        $result = $this->model->searchEngine($this->conn, $keyword, $filter, $value, $order, $flow);
        return $result;
    }

    public function filterJenis($jenis, $order, $flow){
        $result = $this->model->filterMenubyJenis($this->conn, $jenis, $order, $flow);
        return $result;
    }

    public function filterKategori($kategori, $filter, $value, $order, $flow){
        $result = $this->model->filterMenubyKategori($this->conn, $kategori, $filter, $value, $order, $flow);
        return $result;
    }

    public function filterKota($kota, $order, $flow){
        $result = $this->model->filterMenubyKategori($this->conn, $kategori, $order, $flow);
        return $result;
    }

    public function createKomentar($id_menu, $isiKomentar){
        if(isset($_SESSION["user-culinary"])){
            $this->komentar = new m_komentar();
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->komentar->postKomentar($id_user, $id_menu, $isiKomentar, '');
            $result = $this->komentar->insertKomentar($this->conn);
            return $result;
        }else return false;
    }

    public function getAllKomentar($id_menu){
        $this->komentar = new m_komentar();
        $result = $this->komentar->getKomentar($this->conn, $id_menu);
        return $result;
    }

    public function createRating($id_menu, $bintang){
        if(isset($_SESSION["user-culinary"])){
            $this->rating = new m_rating();
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->rating->postRating($id_user, $id_menu, $bintang);
            if(count($this->rating->checkRating($this->conn)) > 0){
                $this->rating->deleteRating($this->conn);
            }
            $result = $this->rating->insertRating($this->conn);
            return $result;
        }else return false;
    }

    public function getBintang($id_menu){
        $this->rating = new m_rating();
        $this->rating->postRating('', $id_menu, '');
        $result = $this->rating->getRating($this->conn);
        if(count($result) > 0) $result = $result[0];
        return $result;
    }

    public function getRating($id_menu){
        if(isset($_SESSION["user-culinary"])){
            $this->rating = new m_rating();
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->rating->postRating($id_user, $id_menu, '');
            $result = $this->rating->checkRating($this->conn);
            return $result;
        }else return false;
    }

    public function createWishlist($id_menu){
        if(isset($_SESSION["user-culinary"])){
            $this->wishlist = new m_wishlist();
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->wishlist->postWishlist($id_user, $id_menu);
            $cek = $this->wishlist->checkWishlist($this->conn);
            if($cek){
                $result = $this->wishlist->deleteWishlist($this->conn);
            }else{
                $result = $this->wishlist->insertWishlist($this->conn);
            }
            return $result;
        }else return false;
    }

    public function checkMyWishlist($id_menu){
        if(isset($_SESSION["user-culinary"])){
            $this->wishlist = new m_wishlist();
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->wishlist->postWishlist($id_user, $id_menu);
            $result = $this->wishlist->checkWishlist($this->conn);
            return $result;
        }else return false;
    }

    public function myWishlist(){
        if(isset($_SESSION["user-culinary"])){
            $this->wishlist = new m_wishlist();
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->wishlist->getMyWishlist($this->conn, $id_user);
            return $result;
        }else return false;
    }
}