<?php

$connection = mysqli_connect("localhost", "root", "root", "if_man");
if ($connection) {
    echo"koneksi berhasil";
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($connection, $query);

    ///mysqli_fetch_arrya
    ///mysqli_fetch_assoc
    ///mysqli_fetch_object
    ///mysqli_fetch_row

    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data mahasiswa</title>
    <link rel="stylesheet" href="asset/css/dataMahasiswa.css">
    
</head>
<body>
    
    <h1>INFORMATIKA</h1>
    <hr>
    <table border= "1" cellpadding="0" cellspacing="10px">
        <tr>
            <td><a href= "index.php">home</a></td>
            <td><a href= "profile.php">profile</a></td>
            <td><a href= "contact.php">contact</a></td>
            <td><a href= "data-mahasiswa.php">data mahasiswa</a></td>
        </tr>
    </table>
     <h2>Data mahasiswa</h2>
     <a href="inputdata.php">
        <button>Tambah Data</button>
     </a>
   <table border="1" cellspacing="5px">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Foto</th>
        <th>Jurusan</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>
 
    <?php 
    $i = 1;
    while($mhs = mysqli_fetch_assoc($result)) : 
    ?>
    <tr>
        <td align="center"><?php echo $i++; ?></td>
        <td align="center"><?= $mhs['nama']; ?></td>
        <td align="center"><?= $mhs['nim']; ?></td>
        <td align="center">
            <img src="asset/images/ambarus.jpg" width="70">
        </td>
        <td align="center"><?= $mhs['jurusan']; ?></td>
        <td align="center"><?= $mhs['email']; ?></td>
        <td align="center"><?= $mhs['no_hp']; ?></td>
        <td>
        <a href="editdata.php?id=<?= $mhs['id']; ?>">Edit</a> |
        <a href="deletedata.php?id=<?= $mhs['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
    <hr>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>1,1</th>
            <th>1,2</th>
            <th>1,3</th>
            <th>1,4</th>
        </tr>
        <tr>
            <td>2,1</td>
            <td>2,2</td>
            <td>2,3</td>
            <td>2,4</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,2</td>
            <td>3,3</td>
            <td>3,4</td>
        </tr>
        <tr>
            <td>4,1</td>
            <td>4,2</td>
            <td>4,3</td>
            <td>4,4</td>
        </tr>
    </table>
</body>
</html>