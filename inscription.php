	<!-- INSCRIPTION -->
	<?php
	//ON VÉRIFIE QUE LE FORMULAIRE A BIEN ÉTÉ ENVOYÉ
	if (isset($_POST['inscription'])) {
		// LA VARIABLE "ERREUR" EST NULL PAR DEFAUT
		$erreur = null;

		// CONVERSION DES CHAMPS DU FORMULAIRE EN VARIABLES
		extract($_POST);

		// VÉRIFICATION DES CHAMPS VIDES
		if (empty($prenom) || empty($nom) || empty($email) || empty($mot_de_passe) || empty($mot_de_passe_confirmation)) {
			$erreur = 'Veuillez remplir tous les champs';
		}

		//COMPARAISON DES MOTS DE PASSE SAISIS
		else if ($mot_de_passe != $mot_de_passe_confirmation) {
			$erreur = 'Les deux mots de passe sont différents';
		}

		// VÉRIFICATION DE L'EXISTANCE DE L'EMAIL
		$sql = mysqli_query($link, "SELECT * FROM utilisateurs WHERE email = '$email'") or die('Erreur de la requête SQL');
		$total = mysqli_num_rows($sql);
		if ($total != 0) {
			// SI LE MAIL EST DÉJÀ UTILISÉ, AFFICHER UN MESSAGE D'ÉRREUR
			$erreur = 'Cette email est déjà utilisé';
		}

		// ATTRIBUTION DES STATUT ET DES ACCÉS AUX COMPTES UTILISATEURS
		if ($erreur == null) {

			if (!empty($_POST['nom_organisation']) && !empty($_POST['numero_siret'])) {
				$statut = 'organisateur';
				$acces = 'non';
			} else {
				// LES CHAMPS SONT VIDES, LEUR ATTRIBUÉ LE STATUT "NORMAL" ET AUTORISER L'ACCÉS
				$statut = 'utilisateur';
				$acces = 'oui';
			}

			$prenom = $_POST['prenom'];
			$nom = $_POST['nom'];
			$email = $_POST['email'];
			$nom_organisation = $_POST['nom_organisation'];
			$numero_siret = $_POST['numero_siret'];
			$mot_de_passe = $_POST['mot_de_passe'];

			// TOUT EST VALIDE
			// CRYPTER LE MOT DE PASSE ET METTRE LES NOMS DE FAMILLE EN MAJUSCULE
			$mot_de_passe = md5($mot_de_passe);
			$nom = strtoupper($nom);
			$sql = mysqli_query($link, "INSERT INTO utilisateurs ( prenom , nom , email , nom_organisation , numero_siret , mot_de_passe, statut, acces) VALUES ('$prenom' , '$nom' , '$email' , '$nom_organisation' , '$numero_siret' , '$mot_de_passe' , '$statut' , '$acces' )") or die('Erreur de la requête SQL');
			if ($sql) {
				// SI L'ACCÉS EST AUTORISÉ
				if ($acces == 'oui') {
					$erreur = 'Votre inscription a bien été prise en compte, vous pouvez désormais vous connecter !';
					header('location:index.php');
				}
				if ($acces == 'non') {
					// SI IL N'EST PAS AUTORISÉ
					$confirmation = 'Votre inscription a bien été prise en compte ! Vous pourrez accéder à votre compte une fois votre inscription validé par l’administration';
					header('location:index.php');
				}
			} else {
				// SI LE FORMULAIRE N'EST PAS VALIDE
				$erreur = 'Une erreur est survenue lors de la création de votre compte';
			}
		}
	}
	?>

	<div id="inscription-form" class=" w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0 flex flex-col justify-center items-center hidden">
		<div class="absolute mx-auto bg-white drop-shadow2-xl p-12 rounded-2xl min-w-fit " style="width:593px">
			<div class="justify-center justify-center">
				<button class="absolute float-left" onclick="modal('#inscription-form')">
					<svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M17.6663 9.77337L16.7263 8.83337L12.9997 12.56L9.27301 8.83337L8.33301 9.77337L12.0597 13.5L8.33301 17.2267L9.27301 18.1667L12.9997 14.44L16.7263 18.1667L17.6663 17.2267L13.9397 13.5L17.6663 9.77337Z" fill="#475569" />
					</svg>
				</button>
				<h2 class="text-3xl font-semibold flex justify-center mb-7">Inscription</h2>
			</div>
			<form method="POST" action="" class="max-w-fit">
				<fieldset class="min-w-fit">
					<p class="text-sm text-slate-500 whitespace-pre-line text-center mb-7">Vous inscrire vous en tant que particulier vous permet de retrouver tout vos évènements favoris dans un seule endroit !
						Pour les organisations, une fois le formulaire validé, vous pourrez ajouter des évènements, les modifier et les supprimer à votre guise.
					</p>

					<h3 class="font-semibold mb-2">Statut</h3>
					<div class="flex gap-2 mb-5">
						<input id="btn-particulier" type="button" class="cursor-pointer flex justify-center bg-blue-600 rounded-lg w-full px-3 py-2 text-white" value="Particulier" onclick="statut('btn-particulier')">
						<input id="btn-organisation" type="button" class="cursor-pointer flex justify-center bg-slate-300 hover:bg-slate-400 rounded-lg w-full px-3 py-2" value="Organisation" onclick="statut('btn-organisation')">
					</div>
					<h3 class=" font-semibold mb-2">Vos informations</h3>
					<div class=" flex gap-2">
						<div class="w-6/12 flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
							<label for="prenom"></label>
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M8.00033 7.99996C9.47366 7.99996 10.667 6.80663 10.667 5.33329C10.667 3.85996 9.47366 2.66663 8.00033 2.66663C6.52699 2.66663 5.33366 3.85996 5.33366 5.33329C5.33366 6.80663 6.52699 7.99996 8.00033 7.99996ZM8.00033 9.33329C6.22033 9.33329 2.66699 10.2266 2.66699 12V13.3333H13.3337V12C13.3337 10.2266 9.78032 9.33329 8.00033 9.33329Z" fill="#334155" />
							</svg>
							<input type="text" class="w-full bg-slate-200 ml-2" name="prenom" placeholder="Prénom">
						</div>

						<div class="w-6/12 flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
							<label for="nom"></label>
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M8.00033 7.99996C9.47366 7.99996 10.667 6.80663 10.667 5.33329C10.667 3.85996 9.47366 2.66663 8.00033 2.66663C6.52699 2.66663 5.33366 3.85996 5.33366 5.33329C5.33366 6.80663 6.52699 7.99996 8.00033 7.99996ZM8.00033 9.33329C6.22033 9.33329 2.66699 10.2266 2.66699 12V13.3333H13.3337V12C13.3337 10.2266 9.78032 9.33329 8.00033 9.33329Z" fill="#334155" />
							</svg>
							<input type="text" class="w-full bg-slate-200 ml-2" name="nom" placeholder="Nom">
						</div>
					</div>

					<div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
						<label for="email"></label>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.333 2.66663H2.66634C1.93301 2.66663 1.33967 3.26663 1.33967 3.99996L1.33301 12C1.33301 12.7333 1.93301 13.3333 2.66634 13.3333H13.333C14.0663 13.3333 14.6663 12.7333 14.6663 12V3.99996C14.6663 3.26663 14.0663 2.66663 13.333 2.66663ZM13.333 5.33329L7.99967 8.66663L2.66634 5.33329V3.99996L7.99967 7.33329L13.333 3.99996V5.33329Z" fill="#334155" />
						</svg>
						<input type="text" class="w-full bg-slate-200 ml-2" name="email" placeholder="Email">
					</div>

					<div id="particulier-input" class="hidden w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
						<label for="nom_organisation"></label>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.99967 4.66667V2H1.33301V14H14.6663V4.66667H7.99967ZM6.66634 12.6667H2.66634V11.3333H6.66634V12.6667ZM6.66634 10H2.66634V8.66667H6.66634V10ZM6.66634 7.33333H2.66634V6H6.66634V7.33333ZM6.66634 4.66667H2.66634V3.33333H6.66634V4.66667ZM13.333 12.6667H7.99967V6H13.333V12.6667ZM11.9997 7.33333H9.33301V8.66667H11.9997V7.33333ZM11.9997 10H9.33301V11.3333H11.9997V10Z" fill="#334155" />
						</svg>
						<input type="text" class="w-full bg-slate-200 ml-2" name="nom_organisation" placeholder="Nom de l'organisation / Entreprise">
					</div>

					<div id="organisation-input" class="hidden w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
						<label for="numero_siret"></label>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.99967 4.66667V2H1.33301V14H14.6663V4.66667H7.99967ZM6.66634 12.6667H2.66634V11.3333H6.66634V12.6667ZM6.66634 10H2.66634V8.66667H6.66634V10ZM6.66634 7.33333H2.66634V6H6.66634V7.33333ZM6.66634 4.66667H2.66634V3.33333H6.66634V4.66667ZM13.333 12.6667H7.99967V6H13.333V12.6667ZM11.9997 7.33333H9.33301V8.66667H11.9997V7.33333ZM11.9997 10H9.33301V11.3333H11.9997V10Z" fill="#334155" />
						</svg>
						<input type="text" class="w-full bg-slate-200 ml-2" name="numero_siret" placeholder="SIRET">
					</div>

					<div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
						<label for="mot_de_passe"></label>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.00033 6.66675C3.26699 6.66675 2.66699 7.26675 2.66699 8.00008C2.66699 8.73341 3.26699 9.33341 4.00033 9.33341C4.73366 9.33341 5.33366 8.73341 5.33366 8.00008C5.33366 7.26675 4.73366 6.66675 4.00033 6.66675ZM12.0003 6.66675C11.267 6.66675 10.667 7.26675 10.667 8.00008C10.667 8.73341 11.267 9.33341 12.0003 9.33341C12.7337 9.33341 13.3337 8.73341 13.3337 8.00008C13.3337 7.26675 12.7337 6.66675 12.0003 6.66675ZM8.00033 6.66675C7.26699 6.66675 6.66699 7.26675 6.66699 8.00008C6.66699 8.73341 7.26699 9.33341 8.00033 9.33341C8.73366 9.33341 9.33366 8.73341 9.33366 8.00008C9.33366 7.26675 8.73366 6.66675 8.00033 6.66675Z" fill="#334155" />
						</svg>
						<input type="password" class="w-full bg-slate-200 ml-2" name="mot_de_passe" placeholder="Mot de passe">
					</div>

					<div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
						<label for="mot_de_passe_confirmation"></label>
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M4.00033 6.66675C3.26699 6.66675 2.66699 7.26675 2.66699 8.00008C2.66699 8.73341 3.26699 9.33341 4.00033 9.33341C4.73366 9.33341 5.33366 8.73341 5.33366 8.00008C5.33366 7.26675 4.73366 6.66675 4.00033 6.66675ZM12.0003 6.66675C11.267 6.66675 10.667 7.26675 10.667 8.00008C10.667 8.73341 11.267 9.33341 12.0003 9.33341C12.7337 9.33341 13.3337 8.73341 13.3337 8.00008C13.3337 7.26675 12.7337 6.66675 12.0003 6.66675ZM8.00033 6.66675C7.26699 6.66675 6.66699 7.26675 6.66699 8.00008C6.66699 8.73341 7.26699 9.33341 8.00033 9.33341C8.73366 9.33341 9.33366 8.73341 9.33366 8.00008C9.33366 7.26675 8.73366 6.66675 8.00033 6.66675Z" fill="#334155" />
						</svg>
						<input type="password" class="w-full bg-slate-200 ml-2" name="mot_de_passe_confirmation" placeholder="Confirmation du mot de passe">
					</div>

					<input type="submit" name="inscription" value="Inscription" class="cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">
				</fieldset>
			</form>
		</div>
	</div>