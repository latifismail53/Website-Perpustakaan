<?php
include "conn.php";
if(isset($_POST['update'])){
				$nis	       = $_POST['nis'];
				$nama		   = $_POST['nama'];
				$kelas  = $_POST['kelas'];
				$jenis = $_POST['jenis'];
				
				$update = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jenis='$jenis' WHERE nis='$nis'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Berhasil di Update!'); window.location = '?page=siswa'</script>";
				}else{
					echo "<script>alert('Data Gagal di Update!'); window.location = 'siswa.php'</script>";
				}
			}
            ?>