<?php

require 'fungsi.php';

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$mhs = tampildata($query)[0];


// variable super global $_POST
if (isset($_POST['kirim'])) 
    {
    if (editdata($_POST, $id) > 0) {
        echo "<script>
        alert('data berhasil diubah');
        window.location.href = 'data-mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal diubah');
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
    <title>edit data</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form  action=" " method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>" required/></td>
            </tr>
            <tr>
                <td><label for="nim">NIM:</label></td>
                <td>:</td>
                <td><input type="text" name="nim" id="nim" value="<?= $mhs["nim"]; ?>" required/></td>
            </tr>
            <tr>
                <td><label for="jurusan">Jurusan:</label></td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"]; ?>" required/></td>
            </tr>
            <tr>
                <td><label for="email">email:</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" value="<?= $mhs["email"]; ?>"/>
            </tr>
            <tr>
                <td><label for="no_hp">nomor hp:</label></td>
                <td>:</td>
                <td><input type="number" name="no_hp" id="no_hp" value="<?= $mhs["no_hp"]; ?>" required/></td> 
            </tr>
            <tr>    
                <td><label for="foto">Foto:</label></td>
                <td>:</td>
                <td><input type="text" name="foto" id="foto" value="<?= $mhs["foto"]; ?>"/>
            </tr>
        </table>
        <button type="submit" name="kirim" id="submit">edit Data</button>
    </form>
</body>
</html>



