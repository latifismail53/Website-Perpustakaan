<?php
include 'conn.php';
$pinjam			= date("Y-m-d");
$tiga_hari		= mktime(0,0,0,date("n"),date("j")+3,date("Y"));
$kembali		= date("Y-m-d", $tiga_hari);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pinjam Buku</title>
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
           $kd = $_GET['kd'];
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_buku WHERE id='$kd'");
			if(mysqli_num_rows($sql) == 0){
			
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
            
           
          

            <center><div class="panel panel-default" style="width: 500px;">
                        <div class="panel-heading">

                        <h3 class="panel-title"><i class="icon-user"></i>Peminjaman BUKU</h3> 
                        </div>
                        <div class="panel-body">
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="?page=proses_pinjam" method="POST" >



                         <div align="left" class="control-group">
											<label class="control-label" for="basicinput">Id Transaksi</label>
											<div class="controls">
												<input type="text" name="idtrx" id="idtxalue=" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										
										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">ID Buku</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="ID Buku" class="form-control span8 tip" required>
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Judul Buku</label>
											<div class="controls">
												<input type="text" name="judul" id="judul" value="<?php echo $row['judul']; ?>" placeholder="Judul Buku" class="form-control span8 tip" required>
											</div>
										</div>

										

										
                                        
                                        <div align="left" class="control-group">
											<label class="control-label" for="basicinput">NIP</label>
											<div class="controls">
												<input type="text" name="nip" id="nip" placeholder="NIP Anda Wajib diisi" class="form-control span8 tip" required>
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Tanggal Pinjam</label>
											<div class="controls">
												<input type="text" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $pinjam; ?>" class="form-control span8 tip" required>
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Tanggal Kembali</label>
											<div class="controls">
												<input name="tgl_kembali" id="tgl_kembali" value="<?php echo $kembali; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>

										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Jumlah Pinjam</label>
											<div class="controls">
												<input name="jmlpinjam" id="jumlahpinjam"  class="form-control span8 tip" type="text" placeholder="Jumlah Buku yang Dipinjam" required />
											</div>
										</div>
<br>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="pinjam" id="pinjam" value="Pinjam" class="btn btn-sm btn-primary"/>
												
                                               <a href="?page=buku" class="btn btn-sm btn-danger">Kembali</a>
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
						url :"ajax-data-buku.php", // json datasource
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
