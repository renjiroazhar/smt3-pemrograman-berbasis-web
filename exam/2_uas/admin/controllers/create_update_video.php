<?php 
	include("../config.php");

	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$title = $_POST['title'];
		$vid_id = $_POST['vid_id'];

		$used_video = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM video WHERE id='$id'"));

		if($used_video) {
			$query = "UPDATE video SET `title`='$title', `vid_id`='$vid_id' WHERE `id`='$id'";
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../video.php?status_update=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../video.php?status_update=failed');
			}
		} else {
			$query = ("INSERT INTO video (title, vid_id) VALUES ('$title', '$vid_id')");
			$post = mysqli_query($connection, $query);

			if($post) {
				//Jika berhasil maka alihkan ke halaman index.php dengan status=success
				header('Location: ../video.php?status=success');
			} else {
				//Jika gagal alihkan ke halaman index.php dengan status=failed
				header('Location: ../video.php?status=failed');
			}		
		}
		//Buat post 
	} else {
		die("Access denied");
	}
?>
