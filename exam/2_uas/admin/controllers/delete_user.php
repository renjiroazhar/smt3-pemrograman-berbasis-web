<?php 
    include ("../config.php");

    //Ambil id dari query string
    $id = $_GET['id'];

    //Buat query hapus
    $query = "DELETE FROM user WHERE id = $id";
    $delete = mysqli_query($connection, $query);

    //Apakah query hapus berhasil?
    if($delete) {
        header('Location: ../user.php');
    } else {
        die("Failed to delete");
    }
?>