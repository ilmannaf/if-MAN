<?php


require 'fungsi.php';
$id = $_GET['id'];
echo $id;

if(deletedata($id) > 0)
    {
        echo "<script>
        alert('data berhasil dihapus');
        window.location.href = 'data-mahasiswa.php';
        </script>";
    } else {
        echo "<script>
        alert('data gagal dihapus');
        window.location.href = 'data-mahasiswa.php';
        </script>";
    }


?>