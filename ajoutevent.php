<?php

if (isset($_POST['creer'])) {
    //la variable erreur vaut null par défaut
    $erreur = null;

    //on convertit chaque champ en variable avec la fonction extract()
    extract($_POST);

    //on verifie les champs vides
    if (empty($titre_evenement) || empty($date_debut) || empty($date_fin) || empty($type_evenement) || empty($adresse) || empty($code_postal) || empty($ville)) {
        $erreur = 'Veuillez remplir tous les champs';
    }

    if ($erreur == null) {
        //tout est OK on fait la création de l'évènement
        //     //on le redirige sur la page d'accueil
        //     // header('location:index.php');
    }
}

if (!empty($_FILES['uploaded_file'])) {
    $path = "uploads/";
    $path = $path . basename($_FILES['uploaded_file']['name']);

    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
        echo "The file " .  basename($_FILES['uploaded_file']['name']) .
            " has been uploaded";
    } else {
        echo "There was an error uploading the file, please try again!";
    }
}
?>

<div id="ajoutevent-form" class="w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0 flex flex-col justify-center items-center hidden overflow-auto">
    <div class="absolute mx-auto bg-white drop-shadow2-xl py-8 px-12 rounded-2xl" style="width:844px">
        <div class="justify-center justify-center">
            <button class="close absolute float-left" onclick="dropdown('#ajoutevent-form')">
                <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.6663 9.77337L16.7263 8.83337L12.9997 12.56L9.27301 8.83337L8.33301 9.77337L12.0597 13.5L8.33301 17.2267L9.27301 18.1667L12.9997 14.44L16.7263 18.1667L17.6663 17.2267L13.9397 13.5L17.6663 9.77337Z" fill="#475569"></path>
                </svg>
            </button>
            <h2 class="text-3xl font-semibold flex justify-center mb-7">Créer un évènement</h2>
        </div>

        <form method="POST" action="refresh.php" class="m-0" enctype="multipart/form-data">
            <fieldset>
                <div class="flex gap-12">

                    <!-- UPLOAD -->
                    <img class="mr-3 flex-none" style="display: block; height: 244px; width: 244px;background:grey;">
                    <input type="file" name="uploaded_file" />

                    <div>
                        <h3 class="text-lg font-bold mb-2">Informations générales</h3>
                        <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                            <label for="titre_evenement"></label>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.7533 3.89301C11.5133 3.55301 11.1133 3.33301 10.6667 3.33301L3.33333 3.33967C2.6 3.33967 2 3.93301 2 4.66634V11.333C2 12.0663 2.6 12.6597 3.33333 12.6597L10.6667 12.6663C11.1133 12.6663 11.5133 12.4463 11.7533 12.1063L14.6667 7.99967L11.7533 3.89301ZM10.6667 11.333H3.33333V4.66634H10.6667L13.0333 7.99967L10.6667 11.333Z" fill="#334155" />
                            </svg>
                            <input type="text" name="titre_evenement" placeholder="Titre de l'évènement" class="w-full ml-2 bg-slate-200 "><br>
                        </div>
                        <input type="hidden" name="id_organisateur" value="<?php echo $_SESSION['id_utilisateur']; ?>">

                        <?php include('datepicker.php'); ?>

                        <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                            <label for="type_evenement"></label>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.7533 3.8935C11.5133 3.5535 11.1133 3.3335 10.6667 3.3335L3.33333 3.34016C2.6 3.34016 2 3.9335 2 4.66683V11.3335C2 12.0668 2.6 12.6602 3.33333 12.6602L10.6667 12.6668C11.1133 12.6668 11.5133 12.4468 11.7533 12.1068L14.6667 8.00016L11.7533 3.8935Z" fill="#334155" />
                            </svg>

                            <select name="type_evenement" class="bg-slate-200 ml-2 w-full">
                                <?php include('type.php'); ?>
                            </select>
                        </div>

                        <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                            <label for="adresse"></label>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 1.3335C5.42 1.3335 3.33333 3.42016 3.33333 6.00016C3.33333 9.50016 8 14.6668 8 14.6668C8 14.6668 12.6667 9.50016 12.6667 6.00016C12.6667 3.42016 10.58 1.3335 8 1.3335ZM8 7.66683C7.08 7.66683 6.33333 6.92016 6.33333 6.00016C6.33333 5.08016 7.08 4.3335 8 4.3335C8.92 4.3335 9.66666 5.08016 9.66666 6.00016C9.66666 6.92016 8.92 7.66683 8 7.66683Z" fill="#334155" />
                            </svg>
                            <input type="text" name="adresse" class="bg-slate-200 ml-2 w-full" placeholder="Adresse"><br>
                        </div>


                        <div class="flex gap-2">
                            <div class="flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                                <label for="code_postal"></label>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 1.3335C5.42 1.3335 3.33333 3.42016 3.33333 6.00016C3.33333 9.50016 8 14.6668 8 14.6668C8 14.6668 12.6667 9.50016 12.6667 6.00016C12.6667 3.42016 10.58 1.3335 8 1.3335ZM8 7.66683C7.08 7.66683 6.33333 6.92016 6.33333 6.00016C6.33333 5.08016 7.08 4.3335 8 4.3335C8.92 4.3335 9.66666 5.08016 9.66666 6.00016C9.66666 6.92016 8.92 7.66683 8 7.66683Z" fill="#334155" />
                                </svg>
                                <input name="code_postal" list="code_postal" id="choix_postal" onkeypress="CodePostal()" class="bg-slate-200 ml-2 w-full" placeholder="Code postal" />
                                <?php include('codespostaux.php'); ?>
                            </div>

                            <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                                <label for="ville"></label>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 1.3335C5.42 1.3335 3.33333 3.42016 3.33333 6.00016C3.33333 9.50016 8 14.6668 8 14.6668C8 14.6668 12.6667 9.50016 12.6667 6.00016C12.6667 3.42016 10.58 1.3335 8 1.3335ZM8 7.66683C7.08 7.66683 6.33333 6.92016 6.33333 6.00016C6.33333 5.08016 7.08 4.3335 8 4.3335C8.92 4.3335 9.66666 5.08016 9.66666 6.00016C9.66666 6.92016 8.92 7.66683 8 7.66683Z" fill="#334155" />
                                </svg>
                                <input name="ville" list="ville" id="choix_ville" onkeypress="Ville()" placeholder="Ville" class="bg-slate-200 ml-2 w-full" />
                                <?php include('villes.php'); ?>
                            </div>
                        </div>


                    </div>
                </div>
                <h3 class="text-lg font-bold mb-2 mt-7">Description</h3>
                <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
                    <label for="description"></label>
                    <textarea name="description" class="message w-full h-44 bg-slate-200 p-2" placeholder="Écrivez votre description ici" style="resize: none;"></textarea>
                </div>
            </fieldset>



            <hr class="my-7">

            <div class="flex w-full justify-end">
                <div class="flex gap-2">
                    <button name="annulercreation" class="cursor-pointer flex justify-center text-slate-600 bg-slate-300 hover:bg-slate-400 rounded-lg w-full px-3 py-2">Annuler</button>
                    <input type="submit" name="creer" value="Créer mon évènement" class="cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">
                </div>
            </div>


            </fieldset>
        </form>
    </div>
</div>