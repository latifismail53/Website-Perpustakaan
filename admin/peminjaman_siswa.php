
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Peminjaman Buku Siswa</title>
        <!-- css table datatables/dataTables -->
	<link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
            <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

    </head>
<body>
<!-- Penambahan Navigasi Bar Atas belum-->


           <center><div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="content">
                          

                                  <div  style="background-color: rgba(255,255,255,0.70); width: 90%;" class="panel panel-default">
                        <div class="panel-heading">

                       
                        <h3 class="panel-title"><i class="icon-book"></i>&nbsp<b>Data Peminjaman Buku Siswa</b></h3> 
                        </div>
                        <div class="panel-body table-responsive">
                                    <table id="lookup" class="table table-bordered table-hover" >  
	                                   <thead bgcolor="#eeeeee" align="center">
                                        <tr>
	  
                                        <th style="text-align: center;">Trx.</th>
                                        <th style="text-align: center;">id</th>
	                                    <th style="text-align: center;" width="30%">Judul </th>
                                        <th style="text-align: center;">NIS</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Kelas</th>
                                        <th style="text-align: center;">Tgl Pinjam</th>
	                                    <th style="text-align: center;">Tempo</th>
                                        <th style="text-align: center;" width="5%">Jumlah </th>

	                                    <th style="text-align: center;" class="text-center"> Action </th> 
	  
                                       </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div></center>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href=""> SMPN 1 Babadan</a> &copy; 2016 DataTables by Bootstrap </b></center>
            </div>
        </div>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-peminjaman-siswa.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">Tidak Ada Data Yang Ditemukan Pada Server Ini</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
        
      
    </body>
    </html>
