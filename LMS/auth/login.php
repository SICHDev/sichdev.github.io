<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login, jika iya, redirect ke halaman utama
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../siswa/");
    exit;
}

// Cek jika form login telah disubmit
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Periksa apakah username dan password valid
    if($_POST["username"] === "user" && $_POST["password"] === "password"){
        // Mulai sesi dan redirect ke halaman utama setelah login berhasil
        $_SESSION["loggedin"] = true;
        header("location: ../siswa/");
        exit;
    } else{
        // Jika username atau password tidak valid, tampilkan pesan error
        $login_err = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Username</label>
            <input type="text" name="username">
        </div>    
        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
        <p><?php if(isset($login_err)) echo $login_err; ?></p>
    </form>
</body>
</html>
