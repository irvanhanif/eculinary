<?php
class m_user{
    private $username;
    private $nama;
    private $email;
    private $nomorTelepon;
    private $alamat;
    private $jenisKelamin;
    private $tanggalLahir;
    private $password;
    private $avatar;
    private $tokenChangePassword;
    private $id_user;

    private $tabel = "user";

    public function postUser($username, $email, $password){
        $this->username = $username;
        $this->email = $email;
        $this->password = md5($password);
    }

    public function insertUser($db){
        $result = $db->query("INSERT INTO $this->tabel (username, email, password) VALUES ('$this->username', '$this->email', '$this->password')");
        return $result;
    }

    public function dataLogin($email, $password){
        $this->email = $email;
        $this->password = md5($password);
    }

    public function selectUserWithEmail($db){
        $result = $db->query("SELECT * FROM $this->tabel WHERE email = '$this->email'");
        return $result;
    }

    public function dataEdit($username, $nama, $email, $nomorTelepon, $alamat, $jenisKelamin, $tanggalLahir, $avatar, $id_user){
        $this->username = $username;
        $this->nama = $nama;
        $this->email = $email;
        $this->nomorTelepon = $nomorTelepon;
        $this->alamat = $alamat;
        $this->jenisKelamin = $jenisKelamin;
        $this->tanggalLahir = $tanggalLahir;
        $this->avatar = $avatar;
        $this->id_user = $id_user;
    }

    public function editUser($db){
        $result = $db->query("UPDATE $this->tabel SET username = '$this->username', nama = '$this->nama', email = '$this->email', nomor_telepon = '$this->nomorTelepon', alamat = '$this->alamat', jenis_kelamin = '$this->jenisKelamin', tanggal_lahir = '$this->tanggalLahir', avatar = '$this->avatar' WHERE id_user = '$this->id_user'");
        return $result;
    }

    public function dataEditPassword($password, $id_user, $db){
        $this->password = md5($password);
        $token = rand(1000, 9999);
        $this->tokenChangePassword = md5($token);
        $this->id_user = $id_user;
        $db->query("UPDATE $this->tabel SET token_change_password = '$this->tokenChangePassword' WHERE id_user = $this->id_user");
        $_SESSION["password"] = $this->password;
        return $token;
    }

    public function inputTokenPassword($tokenChangePassword, $id_user, $db){
        $password = $_SESSION["password"];
        $this->id_user = $id_user;
        $result = $db->query("SELECT * FROM $this->tabel WHERE id_user = $this->id_user");
        if($result["token_change_password"] === substr(md5($tokenChangePassword), 0 , 4)) $result = $db->query("UPDATE $this->tabel SET password = '$password' WHERE id_user = '$this->id_user'");
        else $result = null;
        return $result;
    }

    public function deleteUser($db, $id_user){
        $result = $db->query("DELETE FROM $this->tabel WHERE id_user = $id_user");
        return $result;
    }

    public function getInfoAkun($db, $id_user){
        $result = $db->query("SELECT * FROM $this->tabel WHERE id_user = $id_user");
        return $result;
    }
    
}