<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
 <link href="<?php echo base_url()?>assets/untukcssfoto/layout2.css" rel="stylesheet" type="text/css" media="all">   
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap-3.3.7-dist-1/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  
 </head>

<!-- untuk auto complete-->
   <script src="<?php echo base_url()?>assets/menuadmin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/autocomplete/js/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/autocomplete/js/jquery.autocomplete.css' rel='stylesheet' />

    <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
    <script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocompletebarang').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/Penjualan/cariautobarang',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
					$('#Kode_Bahan_Baku').val(''+suggestion.Kode_Bahan_Baku); 
                    $('.Nama_Barang').val(''+suggestion.Nama_Barang); 
					//$('#Harga_Beli').val(''+suggestion.Harga_Beli); 
					$('#Nama_Satuan').val(''+suggestion.Nama_Satuan);
					//$('#Nama_Satuan2').val('/ '+suggestion.Nama_Satuan); 
					$('#Stok').val(''+suggestion.Stok+' / '+suggestion.Nama_Satuan);
					$('#Stok2').val(''+suggestion.Stok); 
					$('#Isi').val(''+suggestion.Isi+' '+suggestion.Nama_Satuan); 	
					$('#Harga_Jual').val(''+suggestion.Harga_Jual);
					$('#Level').val(''+suggestion.Level);					
					$('#Default_Isi').val(''+suggestion.Isi_Default+' '+suggestion.Nama_Satuan);						
					//$('#Satuan').val(''+suggestion.Satuan); 
                }
            });
        });
    </script>
	<!-- sampe sini auto completenya-->
	 <script type='text/javascript'>
function tidaklebih(){
	var a = document.getElementById('Nama_Satuan').value;
	var b = document.getElementById('Default_Isi').value;
	var c = document.getElementById('Level').value;
	
	if(c == "Lv1"){
		document.getElementById('hasiltidaklebih').value = "";
	}else{
		document.getElementById('hasiltidaklebih').value = "Qty Tidak Lebih Dari "+b;
	}
		

}
		
	 </script>
<script>
$(document).ready(function(){
	$("#nmbarang").click(function(){
		document.getElementById('Level').value="";
		document.getElementById('Kode_Bahan_Baku').value="";
		document.getElementById('Isi').value="";
		document.getElementById('nmbarang').value="";
		document.getElementById('Harga_Jual').value="";
		document.getElementById('Default_Isi').value="";
		document.getElementById('hasiltidaklebih').value="";
		document.getElementById('qtysubtotal').value="";
    });
});
</script>
	 <script src="<?php echo base_url('assestsdatatable/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assestsdatatable/datatables/js/dataTables.bootstrap.js')?>"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
    var save_method; //for save method string
    var table;
	var id;


    function add_pembelian()
    {
      save_method = 'add';
     // $('#form')[0].reset(); // reset form on modals
      $('#myModal').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }
	
	 function add_konfirmasi()
    {
      save_method = 'add';
     // $('#form')[0].reset(); // reset form on modals
      $('#konfirmasi').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }


  </script>

<script type="text/javascript">
function subtotal(){
	var a = document.getElementById('qtysubtotal').value;
	var b = document.getElementById('Harga_Jual').value;
	var result = parseInt(a) * parseInt(b);
	
	if(!isNaN(result)){
	 document.getElementById('totalsubtotal').value = result;
		
	}else{
		document.getElementById('totalsubtotal').value = '';
	}
}
</script>
<script type="text/javascript">			
		function sumdisc(){
			var a = document.getElementById('total').value;
			var b = document.getElementById('disc').value;
			var c = document.getElementById('total2').value;
			var d = document.getElementById('ppn').value;
			
			var result = parseInt(c) - (parseInt(c) * parseInt(b)/100);
			
			if(!isNaN(result)){
			 document.getElementById('total').value = result;
				
			}else{
				document.getElementById('total').value = c;
			}
		}
		
		function sumppn(){
			var a = document.getElementById('total').value;
			var b = document.getElementById('ppn').value;
			var c = document.getElementById('total2').value;
			var d = document.getElementById('disc').value;
			
			var result = parseInt(c) - (parseInt(c) * parseInt(d)/100) + (parseInt(a) * parseInt(b)/100);
			//var result = parseInt(a) + parseInt(b);
			//var resultback = parseInt(c) - parseInt(d);
			var resultback = parseInt(c) - (parseInt(c) * parseInt(d)/100)
			if(!isNaN(result)){
			 document.getElementById('total').value = result;
				
			}else{
				document.getElementById('total').value = resultback;
			}
		}
		function bayarbeli(){
			var a = document.getElementById('total').value;
			var b = document.getElementById('bayar').value;
			var result = parseInt(b) - parseInt(a);
			
			if(!isNaN(result)){
			 document.getElementById('sisa').value = result;
				
			}else{
				document.getElementById('sisa').value = '0';
			}
		}
	</script>
 <script type="text/javascript">
$(document).ready(function(){
$("#payment").click(function(){
		$("#pembayaran").toggle();
		$("#all").toggle();
    });
  })
 </script>
<style>
 #table{
	font-family:sans-serif;
	color:#444;
	border-collapse:collapse;
	width:100%;
	border:1px solid #f2f5f7;
}
#table tr th{
	background:#008080;
	color:#fff;
	font-weight:normal;
		text-align:center;
	
}
#table, th, td{
	padding:8px 20px;
	text-align:;
}
#table, tr, td{
	padding:8px 20px;
	text-align:;
}
#table tr:nth-child(even){
	background-color:#DDDDDD;
}
 </style>
 


</head>
<body>
<div class="col-xs-12">
<div class="col-xs-11 pull-right" style="padding-left:120px;"> 
<br>
<a href="<?php echo base_url('Penjualan/index');?>" class="btn btn-danger glyphicon glyphicon-chevron-left"> Back</a>
<br>
<br>
<legend>
</legend>
	
	<form class="form-signin" method="POST" action="<?php echo base_url();?>Penjualan/pembayaran/" enctype="multipart/form-data">
		
	<table id="table" style="border:none;">
		<tr>
			<td>
				<h3 style="width:300px">Transaksi Pembelian</h3>
			</td>
			<td  align="right" colspan="2">
	
				<div class="input-group col-md-10" style="width:300px" >
					No. Nota : <div class="input-group"> <input type="text" name="Nota" class="form-control" value="<?php echo $nota; ?>" readonly="readonly">
					<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
				</div>
				</div>
	
			</td>
			<td align="left">
				<div class="input-group col-md-10" style="width:300px">
					Tanggal Pembelian
					<div class="input-group">
						<input class="form-control" type="text" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d F Y');?>" readonly="readonly">
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
	
			</td>
		</tr>
		<tr>
			<td align="left">
				Kasir :
				<div class="input-group col-md-8" style="width:300px">
					<input type="hidden" name="Kode_User" class="form-control" value="<?php echo $this->session->userdata['Kode_User']; ?>">
					<input type="text" class="form-control" value="<?php echo $this->session->userdata['Username']; ?>" readonly="readonly">
				</div>
			</td>
			
			<td align="right">
				<span id="payment" title="Pembayaran" style="margin-top:15px;" class="btn btn-primary glyphicon glyphicon-usd"> PAYMENT</span>
			</td>
			
			<td align="right">
				<p style="margin-top:30px;align:right;" ><b><h5>Total Pembelian : </h5></b></p> 
			</td>
			
			<td>
			
				<?php foreach ($tot as $tt){?>
				<input type="text" name="Total_Pembelian" id="total" class="form-control" style="margin-top:20px; width:300px; background-color:#FFFFAA;" value="<?php echo $tt->Total; }?>" readonly="readonly"> 
			
			</td>			
		</tr>
		<tr>
			<td>
		
			</td>
		</tr>
	</table>
	
	<div id="pembayaran" class="col-xs-6" style="display:none;">
		<div class="Compose-Message">               
			<div class="panel panel-default">
				<div class="panel-heading" style="border:1px solid #DDDDDD;background:#DDDDDD;">
                       
				<b>Pembayaran</b>
								
				</div>
		<div class="panel-body" style="padding-top:10px;border:1px solid #DDDDDD">
        
		
		<?php foreach ($tot as $tt){?>
		<input type="hidden" id="total2" name="Total_Sebelumnya" class="form-control" value="<?php echo $tt->Total; }?>"> 
		<table class="table" style="margin-bottom:-10px;background-color:white;">
			<tr>
			<td style="border-top:1px solid white;">Discount</td>
			<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" required id="disc" onkeyup="sumdisc();" name="Discount" class="form form-control" style="width:60px;border-right:none;" value="0" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
			
		</tr>
		<tr>
			<td style="border-top:1px solid white;">PPN</td>
			<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" required name="Ppn" id="ppn" onkeyup="sumppn();" class="form form-control" style="width:60px;border-right:none;" value="0" required>
					<input type="text" readonly="readonly" value="%" class="form form-control" style="border-left:none;width:40px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
				</div>
			</td>
		</tr>
			<tr >
				<td style="border-top:1px solid white;">Tunai</td>
				<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" readonly="readonly" required class="form form-control" style="border-right:none;width:50px;border-radius:5px 0px 0px 5px; padding-top:6px;padding-left:8px;" value="Rp. " required>
					<input type="text" name="Bayar" required class="form form-control" id="bayar" onkeyup="bayarbeli();" style="margin-left:-10px;width:150px;border-left:none;" >
				</div>
				</td>
			</tr>
			<tr >
				<td style="border-top:1px solid white;">Kembali</td>
				<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" readonly="readonly" required class="form form-control" style="background-color:;border-right:none;width:50px;border-radius:5px 0px 0px 5px; padding-top:6px;padding-left:8px;" value="Rp. " required>
					<input type="text" readonly="readonly" required name="Sisa" id="sisa"  class="form form-control"  style="background-color:;margin-left:-10px;width:150px;border-left:none;" >
				</div>
				</td>
			</tr>
			
			<tr >
				<td style="border-top:1px solid white;"></td>
				<td style="border-top:1px solid white;">
				<input type="submit" name="SubmitBayar" style="width:40%;" class="form form-control btn btn-success glyphicon glyphicon-usd" value="Bayar">
				<input type="submit" name="SubmitHutang" style="width:40%;" class="form form-control btn btn-primary glyphicon glyphicon-floppy-disk" value="Hutang">
				
				</td>
			</tr>
			
		</table>
		</form>
		
		</div>
		</div>
	</div>
	</div>
	
	<div id="all">
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default" style="margin-bottom:-10px;" >
			<form class="form-signin" method="POST" action="<?php echo base_url();?>Penjualan/inputpembelian/" enctype="multipart/form-data">
		
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:-4px;background:#DDDDDD;">
                       
				<b>Input Barang</b>
					<button type="reset" title="Remove" class="pull-right btn-link glyphicon glyphicon-remove"></button>	
					<button type="submit" title="Tambah Barang" style="width:;" class="pull-right btn-link glyphicon glyphicon-shopping-cart"></button>
				</div>
		<div class="panel-body" style="border:1px solid #DDDDDD">
                        
	
		<input name="Id_Nota" type="hidden" required class="form form-control" value="<?php echo $detnota;?>">
		<input name="Nota" type="hidden" required class="form form-control" value="<?php echo $nota;?>">
		<input name="Kode_User" type="hidden" required class="form form-control" value="<?php echo $this->session->userdata['Kode_User'];?>">
		
		<table class="table" style="margin-bottom:-5px;background-color:white;">
			<tr>
				<td style="border-top:1px solid white;">Barang</td>
				<td style="border-top:1px solid white;">
				<input name="Kode_Bahan_Baku" type="hidden" required id="Kode_Bahan_Baku" class="form form-control">
				<input name="Nama_Barang" type="text" id="nmbarang" required class="autocompletebarang Nama_Barang form form-control">
				</td>
			</tr>
			<tr >
				<td style="border-top:1px solid white;">Isi / Satuan</td>
				<td style="border-top:1px solid white;">
				<input required name="Nama_Satuan" id="Nama_Satuan" readonly="readonly" type="hidden" class="form form-control">
				<input required id="Isi" readonly="readonly" type="text" class="form form-control">
				</td>
				
			</tr>
			<!--<tr >
				<td style="border-top:1px solid white;">Default Isi</td>
				<td style="border-top:1px solid white;">-->
				<input required id="Level" name="Level" readonly="readonly" type="hidden" class="form form-control">
				<input required id="Default_Isi" name="Default_Isi" readonly="readonly" type="hidden" class="form form-control">
				<!--</td>
			</tr>-->
			<tr>
				<td style="border-top:1px solid white;">Qty</td>
				<td style="border-top:1px solid white;">
				<div class="input-group">
					<input type="text" required name="Qty" id="qtysubtotal" onkeyup="subtotal();" onclick="tidaklebih();" class="form form-control" style="border-radius:5px 5px 5px 5px;width:80px;" required>
					<input type="text" readonly="readonly" id="hasiltidaklebih" class="form form-control" style="background:white;border:1px solid white;width:230px;border-radius:5px 5px 5px 5px; margin-top:0px; padding-top:6px;margin-left:0px;">
				</div>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Harga Jual</td>
				<td style="border-top:1px solid white;"><input name="Harga_Jual" required id="Harga_Jual" readonly="readonly" type="text" class="form form-control"></td>
			</tr>
			
		</table>
	</form>
		</div>
		</div>
	</div>
	</div>
	<!-- bkkgibo -->
	<div class="col-xs-6">
		<div class="Compose-Message">               
			<div class="panel panel-default">
				<div class="panel-heading" style="border:1px solid #DDDDDD;margin-bottom:0px;background:#DDDDDD;">
                       
				<b>Scan Barcode</b>
				<a href="<?php echo base_url("Penjualan/inputpembelian"); ?>" style="margin-top:0px;" title="Remove" class="pull-right"><span class="btn-link glyphicon glyphicon-remove"></span></a>			
				</div>
		<div class="panel-body" style="padding-top:10px;border:1px solid #DDDDDD">
        <form class="form-signin" method="POST" action="<?php echo base_url();?>Penjualan/scanbarcode/" enctype="multipart/form-data">
		<?php foreach ($tot as $tt){?>
		<input type="hidden" id="total2" class="form-control" value="<?php echo $tt->Total; }?>"> 
		<table class="table" style="margin-bottom:-1px;background-color:white;">
			<tr>
				<td style="border-top:1px solid white;">Scan Barcode
				
				</td>
				<td style="border-top:1px solid white;">
					<input name="Id_Nota" type="hidden" required class="form form-control" value="<?php echo $detnota;?>">
					<input name="Nota" type="hidden" required class="form form-control" value="<?php echo $nota;?>">
					<input name="Kode_User" type="hidden" required class="form form-control" value="<?php echo $this->session->userdata['Kode_User'];?>">
			
					<input name="Kode_Bahan_Baku" type="text" placeholder="Code Barcode" required class="form form-control">
					<input name="Qty" value="1" type="hidden" required class="form form-control">
					<input name="Nama_Satuan" value="PCS" type="hidden" required class="form form-control">
					
				
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Code Barcode</td>
				<td style="border-top:1px solid white;">
					: <?php $barcode;
							if($barcode){
								echo $barcode['Code_Barcode'];
							}else{
								echo "";
							} ?>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Nama Barang</td>
				<td style="border-top:1px solid white;">
					: <?php $barcode;
							if($barcode){
								echo $barcode['Nama_Barang'];
							}else{
								echo "";
							} ?>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Qty</td>
				<td style="border-top:1px solid white;">
					: <?php $barcode;
							if($barcode){
								echo "1 ".$barcode['Nama_Satuan'];
							}else{
								echo "";
							} ?>
				</td>
			</tr>
			<tr>
				<td style="border-top:1px solid white;">Harga Jual</td>
				<td style="border-top:1px solid white;">
					: <?php $barcode;
							if($barcode){
								echo 'Rp. '.number_format($barcode['Harga_Jual'],0,",",".");
							}else{
								echo "";
							} ?>
				</td>
			</tr>
			
		</table>
		</form>
		</div>
		</div>
	</div>
	</div>
	
	</div>
	<!-- bkkgibo -->
	
	<table id="table" class="table table-bordered table responsive">
		
		<tr>
			<th style="align:center;"><b>No.</b></th>
			<th align="center"><b>Kode Barang</b></th>
			<th align="center"><b>Nama Barang</b></th>
			<th align="center"><b>Qty</b></th>
			<th align="center"><b>Harga Jual</b></th>
			<th align="center"><b>Subtotal</b></th>
			<th align="center"><b>Tools</b></th>
		</tr>
		
		<?php 
		$no = $this->uri->segment('5') + 1;
		foreach($datatable as $baris){
		?>
	<tr>
		<td align="center" ><?php echo $no; ?></td>
		<td align="center" ><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="center" ><?php echo $baris->Nama_Barang; ?></td>
		<td align="center" ><?php echo $baris->Qty.' '.$baris->Nama_Satuan; ?></td>
		<td align="left" ><?php echo 'Rp. '.number_format($baris->Harga_Jual,0,",","."); ?></td>
		<td align="left" ><?php $sub = $baris->Qty * $baris->Harga_Jual; 
								echo 'Rp. '.number_format($sub,0,",",".");?></td>
		<td align="center" >
		<a href="<?php echo base_url('Penjualan/hapuspenjualandetail/'.$baris->Id_Nota); ?>"><span class="btn btn-danger btn-sm glyphicon glyphicon-trash" align="right"> Delete</span></a>
		</td>
	</tr>
	<?php
		$no++;
		}
		?>
		<tr>
			<th colspan="5" align="center"><b >Total</b></th>
			<th colspan="2"><b class="pull-left"><?php foreach ($tot as $tt){?>
			<?php echo 'Rp. '.number_format($tt->Total,0,",",".");}?></b>
			</th>
		</tr>
	</table>
<legend>
</legend>

</div>
</div>
<div class="container">
<!-- untuk Tambah Bahan Baku-->		
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Input Data Pembelian</h3>
        </div>
	<div class="modal-body">
        <form style="display:block;" id="test" class="form-signin" method="POST" action="<?php echo base_url();?>Pembelian/tambahpembelianbahanbaku/" enctype="multipart/form-data">
	
	<table class="table table-bordered table responsive">
	<input type="hidden" name="Id_Transaksi" value="<?php echo $tr; ?>" >
	<input type="hidden" name="No_Faktur" value="<?php echo $fak; ?>" >
	<input type="hidden" name="Kode_User" value="<?php echo $this->session->userdata['Kode_User']; ?>" >
		<tr>
			<td>Bahan Baku</td>
			<td>
			<input required type="hidden" name="Kode_Bahan_Baku" class='form-control' id="Kode_Bahan_Baku" placeholder="Bahan Baku" required>
			<input required type="text" name="Nama_Barang" class='autocompletebarang form-control Nama_Barang'  placeholder="Bahan Baku" required>
			</td>
		</tr>
		<tr>
			<td>Qty</td>
			<td>
			<div class="input-group">
		<input required name="Qty" style="border-right:none;margin:0px 0px 0px 0px; width:100px;" type="text" class='form-control' placeholder="Qty" id="Qty" onkeyup="sum();"/>
		<input type="text" readonly="readonly" name="Nama_Satuan" id="Nama_Satuan" class="form form-control" style="border-left:none;width:200px;border-radius:0px 5px 5px 0px; margin-top:0px; padding-top:6px;padding-left:8px;">
		</div>
		
			<!--<input required type="text" name="Qty" class='form-control' placeholder="Qty" id="Qty" onkeyup="sum();" required>
			-->
			</td>
		</tr>
		<!--<tr>
			<td>Satuan</td>
			<td>
			<input required type="text" class='form-control' id="Satuan" readonly="readonly" required>
			</td>
		</tr>
		-->
		<tr>
			<td>Harga Beli</td>
			<td>
			<input required type="text" name="Harga_Beli" style="background-color:#FFFFAA;" class='form-control' id="Harga_Beli" readonly="readonly" required>
			</td>
		</tr>
		<tr>
			<td>Total Harga</td>
			<td> 
			<input required type="text" style="background-color:#FFFFAA;" class='form-control' id="Total_Harga" readonly="readonly" required>
			</td>
		</tr>
	</table>
	<div class="modal-footer">
			<input type="submit" onclick="return confirm('Anda Yakin Ingin Menyimpan Data Ini..??')" class="btn btn-success" value="Save">
			<input type="reset" class="btn btn-warning" value="Clear">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
	</form>
        </div>
		
        </div>
		
	 </div>
	  </div>
 </div>
  <!-- Bootstrap modal -->
  
  </body>
</html>

	