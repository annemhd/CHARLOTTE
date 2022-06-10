<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<?php
include('configuration.php');
?>

<!-- <body class="bg-slate-200 text-slate-700"> -->

<body style="background:#EFF0F3" class="text-slate-700">

	<?php
	include('entete.php');

	include('accueil.php');

	if (!isset($_SESSION['email'])) {
		// echo 'PAS CONNECTÉ<br>';
		$_SESSION['id_utilisateur'] = null;
	}


	?>


	<?php include('modals.php'); ?>



	<?php
	if (isset($_POST['connexion']) || isset($_POST['inscription'])) {
	?>
		<div class=" alert absolute mx-auto max-w-xs top-24 left-0 right-0 p-7 text-white text-center mx-auto bg-blue-400 rounded-lg">
			<?php echo $erreur; ?>
		</div>
	<?php
	} else {

	?>
		<div class=" alert hidden absolute mx-auto max-w-xs top-24 left-0 right-0 p-7 text-white text-center mx-auto bg-blue-400 rounded-lg">
			<?php $erreur = null; ?>
		</div>

	<?php
	}
	include('footer.php'); ?>



	<script>
		<?php include('javascript.js'); ?>
	</script>
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

</body>

</html>