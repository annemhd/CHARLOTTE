	<?php
    //ON VÉRIFIE QUE LE FORMULAIRE A BIEN ÉTÉ ENVOYÉ
    if (isset($_POST['connexion'])) {

        // LA VARIABLE "ERREUR" EST NULL PAR DEFAUT
        $erreur = null;

        //CONVERSION DES CHAMPS DU FORMULAIRE EN VARIABLES
        extract($_POST);

        // VÉRIFICATION DES CHAMPS VIDES
        if (empty($email) || empty($mot_de_passe)) {
            $erreur = 'Veuillez remplir tous les champs';
        }

        // VÉRIFICATION DE L'EXISTANCE DE L'EMAIL
        $sql = mysqli_query($link, "SELECT * FROM utilisateurs WHERE email = '$email'") or die('Erreur de la requête SQL');
        $total = mysqli_num_rows($sql);
        if ($total != 1) {
            // IL N'EXISTE PAS, AFFICHER UN MESSAGE D'ERREUR
            $erreur = 'L\'identifiant est incorrect ou n\'existe pas';
        } else {
            // VÉRIFICATION DU MOT DE PASSE
            $mot_de_passe = md5($mot_de_passe);
            // #1 : RÉCUPÉRATION DES DONNÉES
            $resultat = mysqli_fetch_array($sql);

            // #2 : COMPARAISON DU MOT DE PASSE SAISI AVEC LE MOT DE PASSE DE LA BASE DE DONNÉES
            if ($resultat['mot_de_passe'] !== $mot_de_passe) {
                // MOT DE PASSE INCORRECT
                $erreur = 'Votre mot de passe est incorrect';
            } else {
                // TOUT EST VALIDE
                // ON ENREGISTRE LES DONNÉES EN SESSION
                $_SESSION['id_utilisateur'] = $resultat['id_utilisateur'];
                $_SESSION['email'] = $resultat['email'];
                $_SESSION['statut'] = $resultat['statut'];
                $_SESSION['prenom'] = $resultat['prenom'];
                $_SESSION['nom'] = $resultat['nom'];
                $_SESSION['nom_organisation'] = $resultat['nom_organisation'];
                $_SESSION['numero_siret'] = $resultat['numero_siret'];
                $_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];
                // REDIRECTION VERS L'ESPACE MEMBRE
                header('Location:tableaudebord.php');
            }
        }
    }
    ?>

	<form method="POST" action="" class="m-0">
	    <fieldset class="">
	        <h2 class="text-xl font-semibold text-center mb-3">S'identifier</h2>

	        <div class="flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
	            <label for="email"></label>
	            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                <path d="M8.00033 7.99996C9.47366 7.99996 10.667 6.80663 10.667 5.33329C10.667 3.85996 9.47366 2.66663 8.00033 2.66663C6.52699 2.66663 5.33366 3.85996 5.33366 5.33329C5.33366 6.80663 6.52699 7.99996 8.00033 7.99996ZM8.00033 9.33329C6.22033 9.33329 2.66699 10.2266 2.66699 12V13.3333H13.3337V12C13.3337 10.2266 9.78033 9.33329 8.00033 9.33329Z" fill="#334155" />
	            </svg>
	            <input type="email" name="email" class="bg-slate-200 ml-2" placeholder="Email">
	        </div>

	        <div class="flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
	            <label for="mot_de_passe"></label>
	            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                <path d="M8.00033 11.3333C8.73366 11.3333 9.33366 10.7333 9.33366 9.99996C9.33366 9.26663 8.73366 8.66663 8.00033 8.66663C7.26699 8.66663 6.66699 9.26663 6.66699 9.99996C6.66699 10.7333 7.26699 11.3333 8.00033 11.3333ZM12.0003 5.33329H11.3337V3.99996C11.3337 2.15996 9.84033 0.666626 8.00033 0.666626C6.16033 0.666626 4.66699 2.15996 4.66699 3.99996V5.33329H4.00033C3.26699 5.33329 2.66699 5.93329 2.66699 6.66663V13.3333C2.66699 14.0666 3.26699 14.6666 4.00033 14.6666H12.0003C12.7337 14.6666 13.3337 14.0666 13.3337 13.3333V6.66663C13.3337 5.93329 12.7337 5.33329 12.0003 5.33329ZM5.93366 3.99996C5.93366 2.85996 6.86033 1.93329 8.00033 1.93329C9.14033 1.93329 10.067 2.85996 10.067 3.99996V5.33329H5.93366V3.99996ZM12.0003 13.3333H4.00033V6.66663H12.0003V13.3333Z" fill="#334155" />
	            </svg>
	            <input type="password" class="bg-slate-200 ml-2" name="mot_de_passe" placeholder="Mot de passe">
	        </div>
	        <a href="#" class="text-center flex justify-center mb-2">Mot de passe oublié ?</a>

	        <input type="submit" name="connexion" value="Se connecter" class="cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">
	    </fieldset>

	    <hr class="my-4">

	</form>

	<button class="btn-test flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2" onclick="modal('#inscription-form')">S'inscrire</button>