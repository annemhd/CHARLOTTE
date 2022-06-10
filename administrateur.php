<div class="container xl mx-auto justify-between mt-14">

    <div class="flex flex-row items-center gap-1">
        <a href="index.php">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.66732 13.3333V9.33333H9.33398V13.3333H12.6673V8H14.6673L8.00065 2L1.33398 8H3.33398V13.3333H6.66732Z" fill="#323232" />
            </svg>
        </a>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.93945 2.06L6.87945 6L2.93945 9.94L3.99945 11L8.99945 6L3.99945 1L2.93945 2.06Z" fill="#334155" />
        </svg>
        </a>
        <a href="tableaudebord.php">Espace utilisateur</a>
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.93945 2.06L6.87945 6L2.93945 9.94L3.99945 11L8.99945 6L3.99945 1L2.93945 2.06Z" fill="#334155" />
        </svg>
        <a href="">Tableau de bord</a>
    </div>


    <h1 class="text-5xl font-bold mb-3">Tableau de bord</h1>

    <div class="flex justify-between">
        <div class="flex flex-row">
            <?php
            $bgTous = 'bg-white';
            $bgNouveau = $bgSignalement = 'bg-slate-100 text-slate-400';

            if (isset($_POST['tous'])) {
                $bgTous = "bg-white";
                $bgNouveau = $bgSignalement = 'bg-slate-100 text-slate-400';
            }
            if (isset($_POST['nouveaux'])) {
                $bgNouveau = "bg-white";
                $bgTous = $bgSignalement = 'bg-slate-100 text-slate-400';
            }
            if (isset($_POST['signalements'])) {
                $bgSignalement = "bg-white";
                $bgNouveau = $bgTous = 'bg-slate-100 text-slate-400';
            }
            ?>

            <form method="POST" action="" class="flex items-center <?php echo $bgTous; ?> mb-0 px-4 rounded-xl rounded-bl-none rounded-br-none">
                <input type="submit" name="tous" value="Tous les utilisateurs" class="h-full cursor-pointer">
            </form>

            <form method="POST" action="" class="flex items-center <?php echo $bgNouveau; ?> mb-0 px-4 rounded-xl rounded-bl-none rounded-br-none">
                <input type="submit" name="nouveaux" value="Utilisateurs restraints" class="h-full cursor-pointer">
            </form>
            <form method="POST" action="" class="flex items-center <?php echo $bgSignalement; ?> mb-0 px-4 rounded-xl rounded-bl-none rounded-br-none ">
                <input type="submit" name="signalements" value="Évènements signalés" class="h-full cursor-pointer">
            </form>
        </div>

        <div class="flex flex-row">
            <div class="flex items-center rounded-xl py-2 px-3 my-2 w-72 bg-white">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.3333 9.33333H9.80667L9.62 9.15333C10.2733 8.39333 10.6667 7.40667 10.6667 6.33333C10.6667 3.94 8.72667 2 6.33333 2C3.94 2 2 3.94 2 6.33333C2 8.72667 3.94 10.6667 6.33333 10.6667C7.40667 10.6667 8.39333 10.2733 9.15333 9.62L9.33333 9.80667V10.3333L12.6667 13.66L13.66 12.6667L10.3333 9.33333V9.33333ZM6.33333 9.33333C4.67333 9.33333 3.33333 7.99333 3.33333 6.33333C3.33333 4.67333 4.67333 3.33333 6.33333 3.33333C7.99333 3.33333 9.33333 4.67333 9.33333 6.33333C9.33333 7.99333 7.99333 9.33333 6.33333 9.33333Z" fill="#334155" />
                </svg>
                <input type="text" name="recherche_utilisateur" placeholder="Rechercher un utilisateur" class="mx-3 w-full">
                <input type="submit" name="recherche_utilisateur" class="hidden">
            </div>
        </div>
    </div>

    <?php

    $a = null;

    // include('tous.php');

    if (isset($_POST['nouveaux'])) {
        $a = 'nouveaux.php';
    }
    if (isset($_POST['signalements'])) {
        $a = 'signalements.php';
    }

    if (isset($_POST['tous'])) {
        $a = 'tous.php';
    }

    function defaultFor(&$x, $default = null)
    {
        if (!isset($x)) $x = $default;
        include_once($x);
    }

    defaultFor($a, "tous.php");


    ?>

</div>