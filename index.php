<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:index1.html");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Web | belajar login</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <nav>
                <ul>
                    <li><b>Dashboard <u><?php echo $_SESSION['nama_role']; ?></u></b></li>
                    <li><a href="app.php?page=home">Home</a></li>
                    <li><a href="app.php?page=index">About</a></li>
                    <li><a href="app.php?page=profil">Profil</a></li>
                    <li><a href="app.php?process=logout">Logout</a></li>   
                </ul>
            </nav>
        </div>
        <main class="content">
              <section class="hero">
                  <img src="assets/img/online.png"alt="">
              <div class="hero-content">
                  <h1>Tugas Kelompok W8-S12-R0</h1><br></h2>Tugas Membuat Login</h2><br><br>   
<p> Buatlah login ke aplikasi menggunakan class role dan class user, dimana tampilannya menggunakan desain dashboard dari tiap role</p>
<a href="app.php?page=profil" class="action-btn">Profile Kami</a>
              </div>
                </section>
        </div>
        <div class="footer">
        <footer>
            <ul>
                <li><img src="assets/img/teguh.png" alt=""><p>Teguh Aditya Dharma</p></a></li>
                <li><img src="assets/img/ulan.png" alt=""><p>Wulandari</p></a></li>
                <li><img src="assets/img/alpin.png" alt=""><p>Alpin Haikal</p></a></li>
                <li><img src="assets/img/bella.png" alt=""><p>Bella Rahmatika</p></a></li>
                <li><img src="assets/img/kevin.png" alt=""><p>Kevin Magdareva</p></a></li>
            </ul>
            </footer>
        </div>
    </div>    
</body>
</html>