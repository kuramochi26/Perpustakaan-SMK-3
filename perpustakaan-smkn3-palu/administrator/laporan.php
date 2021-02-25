<h2>IMPOR LAPORAN</h2><br>
<div class="alert alert-info">Untuk Sementara Hanya Tersedia Impor Menjadi Bentuk <b>.xls</b> (Excel)   </div>

<form method="post" action="laporan-siswa-import-excel.php" target="_blank">
	<center><h3>IMPOR LAPORAN PEMINJAMAN SISWA</h3></center>
	<div class="row" style="background: #0022ff; margin-left: -2px; margin-right: -2px;">
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" required value="<?php echo $tanggal_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" required value="<?php echo $tanggal_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
		</div>
	</div>
</form>
	<br>
<center><h3>IMPOR LAPORAN PEMINJAMAN GURU</h3></center>
<form method="post" action="laporan-guru-import-excel.php" target="_blank">
	<div class="row" style="background: #0022ff; margin-left: -2px; margin-right: -2px;">
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" required value="<?php echo $tanggal_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" required value="<?php echo $tanggal_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
		</div>
	</div>
</form>
<br>
<center><h3>IMPOR LAPORAN PEMINJAMAN KELAS</h3></center>
<form method="post" action="laporan-kelas-import-excel.php" target="_blank">
	<div class="row" style="background: #0022ff; margin-left: -2px; margin-right: -2px;">
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" required value="<?php echo $tanggal_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" required value="<?php echo $tanggal_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
		</div>
	</div>
</form>
<br>
<center><h3>IMPOR LAPORAN PENGUNJUNG SISWA</h3></center>
<form method="post" action="laporan-pengunjung-siswa-import-excel.php" target="_blank">
	<div class="row" style="background: #0022ff; margin-left: -2px; margin-right: -2px;">
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" required value="<?php echo $tanggal_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" required value="<?php echo $tanggal_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
		</div>
	</div>
</form>
<br>
<center><h3>IMPOR LAPORAN PENGUNJUNG GURU</h3></center>
<form method="post" action="laporan-pengunjung-guru-import-excel.php" target="_blank">
	<div class="row" style="background: #0022ff; margin-left: -2px; margin-right: -2px;">
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" required value="<?php echo $tanggal_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label style="color: white;">Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" required value="<?php echo $tanggal_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-default"><span class="glyphicon glyphicon-print"></span></button>
		</div>
	</div>
</form>