<?php
    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Siswa</title>
</head>
<body>
    <?php echo "$id" ?>

<script>
    function logout() {
        document.title = document.visibilityState;
        // Kirim permintaan logout ke server
        // Ganti 'logout.php' dengan URL logout di server Anda
        fetch('../auth/logout', {
            method: 'POST',
            credentials: 'same-origin' // Kirim cookie hanya untuk asal yang sama
        })
        .then(response => {
            // Handle respons dari server jika diperlukan
            // Misalnya, mengarahkan pengguna ke halaman login
            window.location.href = '../auth/login'; // Ganti dengan halaman login Anda
        })
        .catch(error => {
            console.error('Gagal melakukan logout:', error);
        });
    }

    // Event listener untuk sebelum tab browser ditutup atau dipindahkan
    document.addEventListener('visibilitychange', function(event) {
        if(document.visibilityState === "hidden"){
           document.title = "Switch Tab Detected";
           logout();
        }else{
            document.title = "Tugas Siswa";
        }
        // Panggil fungsi logout sebelum tab browser ditutup atau dipindahkan
        
    });
</script>
</body>
</html>