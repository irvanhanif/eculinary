<?php
require_once "./config.php";
require "model.user.php";
class c_user{
    private $model;
    private $conn;

    public function __construct(){
        if (!isset($_SESSION)) session_start();
        $this->model = new m_user();
        $this->conn = new database();
    }
    public function register($username, $email, $password){
        $this->model->dataLogin($email, $password);
        $result = $this->model->selectUserWithEmail($this->conn);
        if(isset($result["id_user"])) {
            echo "email already exist";
            return false;
        }
        $this->model->postUser($username, $email, $password);
        $result = $this->model->insertUser($this->conn);
        if(!$result) {
            echo "something wrong when register";
            return false;
        }
        $result = $this->model->selectUserWithEmail($this->conn);
        unset($result["password"]);
        $_SESSION["user-culinary"] = $result;
        return true;
    }

    public function login($email, $password){
        $this->model->dataLogin($email, $password);
        $result = $this->model->selectUserWithEmail($this->conn);
        if(!isset($result["id_user"])) {
            echo "incorrect email";
            return false;
        }
        else if($result["password"] !== md5($password)) {
            echo "incorrect password";
            return false;
        }
        unset($result["password"]);
        $_SESSION["user-culinary"] = $result;
        return true;
    }

    public function logout(){
        unset($_SESSION["user-culinary"]);
        session_destroy();
    }

    public function updateAkun($username, $nama, $email, $nomorTelepon, $alamat, $jenisKelamin, $tanggalLahir){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $this->model->dataEdit($username, $nama, $email, $nomorTelepon, $alamat, $jenisKelamin, $tanggalLahir, $id_user);
            $result = $this->model->editUser($this->conn);
            return $result;
        }return false;
    }

    public function updatePassword($newPassword){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->dataEditPassword($newPassword, $id_user, $this->conn);
            return $result;
        }return false;
    }
    
    public function inputToken($token){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->inputTokenPassword($token, $id_user, $this->conn);
            return $result;
        }return false;
    }

    public function deleteUser(){
        if(isset($this->model)){
            $id_user = $_SESSION["user-culinary"]["id_user"];
            $result = $this->model->deleteUser($this->conn, $id_user);
            return $result;
        }return false;
    }
}