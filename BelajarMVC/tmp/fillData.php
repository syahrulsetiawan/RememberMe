<?php


try {
    $dbh = new PDO("mysql:host=localhost;dbname=phpdasar;", "root", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    for ($i = 0; $i < 10; $i++) {
        $query = "INSERT INTO mahasiswa values ('','Title Note ke-:i','Ini adalah isi note ke-:i','red-style','1')";
        $result = $dbh->prepare($query);
        $result->bindParam(':i', $i);
        $result->execute();
    }


    echo $result->rowCount() . "Berhasil";
} catch (PDOException $error) {
    die("koneksi gagal : " . $error->getMessage());
}
