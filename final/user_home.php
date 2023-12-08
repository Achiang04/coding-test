<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-links">

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT*FROM crud WHERE Id=$id");

            while ($result = mysqli_fetch_assoc($query)) {
                $res_nim = $result['nim'];
                $res_nama = $result['nama'];
                $res_prodi = $result['prodi'];
                $res_semester = $result['semester'];
                $res_email = $result['email'];
                $res_phone_number = $result['phone_number'];
                $res_id = $result['id'];
            }
            ?>

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_nama ?></b>, Welcome to user page</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_email ?></b>.</p>
                </div>
            </div>
            <div class="bottom mb-5">
                <div class="box">
                    <p>data:</p>
                    <p>NIM: <b><?php echo $res_nim ?></b>.</p>
                    <p>Nama: <b><?php echo $res_nama ?></b>.</p>
                    <p>Prodi: <b><?php echo $res_prodi ?></b>.</p>
                    <p>Semester: <b><?php echo $res_semester ?></b>.</p>
                    <p>Email: <b><?php echo $res_email ?></b>.</p>
                    <p>Phone Number: <b><?php echo $res_phone_number ?></b>.</p>
                </div>
            </div>


        </div>




        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </main>
</body>

</html>