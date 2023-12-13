<?php
require_once('load/config.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Registration </title>
	<link href="asset/css/styleregister.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="asset/vendor/bootstrap-4.5.3/css/bootstrap.min.css">
</head>

<body>


	<div>
		<form action="register.php" method="post">
			<div class="container">

				<div class="row">
					<div class="col-sm-3">
						<h2>Registration Page</h2>
						<hr class="mb-3">
						<label for="nama"><b>Nama</b></label>
						<input class="form-control" id="nama" type="text" name="nama" required>

						<label for="username"><b>User Name</b></label>
						<input class="form-control" id="username" type="text" name="username" required>

						<label for="password"><b>Password</b></label>
						<input class="form-control" id="password" type="password" name="password" required>

						<label for="email"><b>Email Address</b></label>
						<input class="form-control" id="email" type="email" name="email" required>

						<label for="no_hp"><b>Phone Number</b></label>
						<input class="form-control" id="no_hp" type="text" name="no_hp" required>

						<label for="alamat"><b>Alamat</b></label>
						<input class="form-control" id="alamat" type="text" name="alamat" required>

						<label for="catatan"><b>Catatan</b></label>
						<input class="form-control" id="catatan" type="text" name="catatan" required>

						<!-- <label for="image"><b>Photo</b></label>
						<input class="form-control-file" id="image" type="file" name="image" required> -->

						<label for="role"><b>role</b></label>
						<select class="form-control" name="role" id="role">
							<!-- <option disabled selected><?= $data['role']; ?></option> -->
							<option value="Admin">Admin</option>
							<option value="Karyawan">Karyawan</option>
						</select>

	

						<hr class="mb-3">
						<input class="btn btn-primary" type="submit" id="register" aria-colcount="" name="create"
							value="Sign Up">
						<input class="btn btn-primary" type="submit" href="login.php" id="login.php" name=""
							value="Back">

					</div>
				</div>
			</div>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script type="text/javascript">
		$(function () {
			$('#register').click(function (e) {

				var valid = this.form.checkValidity();

				if (valid) {

					var nama = $('#nama').val();
					var username = $('#username').val();
					var password = $('#password').val();
					var email = $('#email').val();
					var no_hp = $('#no_hp').val();
					var alamat = $('#alamat').val();
					var catatan = $('#catatan').val();
					// var image = $('#image').val();
					var role = $('#role').val();

					
					e.preventDefault();

					$.ajax({
						type: 'POST',
						url: 'proses.php',
						data: { nama: nama, username: username, password: password, email: email, no_hp: no_hp, alamat: alamat, catatan: catatan, role:role },

						success: function (data) {
							Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
							}).then(function () {
								window.location.href = 'login.php'
							})
						},
						error: function (data) {
							Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
							})
						}
					});

				} else {

				}





			});


		});

	</script>
	<!-- <div class="content2">
		<img src="asset/img/4.jpeg" width="200px" height="200px">
	</div>
	<br>
	<br>
	<div class="content3">
		<img src="asset/img/3.jpeg" width="400px" height="500px">
	</div> -->
</body>

</html>