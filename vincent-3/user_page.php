<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>

   <div class="container">

      <div class="content">
         <h3>hi, <span>user</span></h3>
         <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <p>this is an user page</p>
         <a href="login_form.php" class="btn">login</a>
         <a href="register_form.php" class="btn">register</a>
         <a href="logout.php" class="btn">logout</a>


         <div>
            <br>
            <h4>
               <center>DAFTAR PESERTA PELATIHAN</center>
            </h4>
            <?php

            include "config.php";

            //Cek apakah ada kiriman form dari method post
            if (isset($_GET['id_peserta'])) {
               $id_peserta = htmlspecialchars($_GET["id_peserta"]);

               $sql = "delete from peserta where id_peserta='$id_peserta' ";
               $hasil = mysqli_query($conn, $sql);

               //Kondisi apakah berhasil atau tidak
               if ($hasil) {
                  header("Location:user_page.php");
               } else {
                  echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
               }
            }
            ?>


            <tr class="table-danger">
               <br>
               <thead>
                  <tr>
                     <table class="my-3 table table-bordered">
                        <tr class="table-primary">
                           <th>No</th>
                           <th>Nama</th>
                           <th>Sekolah</th>
                           <th>Jurusan</th>
                           <th>No Hp</th>
                           <th>Alamat</th>
                           <th colspan='2'>Aksi</th>

                        </tr>
               </thead>

               <?php
               include "config.php";
               $sql = "select * from peserta order by id_peserta desc";

               $hasil = mysqli_query($conn, $sql);
               $no = 0;
               while ($data = mysqli_fetch_array($hasil)) {
                  $no++;

               ?>
                  <tbody>
                     <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["sekolah"];   ?></td>
                        <td><?php echo $data["jurusan"];   ?></td>
                        <td><?php echo $data["no_hp"];   ?></td>
                        <td><?php echo $data["alamat"];   ?></td>
                        <td>
                           <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                           <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                     </tr>
                  </tbody>
               <?php
               }
               ?>
               </table>
               <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
         </div>
      </div>


   </div>

</body>

</html>