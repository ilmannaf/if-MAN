<?php


$koneksi = mysqli_connect("localhost", "root", "root", "if_man");
function tampildata($query){

global $koneksi;
   $result = mysqli_query($koneksi, $query);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
       $rows[] = $row;
   }
   return $rows;
}

function inputdata($data, $foto)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    

   $namafoto = $foto['name'];
   $newnamefoto = date("dmYhis_").$namafoto;
   $tmpfoto = $foto['tmp_name'];

$path = "asset/images/$newnamefoto";

    if(move_uploaded_file($tmpfoto, $path))
{
    
    $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto)
              VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$newnamefoto')";
    mysqli_query($koneksi, $query);
    
}

return mysqli_affected_rows($koneksi);


}
function deletedata($id) 
{
    global $koneksi;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function editdata($data, $id)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $email = htmlspecialchars($data['email']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $foto = htmlspecialchars($data['foto']);

    $query = "UPDATE mahasiswa SET 
    nama = '$nama', 
    nim = '$nim', 
    jurusan = '$jurusan', 
    email = '$email', 
    no_hp = '$no_hp', 
    foto = '$foto' 
    WHERE id = $id";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function login($data) {
    global $koneksi;

    $username = $data["username"];
    $password = $data["password"];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            return true;
        }
    }
    return false;
}

function register($data) {
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password1 = mysqli_real_escape_string($koneksi, $data["password1"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

// cek konfirmasi password
    if ($password1 !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    // cek username sudah ada atau belum
    $queryrow = "SELECT username FROM user WHERE username = '$username'";
    $result = mysqli_query($koneksi, $queryrow);
    if (mysqli_num_rows($result) == 1) {
        echo "<script>
                alert('username sudah terdaftar');
              </script>";
        return false;
    }

    $password = password_hash($password1, PASSWORD_DEFAULT);
    $query = "INSERT INTO user(username, password) VALUE
    ('$username','$password')";

mysqli_query($koneksi, $query);
return mysqli_affected_rows($koneksi);

}

?>