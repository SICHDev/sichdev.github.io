<?php
session_start();
include_once '../src/koneksi.php';

// Query untuk mengambil data materi dan guru
$query = "SELECT tugas.*, guru.nama_guru AS nama_guru, mapel.nama_mapel AS nama_mapel 
          FROM tugas 
          INNER JOIN guru ON tugas.guru = guru.id 
          INNER JOIN mapel ON tugas.mapel = mapel.id 
          WHERE tugas.status='1'";

$result = mysqli_query($konek, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
    <?php
        include_once "../src/navbar_siswa.html";
    ?>

    <main>
        <h2 class="m-2 text-center">Tugas Siswa</h2>
        <div class="dropdown-divider"></div>
            <div class="container">
                <div class="row">

                <?php
                // Tampilkan data menggunakan card
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-3">';
                    echo '<a href="detail-tugas?id=' . $row['id'] . '" class="card-link">';
                    echo '<div class="card mb-4">';
                    echo '<img src="../assets/' . $row['gambar'] . '" class="card-img-top" alt="">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['judul'] . '</h5>';
                    echo '<p class="card-subtitle mb-2 text-muted">' . $row['date_added'] . '</p>';
                    echo '<p class="card-text">' . $row['nama_mapel'] . '<br>' . $row['nama_guru'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
                }
                ?>

                </div>
            </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
