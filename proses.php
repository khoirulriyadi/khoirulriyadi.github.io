<?php
require_once('load/config.php');
?>
<?php
// if( isset($_POST['submit'])) {
//     $nama       			= addslashes($_POST['nama']);
//     $username         = stripslashes($_POST['username']);
//     $password      		= mysqli_real_escape_string($koneksi, $_POST['password']);
// 		$repeat_password	= mysqli_real_escape_string($koneksi, $_POST['repeat_password']);
// 		$email       			= stripslashes($_POST['email']);
// 		$nohp       			= stripslashes($_POST['no_hp']);
// 		$alamat       		= addslashes($_POST['alamat']);
// 		$catatan       		= addslashes($_POST['catatan']);
// 		$role							= "Karyawan";
if (isset($_POST)) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $catatan = $_POST['catatan'];
    // $image = $_POST['image'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    

    $password = password_hash($password, PASSWORD_DEFAULT);
    // $query 	= "INSERT INTO tbl_karyawan VALUES ( NULL, '$nama', '$username', '$password', '$email', '$nohp', '$alamat', '$catatan', '$image', '$role')";
    $sql = "INSERT INTO tbl_karyawan (nama, username, email, no_hp, alamat,  catatan, role, password) VALUES(?,?,?,?,?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$nama, $username, $email,  $no_hp,  $alamat, $catatan,  $role, $password]);
    if ($result) {
        echo 'Successfully saved.';
    } else {
        echo 'There were erros while saving the data.';
    }
} else {
    echo 'No data';
}
?>

