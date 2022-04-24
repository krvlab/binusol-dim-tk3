<?php
require_once("./class/Koneksidb.php");
require_once("./class/Role.php");
require_once("./class/User.php");


class Main 
{
    private $dbconn;
    private $connect;
    private $classuser;
    private $classrole;

    public function __construct(){
        $this->dbconn = new Koneksidb();
        $this->connect = $this->dbconn->koneksiDB;

        $this->classuser = new User();
        $this->classrole = new Role();

    }
    public function index($page){
        // $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        $sql = "SELECT * FROM users";
        $que = $this->connect->prepare($sql);
        $que->execute(array());
        
        $datas = $que->fetchAll();
        echo "<pre>";
        print_r($datas);
    }
    public function view($page){
        $fileinclude = "./".$page.".php";
        if (file_exists($fileinclude)) {
            include $fileinclude;
         }
         else {
            header("location:index1.html");
         }
    }
    public function process($name){
        switch ($name) {
            case 'login':
                $this->classuser->login();
                break;
            case 'logout':
                $this->classuser->logout();
                break;
    
            default:
                // header("location:app.php?page=home");
                break;
        }
    }

}

?>