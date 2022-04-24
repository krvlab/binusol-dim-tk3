<?php
class Koneksidb
{
    public $hostDB = "127.0.0.1";
    public $userDB = "root";
    public $passDB = "";
    public $nameDB = "login";
    public $koneksiDB;
    public function __construct(){
    try
        {
            $this->koneksiDB = new PDO("mysql:host=$this->hostDB; dbname=$this->nameDB",$this->userDB, $this->passDB);
            $this->koneksiDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    
    return $this->koneksiDB;
    }

}
?>