<?php 
	// Jika tidak ada ID di URL
	if (!isset($_GET['id'])) {
		header("Location: ?page=Pengeluaran");
		exit;
	}

	// Ambil ID dari URL
	$id = $_GET['id'];

	// Ambil semua data pelanggan berdasarkan ID
	$data = viewData("SELECT * FROM tbl_pengeluaran WHERE id = '$id'");

	if( isset($_POST['submit'])) {
		$id 		= $data['id'];
		$tanggal 	= strip_tags(addslashes($_POST['tanggal']));
		$qty = strip_tags(addslashes($_POST['qty']));
		$biaya		= strip_tags($_POST['biaya']);
        $note		= strip_tags($_POST['note']);
		$query 	= "UPDATE tbl_pengeluaran SET 
								tanggal 			= '$tanggal', 
								qty 		= '$qty', 
								biaya 		= '$biaya',
                                note 		= '$note'
							WHERE id 	= '$id'";

		if( queryData($query) > 0){
			echo "<script>
							alert('Data berhasil diubah');
							document.location.href = '?page=Pengeluaran';
						</script>";
		} else {
			echo "<script>
							alert('Data gagal diubah');
							document.location.href = '?page=Pengeluaran';
						</script>";
		}
	}
?>


<!-- START: Content -->
<div class="container container-fluid">

	<div class="card mt-4 mb-4">
		<h5 class="card-header d-flex flex-row align-items-center justify-content-between">
			<a>Edit Pengeluaran</a>
			<a href="?page=Pengeluaran" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-chevron-left fa-sm fa-fw"></i>
			</a>
		</h5>
		<div class="card-body">

			<form method="post" action="">
				<div class="form-group row">
					<label for="id" class="col-sm-2 col-form-label">Id Pengeluaran</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="id" name="id" value="<?= $data['id']; ?>" required readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>"
							placeholder="" maxlength="50" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="qty" class="col-sm-2 col-form-label">Qty</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="qty" name="qty" placeholder="Masukkan Qty Pelanggan"
							maxlength="255" required><?= $data['qty']; ?></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="biaya" name="biaya" value="<?= $data['biaya']; ?>" required>
					</div>
				</div>
                <div class="form-group row">
					<label for="note" class="col-sm-2 col-form-label">note</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" id="note" name="note" placeholder="Masukkan note Pelanggan"
							maxlength="255" required><?= $data['note']; ?></textarea>
					</div>
				</div>
				<div class="card-footer text-center">
					<button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
					<button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Change</button>
				</div>
			</form>
		</div>
	</div>

</div>
<!-- END: Content -->