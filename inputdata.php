<?php

require 'fungsi.php';


// variable super global $_POST
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
    VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
        alert('data berhasil ditambahkan');
        window.location.href = 'data-mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal ditambahkan');
        window.location.href = 'data-mahasiswa.php';
        </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>
    <form  action=" " method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required/></td>
            </tr>
            <tr>
                <td><label for="nim">NIM:</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" required/></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan:</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" required/></td>
            </tr>
            <tr>
                <td><label for="email">email:</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email"/></td>
            </tr>
            <tr>
                <td><label for="no_hp">nomor hp:</label></td>
                <td>:</td>
                <td><input type="number" name="no_hp" id="no_hp" required/></td> 
            </tr>
            <tr>    
                <td><label for="foto">Foto:</label></td>
                <td>:</td>
                <td><input type="text" name="foto" id="foto"/></td>     
            </tr>
        </table>
        <button type="submit" name="kirim" id="submit">Simpan</button>
    </form>
</body>
</html>