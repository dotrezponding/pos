
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	
</head>
<body>
<?php 

$f = date("dmy",strtotime($datapenjualan['Tanggal_Penjualan']));

header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=DATABARANGHUTANG_$f.xls");

?>
		<table>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b>REPORT BARANG HUTANG</b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="text-align:left;padding-left:6px;"></td>
			</tr>
			<tr>
				<td style="padding-left:6px;"colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Nota</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $nota; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b><?php echo strtoupper($toko['Nama_Toko']); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Hutang</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date('d F Y',strtotime($datapenjualan['Tanggal_Penjualan'])); ?></td>
			</tr>	
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Alamat_Toko'].' Rt. '.$toko['Rt'].' Rw. '.$toko['Rw']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Tanggal Tempo</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo date("d F Y",strtotime($customer["Tanggal_Tempo_Hutang"]));?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo ' Des. '.$toko['Desa']; ?>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Kasir</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $datapenjualan['Nama'];?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Kec. '.$toko['Kecamatan'].' Kab. '.$toko['Kabupaten'].' '.$toko['Kode_Pos'];?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Discount</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $datapenjualan["Discount"]." %"; ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo 'Telp : '.$toko['Telp'].' Fax : '.$toko['Fax']; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">PPN</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $datapenjualan["Ppn"]." %";?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><?php echo $toko['Email_Toko'];?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2">Total Amount</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format($datapenjualan["Total_Pembelian"],0,",","."); ?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Tunai</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format($datapenjualan["Bayar"],0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2"><b>CUSTOMER <?php echo strtoUpper($customer["Nama_Customer"]); ?></b></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Total Hutang</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format(substr($customer["Hutang"],1),0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;text-align:left;vertical-align:top;" colspan="2"><?php echo $customer["Alamat"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;vertical-align:top;" colspan="2" style="vertical-align:top;">Terbayar</td>
				<td style="padding-left:6px;vertical-align:top;">:</td>
				<td style="text-align:left;padding-left:6px;vertical-align:top;"><?php echo 'Rp. '.number_format(substr($customer["Hutang"]-$customer["Total_Hutang"],1),0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2">Telp. <?php echo $customer["Telepon"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Sisa Hutang</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo 'Rp. '.number_format(substr($customer["Total_Hutang"],1),0,",",".");?></td>
			</tr>
			<tr>
				<td style="padding-left:6px;" colspan="2">Email : <?php echo $customer["Email"]; ?></td>
				<td style="padding-left:6px;"></td>
				<td style="padding-left:6px;" colspan="2" style="vertical-align:top;">Status</td>
				<td style="padding-left:6px;">:</td>
				<td style="text-align:left;padding-left:6px;"><?php echo $customer["Status"];?></td>
			</tr>
						
		</table>
		
		<br>
		
		<table class="" style="margin-top:0px;">
	<tr style="border:1px solid #000;background-color:#DDDDDD;">
		<th style="border:1px solid #000;"><b>No</b></th>
		<th style="border:1px solid #000;"><b>Kode Barang</b></th>
		<th style="border:1px solid #000;"><b>Nama Barang</b></th>
		<th style="border:1px solid #000;"><b>Qty</b></th>
		<th style="border:1px solid #000;"><b>Harga Jual</b></th>
		<th style="border:1px solid #000;"><b>Subtotal</b></th>
	</tr>
	<?php 
		$no = $this->uri->segment('3') + 1;
		foreach($baranghutang as $baris){
		?>

	<tr style="border:1px solid #000;">
		<td align="center" style="border:1px solid #000;"><?php echo $no; ?></td>
		<td align="center" style="border:1px solid #000;"><?php echo $baris->Kode_Bahan_Baku; ?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo $baris->Nama_Barang;?></td>
		<td align="" style="border:1px solid #000;padding-left:10px;"><?php echo $baris->Qty.' '.$baris->Nama_Satuan;?></td>
		<td align="center" style="border:1px solid #000;"><?php echo 'Rp. '.number_format($baris->Harga_Jual,0,",","."); ?></td>
		<td align="center" style="border:1px solid #000;"><?php $sub = $baris->Qty * $baris->Harga_Jual; 
																echo 'Rp. '.number_format($sub,0,",","."); ?></td>
	</tr>
	<?php
	$no++;
		}
		?>
	<tr style="border:1px solid #000;background-color:#DDDDDD;">
		<th colspan="5" style="border:1px solid #000;"><b>Total</b></th>
		<th style="border:1px solid #000;"></b><?php echo 'Rp. '.number_format($tot["Total"],0,",",".");?></b></th>
	</tr>
	<tr>
		<td>&nbsp;<!--<b>NO. PO</b>--></td>
		<td><!--: po--></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;<!--<b>NOTE</b>--></td>
		<td><!--: note--></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td colspan="3"><center><b>PEGAWAI</b></center></td>
		<td colspan="3"><center><b>CUSTOMER<b></center></td>
		
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3"><center><b>( <?php echo $this->session->userdata["Username"]; ?> )</b></center></td>
		<td colspan="3"><center><b>( <?php echo $customer["Nama_Customer"]; ?> )</b></center></td>
	</tr>
	</table>
	
	</div>
</div>
</div>

</html>
