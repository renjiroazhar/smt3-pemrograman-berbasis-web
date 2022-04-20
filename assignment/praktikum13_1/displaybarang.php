<?php
    include "connection.php";
?>
<HTML>
<HEAD>
    <TITLE>Menampilkan Daftar Barang</TITLE>
</HEAD>
<BODY>
<?php
    $query = "SELECT * FROM barang";

    $sql = mysqli_query($connection, $query);
    echo "<h3>Daftar Barang</h3>";
    while ($hasil = mysqli_fetch_array($sql)) {
        $kode = $hasil['kd_brg'];
        $nama = stripslashes ($hasil['nm_brg']);
        $satuan = stripslashes ($hasil['satuan']);
        $harga = $hasil['harga'];
        $stok = $hasil['stok'];
        $stok_min = $hasil['stok_min'];
        //tampilkan barang
        echo "$kode -> $nama -> $satuan -> $harga -> $stok -> $stok_min <br>";
    };
?>
</BODY>
</HTML>