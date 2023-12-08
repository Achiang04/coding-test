<?php
include "config.php";

if (isset($_POST["submit"])) {
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $prodi = $_POST['prodi'];
   $semester = $_POST['semester'];
   $email = $_POST['email'];
   $nomor_hp = $_POST['nomor_hp'];

   $sql = "INSERT INTO `crud`(`id`,`nim`,`nama`,`prodi`,`semester`,`email`,`nomor_hp`) VALUES (NULL,'$nim','$nama','$prodi','$semester','$email','$nomor_hp')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PHP CRUD Application</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      PHP Complete CRUD Application
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nim:</label>
                  <input type="text" class="form-control" name="nim" placeholder="2020131010">
               </div>

               <div class="col">
                  <label class="form-label">Nama:</label>
                  <input type="text" class="form-control" name="nama" placeholder="Albert Einstein">
               </div>

               <div class="col">
                  <label class="form-label">Prodi:</label>
                  <input type="text" class="form-control" name="prodi" placeholder="Teknik Informatika">
               </div>

               <div class="col">
                  <label class="form-label">Nomor Hp:</label>
                  <input type="text" class="form-control" name="nomor_hp" placeholder="081234567891">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>

            <div class="form-group mb-3">
               <label>Semester:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="semester" id="3" value="3">
               <label for="1" class="form-input-label">3</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="semester" id="4" value="4">
               <label for="4" class="form-input-label">4</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="semester" id="5" value="5">
               <label for="5" class="form-input-label">5</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="semester" id="6" value="6">
               <label for="6" class="form-input-label">6</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="semester" id="7" value="7">
               <label for="7" class="form-input-label">7</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>