<?php
class database{
    private $host= "localhost";
    private $user= "root";
    private $pass= "rahasia";
    private $db= "eculinary";

    private $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if($this->conn-> connect_errno) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
    }

    public function query($query){
        // echo $query . "<br>";
        $data = array();
        $result = mysqli_query($this->conn, $query);
        // var_dump($result);
        if(!is_bool($result)){
            if(mysqli_affected_rows($this->conn) > 1){
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
                return $data;
            }else{
                return mysqli_fetch_assoc($result);
            }
        }else{
            return true;
        }
    }
}