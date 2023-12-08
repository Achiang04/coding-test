<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Anggota</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <?php

        //Include file koneksi, untuk koneksikan ke database
        include "database.php";

        //Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
        if (isset($_GET['id_peserta'])) {
            $id_peserta = input($_GET["id_peserta"]);

            $sql = "select * from peserta where id_peserta=$id_peserta";
            $hasil = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($hasil);
        }

        //Cek apakah ada kiriman form dari method post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id_peserta = htmlspecialchars($_POST["id_peserta"]);
            $nim = input($_POST["nim"]);
            $nama = input($_POST["nama"]);
            $jurusan = input($_POST["jurusan"]);
            $semester = input($_POST["semester"]);
            $email = input($_POST["email"]);
            $no_hp = input($_POST["no_hp"]);

            //Query update data pada tabel anggota
            $sql = "update peserta set
			nim='$nim',
			nama='$nama',
			jurusan='$jurusan',
            semester='$semester',
            email='$email',
			no_hp='$no_hp'
			where id_peserta=$id_peserta";

            //Mengeksekusi atau menjalankan query diatas
            $hasil = mysqli_query($conn, $sql);

            //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
            if ($hasil) {
                header("Location:index.php");
            } else {
                echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
            }
        }

        ?>
        <h2>Update Data</h2>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nim:</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukan Nim" required />

            </div>
            <div class="form-group">
                <label>Sekolah:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Nama" required />
            </div>
            <div class="form-group">
                <label>Jurusan :</label>
                <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required />
            </div>
            <div class="form-group">
                <label>Semester :</label>
                <input type="text" name="semester" class="form-control" placeholder="Masukan Semester" required />
            </div>
            <div class="form-group">
                <label>Email :</label>
                <textarea name="email" class="form-control" rows="5" placeholder="Masukan Email" required></textarea>
            </div>
            <div class="form-group">
                <label>No HP:</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required />
            </div>

            <input type="hidden" name="id_peserta" value="<?php echo $data['id_peserta']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>