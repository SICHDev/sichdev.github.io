<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
    <?php 
        include_once "../src/navbar_siswa.html";
     ?>

<div class="container">
  <h2 class="pengumuman">Pengumuman</h2>
  <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
    <?php
    include_once "../src/koneksi.php";

    // Memeriksa koneksi
    if ($konek->connect_error) {
        die("Koneksi gagal: " . $konek->connect_error);
    }

    // Query untuk mengambil pengumuman dan nama guru
    $sql = "SELECT pengumuman.*, guru.nama_guru FROM pengumuman INNER JOIN guru ON pengumuman.guru = guru.id";

    $result = $konek->query($sql);

    if ($result->num_rows > 0) {
        // Menampilkan data setiap baris
        $counter = 1;
        while($row = $result->fetch_assoc()) {
            ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo $counter; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $counter; ?>" style="color:black">
                            <?php echo $row["judul"]; ?> <br> <?php echo $row["nama_guru"]; ?> pada <?php echo $row["date_added"]; ?>
                        </button>
                    </h2>
                        <div id="panelsStayOpen-collapse<?php echo $counter; ?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo $counter; ?>">
                        <div class="accordion-body">
                        <?php echo $row["isi"]; ?>
                        </div>
                    </div>
                </div>
            <?php
            $counter++;
        }
    } else {
        echo "Tidak ada pengumuman.";
    }
    $konek->close();
    ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>