<?php
include("php/config.php");
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $prodi = $_POST['prodi'];
  $semester = $_POST['semester'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $password = $_POST['password'];

  $sql = "UPDATE `crud` SET `nim`='$nim',`nama`='$nama',`prodi`='$prodi',`semester`='$semester',`email`='$email',`phone_number`='$phone_number',`password`='$password' WHERE id = $id";

  $result = mysqli_query($con, $sql);

  if ($result) {
    header("Location: home.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($con);
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

  <link rel="stylesheet" href="style/style.css">

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #fff;">
    PHP Complete CRUD Application
  </nav>

  <div>
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">NIM:</label>
            <input type="number" class="form-control" name="nim" value="<?php echo $row['nim'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Phone Number:</label>
            <input type="text" class="form-control" name="phone_number" placeholder="081234567890" value="<?php echo $row['phone_number'] ?>">
          </div>

          <div class=" col">
            <label class="form-label">Semester:</label>
            <input type="number" class="form-control" name="semester" placeholder="1" value="<?php echo $row['semester'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?php echo $row['email'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="******" value="<?php echo $row['password'] ?>">
        </div>

        <div class="form-group mb-3">
          <label>Prodi:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="prodi" id="tif" value="tif" <?php echo ($row["prodi"] == 'tif') ? "checked" : ""; ?>>
          <label for="tif" class="form-input-label">TIF</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="prodi" id="si" value="si" <?php echo ($row["prodi"] == 'si') ? "checked" : ""; ?>>
          <label for="si" class="form-input-label">SI</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="prodi" id="tpl" value="tpl" <?php echo ($row["prodi"] == 'tpl') ? "checked" : ""; ?>>
          <label for="tpl" class="form-input-label">TPL</label>
        </div>

        <div>
          <button type="submit" class="btn" name="submit">Save</button>
          <a href="home.php" class="btn">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>