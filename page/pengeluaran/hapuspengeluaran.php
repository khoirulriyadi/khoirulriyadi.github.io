<?php 
  // Jika tidak ada id di url
  if (!isset($_GET['id'])) {
    header("Location: ?page=Pengeluaran");
    exit;
  }

  // Mengambil ID dari URL
  $id = $_GET['id'];

  if (deleteData('tbl_pengeluaran', $id) > 0) {
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = '?page=Pengeluaran';
          </script>";
  } else {
    echo "<script>
            alert('Data gagal dihapus');
          </script>";  
  }
?>