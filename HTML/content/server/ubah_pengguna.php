<?php
	// session_start();
	// include_once 'koneksi.php';
	include "content/config/koneksi.php";
	// echo "masuk";
	$id = $_GET['id'];
	//$id = $_POST['id'];
	// if(ISSET($_POST['save'])){
		$nama = $_POST['nama'];
		$username = $_POST['username'];

		$query = "SELECT * FROM user WHERE username= '$username'";
		$result = mysqli_query($con, $query);
		$cek = mysqli_fetch_assoc($result);

		if ((empty($cek)) || ($username == $_SESSION['username'])){
			$query2 = "UPDATE user SET nama ='$nama', username = '$username' WHERE id_user = '$id'";
			$result2 = mysqli_query($con, $query2);

			$_SESSION['username'] = $username;
			if($result2){
					$_SESSION['nama'] = $nama;
					$_SESSION['success'] = "Data berhasil diganti";
					echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=ubah_data_pengguna\">";
			}else{
					$_SESSION['error'] = "Proses ganti data gagal";
					echo "<meta http-equiv=\"refresh\" content=\"1; url=halaman.php?s=ubah_data_pengguna\">";
					echo mysqli_error($con);
			}
		} else {
			$_SESSION['error'] = "Username sudah ada";
			echo "<meta http-equiv=\"refresh\" content=\"1; url=halaman.php?s=ubah_data_pengguna\">";
		}

?>