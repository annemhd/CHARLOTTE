<?php

//il est connecté on recupere ses infos
if (isset($_POST['miseajour'])) {
    //la variable erreur vaut null par défaut
    $erreur = null;
    //on convertit chaque champ en variable avec la fonction extract()
    extract($_POST);

    //on verifie les champs vides
    if (empty($prenom) || empty($nom) || empty($email)) {
        $erreur = 'Veuillez remplir tous les champs';
    }

    // //on verifie si le mail est déjà utilisé
    $sql = mysqli_query($link, "SELECT * FROM utilisateurs WHERE email = '" . $donnees['email'] . "' AND id_utilisateur != '" . $donnees['id_utilisateur'] . "'") or die('Erreur de la requête SQL');
    $total = mysqli_num_rows($sql);
    if ($total != 0) {
        //ce membre existe déja
        $erreur = 'Cette email est déjà utilisé';
    }


    if ($erreur == null) {
        //tout est OK on fait la mise à jours de l'utilisateur
        /* si le mot de passe est saisi on change dans le cas contraire
        on garde l'ancien mot de passe 
        */
        print_r($donnees);

        if (empty($mot_de_passe)) {
            $mot_de_passe = $_SESSION['mot_de_passe'];
        } else {
            //on crypte le mot de passe 
            $mot_de_passe = md5($mot_de_passe);
        }
        // header('Location:refresh.php');
    }
}
if (isset($_SESSION)) {
    $sql = mysqli_query($link, "SELECT * FROM utilisateurs WHERE id_utilisateur = '" . $_SESSION['id_utilisateur'] . "'") or die('Erreur de la requête SQL');
    $donnees = mysqli_fetch_array($sql);
}

?>

<div id="gestioncompte-form" class="w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0 flex flex-col justify-center items-center hidden">
    <div class="absolute mx-auto bg-white drop-shadow2-xl p-12 rounded-2xl min-w-fit " style="width:516px">
        <div class="justify-center justify-center">
            <button class="absolute float-left"><svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg" onclick="modal('#gestioncompte-form')">
                    <path d="M17.6663 9.77337L16.7263 8.83337L12.9997 12.56L9.27301 8.83337L8.33301 9.77337L12.0597 13.5L8.33301 17.2267L9.27301 18.1667L12.9997 14.44L16.7263 18.1667L17.6663 17.2267L13.9397 13.5L17.6663 9.77337Z" fill="#475569" />
                </svg>
            </button>
            <h2 class="text-3xl font-semibold flex justify-center mb-7"> Mon compte</h2>
        </div>
        <form method="GET" action="miseajourcompte.php">
            <fieldset class="min-w-fit">

                <div class=" flex gap-2">
                    <div class="w-6/12 flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                        <label for="prenom"></label>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00033 7.99996C9.47366 7.99996 10.667 6.80663 10.667 5.33329C10.667 3.85996 9.47366 2.66663 8.00033 2.66663C6.52699 2.66663 5.33366 3.85996 5.33366 5.33329C5.33366 6.80663 6.52699 7.99996 8.00033 7.99996ZM8.00033 9.33329C6.22033 9.33329 2.66699 10.2266 2.66699 12V13.3333H13.3337V12C13.3337 10.2266 9.78032 9.33329 8.00033 9.33329Z" fill="#334155" />
                        </svg>
                        <input type="text" class="w-full bg-slate-200 ml-2" name="prenom" placeholder="Prénom" value="<?php echo $donnees['prenom']; ?>">
                    </div>

                    <div class="w-6/12 flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                        <label for="nom"></label>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00033 7.99996C9.47366 7.99996 10.667 6.80663 10.667 5.33329C10.667 3.85996 9.47366 2.66663 8.00033 2.66663C6.52699 2.66663 5.33366 3.85996 5.33366 5.33329C5.33366 6.80663 6.52699 7.99996 8.00033 7.99996ZM8.00033 9.33329C6.22033 9.33329 2.66699 10.2266 2.66699 12V13.3333H13.3337V12C13.3337 10.2266 9.78032 9.33329 8.00033 9.33329Z" fill="#334155" />
                        </svg>
                        <input type="text" class="w-full bg-slate-200 ml-2" name="nom" placeholder="Nom" value="<?php echo $donnees['nom']; ?>">
                    </div>
                </div>

                <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                    <label for="email"></label>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.333 2.66663H2.66634C1.93301 2.66663 1.33967 3.26663 1.33967 3.99996L1.33301 12C1.33301 12.7333 1.93301 13.3333 2.66634 13.3333H13.333C14.0663 13.3333 14.6663 12.7333 14.6663 12V3.99996C14.6663 3.26663 14.0663 2.66663 13.333 2.66663ZM13.333 5.33329L7.99967 8.66663L2.66634 5.33329V3.99996L7.99967 7.33329L13.333 3.99996V5.33329Z" fill="#334155" />
                    </svg>
                    <input type="text" class="w-full bg-slate-200 ml-2" name="email" placeholder="Email" value="<?php echo $donnees['email']; ?>">
                </div>

                <?php
                if ($_SESSION['statut'] == 'organisateur' || $_SESSION['statut'] == 'administrateur') {
                ?>

                    <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                        <label for="nom_organisation"></label>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.99967 4.66667V2H1.33301V14H14.6663V4.66667H7.99967ZM6.66634 12.6667H2.66634V11.3333H6.66634V12.6667ZM6.66634 10H2.66634V8.66667H6.66634V10ZM6.66634 7.33333H2.66634V6H6.66634V7.33333ZM6.66634 4.66667H2.66634V3.33333H6.66634V4.66667ZM13.333 12.6667H7.99967V6H13.333V12.6667ZM11.9997 7.33333H9.33301V8.66667H11.9997V7.33333ZM11.9997 10H9.33301V11.3333H11.9997V10Z" fill="#334155" />
                        </svg>
                        <input type="text" class="w-full bg-slate-200 ml-2" name="nom_organisation" placeholder="Nom de l'organisation / Entreprise (facultatif)" value="<?php echo $donnees['nom_organisation']; ?>">
                    </div>

                    <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                        <label for="numero_siret"></label>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.99967 4.66667V2H1.33301V14H14.6663V4.66667H7.99967ZM6.66634 12.6667H2.66634V11.3333H6.66634V12.6667ZM6.66634 10H2.66634V8.66667H6.66634V10ZM6.66634 7.33333H2.66634V6H6.66634V7.33333ZM6.66634 4.66667H2.66634V3.33333H6.66634V4.66667ZM13.333 12.6667H7.99967V6H13.333V12.6667ZM11.9997 7.33333H9.33301V8.66667H11.9997V7.33333ZM11.9997 10H9.33301V11.3333H11.9997V10Z" fill="#334155" />
                        </svg>
                        <input type="text" class="w-full bg-slate-200 ml-2" name="numero_siret" placeholder="SIRET" value="<?php echo $donnees['numero_siret']; ?>">
                    </div>

                <?php
                }
                ?>
                <div class="flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                    <label for="mot_de_passe"></label>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.00033 11.3333C8.73366 11.3333 9.33366 10.7333 9.33366 9.99996C9.33366 9.26663 8.73366 8.66663 8.00033 8.66663C7.26699 8.66663 6.66699 9.26663 6.66699 9.99996C6.66699 10.7333 7.26699 11.3333 8.00033 11.3333ZM12.0003 5.33329H11.3337V3.99996C11.3337 2.15996 9.84033 0.666626 8.00033 0.666626C6.16033 0.666626 4.66699 2.15996 4.66699 3.99996V5.33329H4.00033C3.26699 5.33329 2.66699 5.93329 2.66699 6.66663V13.3333C2.66699 14.0666 3.26699 14.6666 4.00033 14.6666H12.0003C12.7337 14.6666 13.3337 14.0666 13.3337 13.3333V6.66663C13.3337 5.93329 12.7337 5.33329 12.0003 5.33329ZM5.93366 3.99996C5.93366 2.85996 6.86033 1.93329 8.00033 1.93329C9.14033 1.93329 10.067 2.85996 10.067 3.99996V5.33329H5.93366V3.99996ZM12.0003 13.3333H4.00033V6.66663H12.0003V13.3333Z" fill="#334155" />
                    </svg>
                    <input type="password" class="w-full bg-slate-200 ml-2" name="mot_de_passe" placeholder="Nouveau mot de passe" value=""><br>
                </div>
                <input type="submit" name="miseajour" value="Enregistrer les changements" class="btn-inscription flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2 cursor-pointer mb-2">
                <button type="submit" name="miseajour" value="Modifier mes informations" class="flex justify-center bg-rose-200 hover:bg-rose-300 rounded-lg w-full px-3 py-2" onclick="modal('#gestioncompte-form')">Annuler</button>
            </fieldset>
        </form>
    </div>
</div>