<?php 
    include ("../config.php");

    //Ambil id dari query string
    $id = $_GET['id'];

    //Buat query hapus
    $query = "DELETE FROM product WHERE id = $id";
    $delete = mysqli_query($connection, $query);

    //Apakah query hapus berhasil?
    if($delete) {
        header('Location: ../product.php');
    } else {
        die("Failed to delete");
    }
?>