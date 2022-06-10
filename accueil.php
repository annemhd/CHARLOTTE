<div class="container xl mx-auto mt-14">
    <h1 class="text-5xl font-bold mb-3">CHARLOTTE !</h1>
    <h2 class="text-3xl font-bold mb-3 -mt-3">Vous souhaite la bienvenue</h2>
    <p class="max-w-fit text-slate-600 text-sm -mt-2">Retrouvez tout les évènements culturels de l’Île-de-France <br>pendant les Jeux Olympique 2024</p>

    <div class="flex justify-between mt-14 mb-5">
        <h2 class="text-2xl font-bold">Que faire aujourd'hui ?</h2>
        <button class="flex justify-center items-center text-white bg-blue-600 hover:bg-blue-700 pl-4 pr-3 py-2  rounded-lg cursor-pointer">
            Plus d'évènements
            <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.32715 13.42L5.50715 14.6L12.1071 8.00002L5.50715 1.40002L4.32715 2.58002L9.74715 8.00002L4.32715 13.42Z" fill="white" />
            </svg>
        </button>
    </div>

    <div class="grid gap-3 md:grid-cols-5">
        <?php
        $link = mysqli_connect("localhost", "root", "root", "charlotte");
        $sql = mysqli_query($link, "SELECT * FROM evenements ORDER BY RAND() LIMIT 5") or die('Erreur de la requête SQL');
        while ($donnees = mysqli_fetch_array($sql)) {
        ?>

            <div class="bg-white rounded-xl overflow-hidden hover:drop-shadow-xl">

                <img class="mr-3 flex-none" style="display: block; height: 222px; width: 260px;background:grey;">
                <div class="p-5 min-h-fit">
                    <p class="text-xs text-slate-500"><?php echo $donnees['date_debut']; ?> au <?php echo $donnees['date_fin']; ?></p>
                    <h2 class="font-bold truncate"><?php echo $donnees['titre_evenement']; ?></h2>

                    <p class="text-sm text-slate-500 mb-4"><?php echo $donnees['ville'] . " - " . $donnees['code_postal']; ?></p>
                    <hr class="mb-3">

                    <div class="flex justify-between items-center h-8 mb-auto">
                        <span class="py-1 px-3 bg-teal-100 text-teal-600 text-sm rounded-2xl"><?php echo $donnees['type_evenement']; ?></span>

                        <div class="flex gap-1">
                            <form method="POST" action="index.php" class="m-0">
                                <input type="hidden" name="fiche_id" value="<?php echo $donnees['id_evenement']; ?>">
                                <input type="submit" name="fiche" value="voir plus" class="flex justify-center text-white bg-blue-600 hover:bg-blue-700 p-2 h-8 rounded-lg text-xs font-medium cursor-pointer">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="flex justify-between mt-14 mb-5">
        <h2 class="text-2xl font-bold">Autres évènements</h2>
        <button class="flex justify-center items-center text-white bg-blue-600 hover:bg-blue-700 pl-4 pr-3 py-2  rounded-lg cursor-pointer">
            Tous les évènements
            <svg class="ml-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.32715 13.42L5.50715 14.6L12.1071 8.00002L5.50715 1.40002L4.32715 2.58002L9.74715 8.00002L4.32715 13.42Z" fill="white" />
            </svg>
        </button>
    </div>

    <div class="grid gap-3 md:grid-cols-2">
        <?php
        $link = mysqli_connect("localhost", "root", "root", "charlotte");
        $sql = mysqli_query($link, "SELECT * FROM evenements ORDER BY RAND() LIMIT 6") or die('Erreur de la requête SQL');
        while ($donnees = mysqli_fetch_array($sql)) {
        ?>

            <div class="flex flex-row bg-white rounded-xl overflow-hidden hover:drop-shadow-xl">

                <img class="mr-3 flex-none" style="display: block; height: 166px; width: 166px;background:grey;">
                <div class="p-5 w-full flex flex-col">
                    <p class="text-xs text-slate-500"><?php echo $donnees['date_debut']; ?> au <?php echo $donnees['date_fin']; ?></p>
                    <h2 class="font-bold"><?php echo $donnees['titre_evenement']; ?></h2>

                    <p class="text-sm text-slate-500 mb-4"><?php echo $donnees['ville'] . " - " . $donnees['code_postal']; ?></p>


                    <div class="flex justify-between items-center h-8 mt-auto">
                        <span class="py-1 px-3 bg-teal-100 text-teal-600 text-sm rounded-2xl"><?php echo $donnees['type_evenement']; ?></span>

                        <div class="flex gap-1">
                            <form method="POST" action="index.php" class="m-0">
                                <input type="hidden" name="fiche_id" value="<?php echo $donnees['id_evenement']; ?>">
                                <input type="submit" name="fiche" value="voir plus" class="flex justify-center text-white bg-blue-600 hover:bg-blue-700 p-2 h-8 rounded-lg text-xs font-medium cursor-pointer">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
if (isset($_POST['fiche'])) {
    $id_event = $_POST['fiche_id'];
    $link = mysqli_connect("localhost", "root", "root", "charlotte");
    $sql = mysqli_query($link, "SELECT * FROM evenements WHERE id_evenement = '$id_event'") or die('Erreur de la requête SQL');
    while ($donnees = mysqli_fetch_array($sql)) {
?>

        <div id="fiche-event" class="w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0 flex flex-col justify-center items-center overflow-auto">
            <div class="absolute mx-auto bg-white drop-shadow2-xl py-8 px-12 rounded-2xl" style="width:844px">

                <div id="fiche-form" method="POST" action="" class="m-0">

                    <div class="justify-center justify-center pb-9">
                        <button class="absolute float-left" onclick="modal('#fiche-event')">
                            <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.6663 9.77337L16.7263 8.83337L12.9997 12.56L9.27301 8.83337L8.33301 9.77337L12.0597 13.5L8.33301 17.2267L9.27301 18.1667L12.9997 14.44L16.7263 18.1667L17.6663 17.2267L13.9397 13.5L17.6663 9.77337Z" fill="#475569"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex gap-12">
                        <img class="mr-3 flex-none" style="display: block; height: 244px; width: 244px;background:grey;">
                        <div class="w-full">
                            <div class="flex justify-between">
                                <span class="text-slate-500"><?php echo $donnees['date_debut']; ?> au <?php echo $donnees['date_fin']; ?></span>
                                <span class="py-1 px-3 bg-teal-100 text-teal-600 text-sm rounded-2xl"><?php echo $donnees['type_evenement']; ?></span>
                            </div>

                            <h2 class="text-lg font-bold mb-2  text-3xl"><?php echo $donnees['titre_evenement']; ?></h2>

                            <?php
                            echo "<a class='text-slate-500' href='https://maps.google.com/maps?q=" . $donnees['adresse'] . "+" . $donnees['ville'] . "+" . $donnees['code_postal'] . "' target='_blank'>";
                            echo $donnees['adresse'];
                            echo "</a>";
                            ?>
                            <p class="text-slate-500 mb-2"><?php echo $donnees['ville'] . " - " . $donnees['code_postal']; ?></p>

                            <hr class="w-full mb-2">

                            <p class="text-slate-500 mb-2">Crée par
                                <span class="font-semibold">
                                    <?php
                                    $id_organisateur = $donnees['id_organisateur'];
                                    $link = mysqli_connect("localhost", "root", "root", "charlotte");
                                    $sql = mysqli_query($link, "SELECT nom_organisation FROM utilisateurs WHERE id_utilisateur = '$id_organisateur'") or die('Erreur de la requête SQL');
                                    $donneesUsers = mysqli_fetch_array($sql);
                                    echo $donneesUsers['nom_organisation'];
                                    ?>
                                </span>
                            </p>

                        </div>
                    </div>
                    <h3 class="text-lg font-bold mb-2 mt-7">Description</h3>
                    <div class="w-full rounded-lg py-1.5 mb-2 max-h-56 overflow-auto">
                        <?php echo $donnees['description']; ?>
                    </div>
                    </fieldset>

                    <hr class="my-7">

                </div>

                <?php include('miseajourfiche.php'); ?>

                <?php if ($_SESSION['id_utilisateur'] != $donnees['id_organisateur']) { ?>
                    <div class="flex w-full justify-end">
                        <div class="flex gap-2">
                            <button class="btn-test cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2" onclick="modal('#fiche-event')">Fermer</button>
                        </div>
                    </div>
                <?php } else {
                ?>
                    <div class="flex w-full justify-end">
                        <div class="flex gap-2">
                            <form method="POST" action="suppressionevent.php" class="m-0">
                                <input type="hidden" name="fiche_id" value="<?php echo $donnees['id_evenement']; ?>">

                                <input type="submit" name="fichesuppr" value="Supprimer l'évènement" class="btn-suppr flex justify-center text-white bg-rose-500 hover:bg-rose-600 p-2 rounded-lg cursor-pointer">

                            </form>
                            <button class="btn-test cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">Modifier l'évènement</button>

                        </div>
                    </div>
                <?php

                } ?>

                <script>
                    const btnMAJfiche = document.querySelector('.btn-test')
                    const btnMAJficheCancel = document.querySelector('.btn-test-cancel')
                    const btnSuppr = document.querySelector('.btn-suppr')
                    const majForm = document.querySelector('#maj-form')
                    const ficheForm = document.querySelector('#fiche-form')

                    btnMAJfiche.addEventListener('click', () => {
                        majForm.classList.toggle('hidden')
                        ficheForm.classList.toggle('hidden')
                        btnMAJfiche.classList.add('hidden')
                        btnSuppr.classList.add('hidden')
                    })

                    btnMAJficheCancel.addEventListener('click', () => {
                        majForm.classList.toggle('hidden')
                        ficheForm.classList.toggle('hidden')
                        btnMAJfiche.classList.remove('hidden')
                        btnSuppr.classList.remove('hidden')
                    })
                </script>

            </div>
        </div>

<?php


    }
}
if (isset($_POST['fichesuppr'])) {
    header('suppresionevent.php');
}
?>