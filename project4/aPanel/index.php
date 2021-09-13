<?php
session_start();
ob_start();

if(isset($_POST['logOut'])){
    unset($_SESSION['name']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../aPanel/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><i class="fab fa-cpanel fa-8x"></i></span>
				<h4 class="company_title"></h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="text-center ">
						<h2 class="pt-4">Log In</h2>
					</div>
					<div class="row">
						<form control="" class="" action="admin/userAdmin.php" method="POST">
						<p class="text-danger text-text-center bg-black"><?php if(isset($_SESSION['erorr'])) {echo $_SESSION['erorr']; unset($_SESSION['erorr']); }?></p>
							<div class="col-12">
								<input required type="email" name="email" id="email" class="form__input" placeholder="E-mail">

							</div>
							<div class="col-12">
								<!-- <span class="fa fa-lock"></span> -->
								<input required type="password" name="password" id="password" class="form__input" placeholder="Password">
							</div>
							<div class="col-8 text-left">
								<input required type="checkbox" name="remember_me" id="remember_me" class="">
								<label for="remember_me" class="">Remember Me!</label>
							</div>
							<div class="row">
                                <div class="col-5">
								<input type="submit" name="submit" value="Submit" class="btn">
                                </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
<!-- header("Location:index/index.html"); -->