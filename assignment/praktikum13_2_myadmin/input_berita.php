<?php
include "mysqli_koneksi.php";
//proses input berita
if (isset($_POST['Input'])) {
$judul = addslashes (strip_tags ($_POST['judul']));
$kategori = $_POST['kategori'];
$headline = addslashes (strip_tags ($_POST['headline']));
$isi_berita = addslashes (strip_tags ($_POST['isi']));
$pengirim = addslashes (strip_tags ($_POST['pengirim']));
//insert ke tabel
$query = "INSERT INTO berita(id_kategori,judul,headline,isi,pengirim,tanggal) 
VALUES('$kategori','$judul','$headline','$isi_berita','$pengirim',now())";
$sql = mysqli_query ($con,$query);
if ($sql) {
//echo "<h2><font color=blue>Berita telah berhasil ditambahkan</font></h2>";
?>
	<script language="JavaScript">  

		alert('Berita berhasil ditambahkan......');  

 		document.location='index.php?page=berita';  

	</script>
<?php	
} else {
echo "<h2><font color=red>Berita gagal ditambahkan</font></h2>";
}
}
?>
<html>
<head><title>Input Berita</title>
<script language="JavaScript">  
function batal(){
 		document.location='index.php?page=berita';  
}		
</script>
</head>
<body>
<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Masters</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Input Berita</li>						  	
					</ol>
				</div>
			</div>
<FORM ACTION="" METHOD="POST" NAME="input">
<table cellpadding="0" cellspacing="0" border="0" width="90%">

<tr>
<td width="200">Judul Berita</td>
<td>: <input type="text" name="judul"
size="30"></td>
</tr>
<tr>
<td>Kategori</td>
<td>:
<select name="kategori">
<?php
$query = "SELECT id_kategori, nm_kategori FROM kategori ORDER BY nm_kategori";
$sql = mysqli_query ($con,$query);
while ($hasil = mysqli_fetch_array ($sql)) {
echo "<option
value='$hasil[id_kategori]'>$hasil[nm_kategori]</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Headline Berita</td>
<td>: <textarea name="headline" cols="50" rows="4">
</textarea></td>
</tr>
<tr>
<td>Isi Berita</td>
<td>
<div class="col-sm-20">
     <textarea class="form-control ckeditor" name="isi" rows="6"></textarea>
</div>
</td>
</tr>
<tr>
<td>Pengirim</td>
<td>: <input type="text" name="pengirim" size="20">
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;&nbsp;<input type="submit" name="Input" value="Input Berita">&nbsp;
<input type="button" name="Cancel" value="Cancel" onClick="batal()">
</td>
</tr>
</table>
</FORM>
</body>
<!-- ck editor -->
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
</html>