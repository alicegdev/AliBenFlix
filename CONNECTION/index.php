<?php
session_start();

if (!isset($_SESSION['email'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['email']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../STYLES/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/86bd08429f.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	include '../ELEMENTS/navbar.php';
	?>

	<div class="content col-md-12 text-center">
		<!-- notification message
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?> -->
		<?php if (isset($_SESSION['prenom'])) : ?>
			<div class="jumbotron" style="padding-top:1rem">
				<h4 class="d-print-flex">
					<p class="welcome">Bienvenue <strong><?php echo $_SESSION['prenom']; ?></strong></p>
				</h4>
				<hr class="my-4">
				<ul class="nav nav-pills nav-fill mb-4" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" role="pill" aria-controls="nouveautes_series" aria-selected="true" aria-current="page" href="#shows_new_in">Nouveautés séries</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" role="pill" aria-controls="nouveautes_films" aria-selected="true" aria-current="page" href="#movies_new_in">Nouveautés films</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="pill" role="pill" aria-controls="selon_preferences" aria-selected="true" aria-current="page" href="#user_favs" href="#">En fonction de vos préférences</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
					<?php include '..\ELEMENTS\shows-carousel.php' ?>
				</div>

			</div>
			<!-- logged in user information -->
		<?php endif ?>
	</div>

</body>

</html>