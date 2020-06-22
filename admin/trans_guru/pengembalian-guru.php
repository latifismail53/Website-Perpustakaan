<?php
include 'conn.php';
$pinjam			= date("Y-m-d");
$satu_hari		= mktime(0,0,0,date("n"),date("j")+1,date("Y"));
$kembali		= date("Y-m-d", $satu_hari);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pengembalian Buku</title>
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
           $idtrx = $_GET['idtrx'];
			$sql = mysqli_query($koneksi, "SELECT * FROM guru_tr WHERE idtrx='$idtrx'");
			if(mysqli_num_rows($sql) == 0){
			
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
            
           
          

            <center><div class="panel panel-warning" style="width: 500px;">
                        <div class="panel-heading">

                        <h3 class="panel-title">==> Pengembalian BUKU Guru <==</h3>
                        </div>
                        <div class="panel-body">
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="?page=proses_kembali_guru" method="POST" >



                         <div align="left" class="control-group">
											<label class="control-label" for="basicinput">Id Transaksi</label>
											<div class="controls">
												<input type="text" name="idtrx" id="idtxalue=" value="<?php echo $row['idtrx']; ?>" class="form-control span8 tip" readonly="readonly">
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
												<input type="text" name="nip" id="nip" value="<?php echo $row['nip'] ;?>" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										
										<div align="left" class="control-group">
											<label class="control-label" for="basicinput">Jumlah Pinjam</label>
											<div class="controls">
												<input name="jmlpinjam" id="jumlahpinjam"  class="form-control span8 tip" type="text" value="<?php echo $row['jmlpinjam']; ?> " required />
											</div>
										</div>
<br>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="kembalikan" id="kembalikan" value="Kembalikan" class="btn btn-sm btn-primary"/>
												
                                               <a href="?page=data-pinjam-guru" class="btn btn-sm btn-danger">Kembali</a>
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
       
      
    </body>
