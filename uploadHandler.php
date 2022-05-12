<?php
class uploadHandler{
    private $file;
    private $target_path;

    public function __construct($file){
        $this->target_path = "upload/";
        if(!is_dir($this->target_path)){
            mkdir($this->target_path);
        }
        $this->file = $file;
    }

    public function uploadAvatar($jenis){
        $this->target_path = $this->target_path . "$jenis/";
        if(!is_dir($this->target_path)){
            mkdir($this->target_path);
        }
        $filename = "IMG". rand() . basename($this->file['name']);
        $this->target_path = $this->target_path . $filename;
        if(!move_uploaded_file($this->file['tmp_name'], $this->target_path)){
            return false;
        }else return $this->target_path;
    }
}