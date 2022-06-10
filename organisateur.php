<div class="container xl mx-auto mt-14">
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
        <a href="">Mes évènements</a>
    </div>

    <h1 class="text-5xl font-bold mb-3">Mes évènements</h1>
    <?php
    $id_o = $_SESSION['id_utilisateur'];
    $link = mysqli_connect("localhost", "root", "root", "charlotte");
    $sql = mysqli_query($link, "SELECT * FROM evenements WHERE id_organisateur = '$id_o'") or die('Erreur de la requête SQL');
    $total = mysqli_num_rows($sql);

    ?>

    <p class="mb-3 text-slate-500"><?php echo $total; ?> évènements</p>

    <div class="grid gap-3 md:grid-cols-4">
        <?php
        $id_o = $_SESSION['id_utilisateur'];
        $link = mysqli_connect("localhost", "root", "root", "charlotte");
        $sql = mysqli_query($link, "SELECT * FROM evenements WHERE id_organisateur = '$id_o'") or die('Erreur de la requête SQL');
        while ($donnees = mysqli_fetch_array($sql)) {
        ?>

            <div class="bg-white rounded-xl overflow-hidden hover:drop-shadow-xl">

                <img class="mr-3 flex-none" style="display: block; height: 314px; width: 314px;background:grey;">
                <div class="p-5">
                    <p class="text-xs text-slate-500"><?php echo $donnees['date_debut']; ?> au <?php echo $donnees['date_fin']; ?></p>
                    <h2 class="font-bold truncate"><?php echo $donnees['titre_evenement']; ?></h2>

                    <p class="text-sm text-slate-500 mb-4"><?php echo $donnees['ville'] . " - " . $donnees['code_postal']; ?></p>
                    <p class="text-sm text-slate-500 h-24 max-w-fit">
                        <?php

                        if (strlen($donnees['description']) >= 150) {
                            echo substr($donnees['description'], 0, 150) . "...";
                        } else {
                            echo substr($donnees['description'], 0, 150);
                        }

                        ?>
                    </p>

                    <hr class="py-2">

                    <div class="flex justify-between items-center h-8 ">
                        <span class="py-1 px-3 bg-teal-100 text-teal-600 text-sm rounded-2xl truncate w-18"><?php echo $donnees['type_evenement']; ?></span>

                        <div class="flex gap-1">
                            <form method="POST" action="suppressionevent.php" class="m-0">
                                <input type="hidden" name="fiche_id" value="<?php echo $donnees['id_evenement']; ?>">
                                <input type="submit" name="fichesuppr" value="supprimer" class="flex justify-center text-white bg-rose-500 hover:bg-rose-600 p-2 h-8 rounded-lg text-xs font-medium cursor-pointer">
                            </form>
                            <form method="POST" action="tableaudebord.php" class="m-0">
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
                    <div class="w-full flex items-center rounded-lg py-1.5 mb-2">
                        <?php echo $donnees['description']; ?>
                    </div>
                    </fieldset>

                    <hr class="my-7">

                </div>

                <?php include('miseajourfiche.php'); ?>

                <div class="flex w-full justify-end">
                    <div class="flex gap-2">
                        <form method="POST" action="suppressionevent.php" class="m-0">
                            <input type="hidden" name="fiche_id" value="<?php echo $donnees['id_evenement']; ?>">
                            <input type="submit" name="fichesuppr" value="Supprimer l'évènement" class="btn-suppr flex justify-center text-white bg-rose-500 hover:bg-rose-600 p-2 rounded-lg cursor-pointer">
                        </form>

                        <button class="btn-majfiche cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">Modifier l'évènement</button>
                    </div>
                </div>





                <script>
                    const btnMAJfiche = document.querySelector('.btn-majfiche')
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