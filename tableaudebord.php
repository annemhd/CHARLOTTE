<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background:#EFF0F3" class="text-slate-700">
    <?php
    include('configuration.php');

    if (!isset($_SESSION['email'])) {
        // echo 'PAS CONNECTÉ';
        // header('location:index.php');
    } else {
        include('entete.php');
        if ($_SESSION['statut'] == 'administrateur') {
            include('administrateur.php');
        } else if ($_SESSION['statut'] == 'organisateur') {
            include('organisateur.php');
        } else {
            include('utilisateur.php');
        }
    }
    include('footer.php');
    include('modals.php');
    ?>

    <script>
        <?php include('javascript.js'); ?>
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

</body>


</body>

</html>