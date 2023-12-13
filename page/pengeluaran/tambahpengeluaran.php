<?php
// Id otomatis
$autoId = autoId('tbl_pengeluaran', 'PLG');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tanggal = strip_tags(addslashes($_POST['tanggal']));
    $qty = strip_tags(addslashes($_POST['qty']));
    $biaya = strip_tags($_POST['biaya']);
    $note = strip_tags(addslashes($_POST['note']));
    $query = "INSERT INTO tbl_pengeluaran VALUES ('$id', '$tanggal', '$qty', '$biaya','$note')";

    if (queryData($query) > 0) {
        echo "<script>
							alert('Data berhasil ditambahkan');
							document.location.href = '?page=Pengeluaran';
						</script>";
    } else {
        echo "<script>
							alert('Data gagal ditambahkan');
							document.location.href = '?page=Pengeluaran';
						</script>";
    }
}
?>


<!-- START: Content -->
<div class="container">

    <div class="card mt-4 mb-4">
        <h5 class="card-header d-flex flex-row align-items-center justify-content-between">
            <a>Tambah Pengeluaran</a>
            <a href="?page=Pengeluaran" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i>
            </a>
        </h5>
        <div class="card-body">

            <form method="post" action="">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Id </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id" name="id" value="<?= $autoId; ?>" required
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= date('d M Y'); ?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="qty" name="qty" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">Biaya</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="biaya" name="biaya" min="0" maxlength="20"
                            placeholder="" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="note" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="note" name="note" required></textarea>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="reset" class="btn btn-danger mr-2"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save"></i>
                        Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- END: Content -->