<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input Data Siswa</title>
        <!-- css table datatables/dataTables -->
	    <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        
         
         
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
               
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    </head>
    <body>
       

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$nis	       = $_POST['nis'];
				$nama		   = $_POST['nama'];
				$kelas  = $_POST['kelas'];
				$jenis        = $_POST['jenis'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO siswa(nis, nama, kelas, jenis)
															VALUES('$nis','$nama', '$kelas', '$jenis')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIS Sudah Ada..!</div>';
				}
			}
			?>
            
           
            <center><div class="panel panel-info" style="width: 500px;">
                        <div class="panel-heading">

                        <h3 class="panel-title"><i class="icon-user"></i>Input Data SISWA</h3> 
                        </div>
                        <div class="panel-body">
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="?page=siswa_input" method="POST" >

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput" >NIS</label>
											<div class="controls">
												<input type="text" name="nis" id="nis" placeholder="NIS Wajib diisi" class="form-control span8 tip" required>
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Nama Siswa</label>
											<div class="controls">
												<input type="text" name="nama" id="nama" placeholder="Nama Siswa" class="form-control span8 tip" required>
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Kelas</label>
											<div class="controls">
												<input type="text" name="kelas" id="kelas" placeholder="Kelas" class="form-control span8 tip" required>
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Jenis Kelamin</label>
											<div class="controls">
												<input name="jenis" id="jenis" class="form-control span8 tip" type="text" placeholder="Laki - Laki atau Perempuan" required />
											</div>
										</div>

										
<br
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Simpan</button>
                                               <a href="?page=siswa" class="btn btn-sm btn-danger">Kembali</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href=""> SMPN 1 Babadan</a> &copy; 2016 DataTables by Bootstrap </b></center>
            </div>
        </div>
        <script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
    </script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
      
    </body>
