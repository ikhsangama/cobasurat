<?php
	include "content/config/koneksi.php";
	
	$get_hapus = $_GET['id'];
	$query = "DELETE FROM surat_masuk WHERE id_surat_masuk= '$get_hapus'";
	$result = mysqli_query($con, $query);
	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=halaman.php?s=lihat_surat_masuk_admin\">";
?>