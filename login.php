<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'pbl');

$msgname = "Nama";
$msgusername = "Username";
$msgpw = "Password";
date_default_timezone_set('Asia/Jakarta');
$time = date('Y-m-d H:i:s');
// pw : 4321

if (isset($_POST['login'])) {
    $username = $_POST['userLogin'];
    $password = $_POST['passwordLogin'];
    $hash_password = hash("sha256", $password);

    try {
            $sql = "SELECT * FROM account WHERE username='$username' AND password='$hash_password' ";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $_SESSION["username"] = $data["username"];
                header("location: index.php");
            } else {
                $msgusername = "Maaf akun tidak ditemukan";
                $msgpw = "Maaf akun tidak ditemukan";
            }
    } catch (mysqli_sql_exception) {
        echo "error";
    }

}

if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $username = $_POST['user'];
    $password = $_POST['password'];
    $hash_password = hash("sha256", $password);

    try {
            $sql = "INSERT INTO account (nama, username, password, create_at) VALUES ('$name', '$username', '$hash_password', '$time')";
            if (!$connect->query($sql)) {
                echo "create gagal";
            }
    } catch (mysqli_sql_exception) {
        echo "error";
    }
    $connect->close();
}

// mobile
if (isset($_POST['loginMobile'])) {
    $username = $_POST['userLoginMobile'];
    $password = $_POST['passwordLoginMobile'];
    $hash_password = hash("sha256", $password);

    try {
        $sql = "SELECT * FROM account WHERE username='$username' AND password='$hash_password' ";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            header("location: index.php");
            exit();
        } else {
            $msgusername = "Maaf akun tidak ditemukan";
            $msgpw = "Maaf akun tidak ditemukan";
        }
    } catch (mysqli_sql_exception) {
        echo "error";
    }

}

if (isset($_POST['createMobile'])) {
    $name = $_POST['nameMobile'];
    $username = $_POST['userMobile'];
    $password = $_POST['passwordMobile'];
    $hash_password = hash("sha256", $password);

    try {
        $sql = "INSERT INTO account (nama, username, password, create_at) VALUES ('$name', '$username', '$hash_password', '$time')";
        if (!$connect->query($sql)) {
            echo "create gagal";
        }
    } catch (mysqli_sql_exception) {
        echo "error";
    }
    $connect->close();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="website icon" type="png" href="asset/img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        .con {
            background-image: url(asset/img/macbook-air-stock-2022-abstract-background-macbook-air-2022-3840x2160-8316.jpg);
            background-size: cover;
            overflow: hidden;
        }

        .mob {
            background-image: url(2fe86166-622c-4cd2-a059-b8a89ce1b94c.jpeg);
            background-size: cover;
            overflow: hidden;
        }

        .fromz {
            transition: transform 1s;
            transform: translateX(0)
        }

        .from {
            transition: transform 1s;
            transform: translateX(100%)
        }

        .toz {
            transition: transform 1s;
            transform: translateX(-100%)
        }

        .to {
            transition: transform 1s;
            transform: translateX(0)
        }
    </style>
</head>

<body style="font-family: Montserrat;" class="overflow-hidden">
    <div class="con hidden lg:block">
        <?php include "part/login.php" ?>
    </div>
    
    <div class="mob lg:hidden">
        <?php include "part/loginMobile.php" ?>
    </div>

    <script src="js/login.js"></script>
</body>

</html>