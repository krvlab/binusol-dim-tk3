<?php
class User 
{
    private $id;
    private $id_role;
    private $nama;
    private $username;
    private $password;

    private $dbconn;
    private $connect;
    public function __construct(){
        $this->dbconn = new Koneksidb();
        $this->connect = $this->dbconn->koneksiDB;
    }

    public function index(){
        echo "Hello World";
    }
    public function getUsers(){
        $sql = "SELECT * FROM users";
        $que = $this->connect->prepare($sql);
        $que->execute(array());
        
        $datas = $que->fetchAll();
        return $datas;
    }
    public function login(){
        // mengaktifkan session php
        session_start();
        
        // menghubungkan dengan koneksi
        // include 'koneksi.php';
        
        // menangkap data yang dikirim dari form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // query menyeleksi data user dengan username dan password        
        $sql = "SELECT * FROM users where username=? and password=? ";

        // proses menyeleksi data user dengan username dan password yang sesuai
        $que = $this->connect->prepare($sql);
        $que->execute(array($username,$password));

        // mendapatkan data user
        $result = $que->fetch();
        
        // $result = mysqli_query($koneksi,"SELECT * FROM users where username='$username' and password='$password'");
        // $cek = mysqli_num_rows($result);

        $cek = $que->rowCount();

        if($cek > 0) {
            $data = $result;
            
            $this->id = $data['id'];
            $this->id_role = $data['id_role'];
            $this->nama = $data['nama'];
            $this->username = $data['username'];
            $this->password = $data['password]'];

            // sql mendapatkan nama_role
            $sqlRole = "SELECT nama_role FROM role where id_role=?";

            // proses eksekusi query
            $que = $this->connect->prepare($sqlRole);
            $que->execute(array($data['id_role']));

            // mendapatkan nama role
            $nama_role = $que->fetch()['nama_role'];

            // menyimpan session user, nama, status,id login dan nama_role 
            $_SESSION['username'] = $this->username;
            $_SESSION['nama'] = $this->nama;
            $_SESSION['id_login'] = $this->id;
            $_SESSION['nama_role'] = $nama_role;
            $_SESSION['status'] = "sudah_login";

            header("location:app.php?page=home");
        } else {
            header("location:loginv2.php?pesan=gagal login data tidak ditemukan.");
        }
    }
    public function logout(){
        // mengaktifkan session
        session_start();
        
        // menghapus semua session
        session_destroy();
        
        // mengalihkan halaman login
        header("location:app.php?loginv2&&pesan=anda berhasil logout.");
    }
}
