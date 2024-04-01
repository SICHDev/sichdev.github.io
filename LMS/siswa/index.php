<?php
    session_start();
    $foto = "adzana_shaliha.jpg";
    $nama_siswa = "Adzana Shaliha";
    $kelas_siswa = "X A";
    $jurusan_siswa = "DKV";
    $kelas = $kelas_siswa . " " . $jurusan_siswa;
    $tahun_ajaran = "2025/2026";
    $email = "info@sichpanel.net";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">

</head>
<body>
    <?php
        include_once "../src/navbar_siswa.html";
    ?>
    <div class="container mt-2">
        <h2>Dashboard</h2>
        <div class="dropdown-divider"></div>
        <div class="data-siswa">
            <div class="data-siswa-left">
                <?php 
                    if(!isset($foto)){
                        echo "<div class='profil-siswa'><img src='../assets/images/siswa/default.png' alt='Foto Siswa'></div>";
                    }else{
                        echo "<div class='profil-siswa'><img src='../assets/images/siswa/$foto' alt='Foto Siswa'></div>";
                    }
                ?>
                <div class="data-siswa-2">
                    <h4><?php echo $nama_siswa ?></h4>
                    <h4><?php echo $kelas ?></h4><br>
                    <h6><?php echo "Tahun Ajaran " . $tahun_ajaran . "<br>" . $email ?></h6>
                    
                </div>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="detail-siswa">
            Detail...
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>