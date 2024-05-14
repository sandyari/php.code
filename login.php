<?php
require 'koneksi.php';


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM karyawan WHERE username = '$username' AND password = '$password' ";

    $cek_user = mysqli_query($conn, $sql);

    if (mysqli_num_rows($cek_user) > 0) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        echo " <script> alert ('Anda Berhasil login')</script>";
        echo "<meta http-equiv='refresh' content=' 0; url=index.php'>";
    } else {
        echo "<script> alert ('Password dan Username Anda tidak ditemukan !! ' ) </script>";
        echo "<meta http-equiv='refresh' content= '0; url=login.php'> ";

    }
}


if (!isset($_SESSION['login'])) {

} else {
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="username" name="username"
                                                placeholder="username" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                name="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" name="login"><a class="btn btn-primary"
                                                    name="login">Login</a></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>