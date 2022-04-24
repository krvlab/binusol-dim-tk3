<?php
class Role 
{
    private $id_role;
    private $nama_role;
    private $keterangan;

    private $dbconn;
    private $connect;
    public function __construct(){
        $this->dbconn = new Koneksidb();
        $this->connect = $this->dbconn->koneksiDB;
    }

    public function index(){
        echo "Hello World";
    }
    public function getRoles(){
        $sql = "SELECT * FROM roles";
        $que = $this->connect->prepare($sql);
        $que->execute(array());
        
        $datas = $que->fetchAll();
        return $datas;
    }
}
