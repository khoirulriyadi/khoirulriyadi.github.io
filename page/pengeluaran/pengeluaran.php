<!-- START: Content -->
<div class="container">

  <div class="card mt-4 mb-4">
    <div class="card-header">
      <h5>Pengeluaran</h5>
    </div>
    <div class="card-body">
      <!-- START: Button -->
      <div class="d-flex justify-content-start mb-4">
        <a href="?page=TambahPengeluaran" type="button" class="btn btn-sm btn-primary mr-3"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
        <a href="page/pengeluaran/laporanpengeluaran.php" target="_blank" type="button" class="btn btn-sm btn-info mr-3"><i class="fas fa-download fa-sm text-white"></i> Hasilkan PDF</a>
      </div>
      <!-- END: Button -->
      <table id="dataTables" class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Id Pengeluaran</th>
            <th>Tanggal</th>
            <th>Qty</th>
            <th>Biaya</th>
            <th>Keterangan</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php $pengeluaran = viewAllData("tbl_pengeluaran"); ?>
          <?php foreach($pengeluaran as $data) : ?>
          <tr>
            <td><?= $no++;?></td>
            <td><?= $data['id']; ?></td>
            <td><?= $data['tanggal']; ?></td>
            <td><?= $data['qty']; ?></td>
            <td><?= $data['biaya']; ?></td>
            <td><?= $data['note']; ?></td>
            <td>
              <a href="?page=EditPengeluaran&id=<?php echo $data['id']; ?>">
                <span class="fas fa-edit"></span>
              </a>
              &nbsp;&nbsp;
              <a href="?page=HapusPengeluaran&id=<?php echo $data['id']; ?>"
                onclick="return confirm('Yakin ingin hapus <?= $data['id']; ?>');">
                <span class="fas fa-trash"></span>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<!-- END: Content -->