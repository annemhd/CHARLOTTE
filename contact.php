	<!-- CONTACT -->
	<?php
    //ON VÉRIFIE QUE LE FORMULAIRE A BIEN ÉTÉ ENVOYÉ
    if (isset($_POST['envoyer'])) {

        // LA VARIABLE "ERREUR" EST NULL PAR DEFAUT
        $erreur_contact = null;

        //CONVERSION DES CHAMPS DU FORMULAIRE EN VARIABLES
        extract($_POST);

        // VÉRIFICATION DES CHAMPS VIDES
        if (empty($prenom) || empty($nom) || empty($email) || empty($message)) {
            $erreur_contact = 'Veuillez remplir tous les champs';
        } else {
            // This is the CORRECT way to determine success
            if (ini_set('display_errors', '1') === false)
                throw new \Exception('Unable to set display_errors.');
            $destinataire = 'annecatherine.michaud@gmail.com';
            // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
            // POUR $expediteur, $copie, $destinataire, SÉPARER PAR UNE VIRGULE SI IL Y A PLUSIEURS ADRESSES
            $expediteur = 'annecatherine.michaud@gmail.com';
            $copie = '';
            $copie_cachee = '';
            $objet = 'Charlotte test'; // OBJET DU MESSAGE
            $headers  = 'MIME-Version: 1.0' . "\n"; // VERSION MIME
            $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // EN-TÊTE CONTENT-TYPE POUR LE FORMAT HTML
            $headers .= 'Reply-To: ' . $expediteur . "\n"; // MAIL DE RÉPONSE
            $headers .= 'From: "' . $prenom . ' ' . $nom . '"<' . $expediteur . '>' . "\n"; // EXPÉDITEUR
            $headers .= 'Delivered-to: ' . $destinataire . "\n"; // DESTINATAIRE
            $headers .= 'Cc: ' . $copie . "\n"; // COPIE Cc
            $headers .= 'Bcc: ' . $copie_cachee . "\n\n"; // COPIE CACHÉE Bcc        
            $message = '<div style="width: 100%; text-align: center; font-weight: bold">' . $message . '</div>';
            if (mail($destinataire, $objet, $message, $headers)) // ENVOI DU MESSAGE
            {
                // MESSAGE ENVOYÉ
                $erreur_contact = 'Votre message a bien été envoyé ';
            } else {
                // MESSAGE NON ENVOYÉ
                $erreur_contact = "Votre message n'a pas pu être envoyé";
            }
        }
    }
    ?>
	<div id="contact-form" class=" w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0 flex flex-col justify-center items-center hidden">
	    <div class="absolute mx-auto bg-white drop-shadow-xl p-12 rounded-2xl min-w-fit" style="width:496px">
	        <form method="POST" action="" class="max-w-fit">
	            <fieldset class="min-w-fit">
	                <div class="justify-center justify-center">
	                    <button class="close absolute float-left"><svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
	                            <path d="M17.6663 9.77337L16.7263 8.83337L12.9997 12.56L9.27301 8.83337L8.33301 9.77337L12.0597 13.5L8.33301 17.2267L9.27301 18.1667L12.9997 14.44L16.7263 18.1667L17.6663 17.2267L13.9397 13.5L17.6663 9.77337Z" fill="#475569" />
	                        </svg>
	                    </button>
	                    <h2 class="text-3xl font-semibold flex justify-center mb-7">Contact</h2>
	                </div>

	                <p class="text-sm text-slate-500 whitespace-pre-line text-center mb-7">Une question ? Pour cela, il vous suffit de remplir le formulaire ci-dessous. L’équipe de Charlotte se fera un plaisir de vous répondre dans les plus bref délais !
	                </p>

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

	                <div id="particulier-input" class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
	                    <label for="nom_organisation"></label>
	                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path d="M7.99967 4.66667V2H1.33301V14H14.6663V4.66667H7.99967ZM6.66634 12.6667H2.66634V11.3333H6.66634V12.6667ZM6.66634 10H2.66634V8.66667H6.66634V10ZM6.66634 7.33333H2.66634V6H6.66634V7.33333ZM6.66634 4.66667H2.66634V3.33333H6.66634V4.66667ZM13.333 12.6667H7.99967V6H13.333V12.6667ZM11.9997 7.33333H9.33301V8.66667H11.9997V7.33333ZM11.9997 10H9.33301V11.3333H11.9997V10Z" fill="#334155" />
	                    </svg>
	                    <input type="text" class="w-full bg-slate-200 ml-2" name="nom_organisation" placeholder="Nom de l'organisation / Entreprise (facultatif)">
	                </div>

	                <label for="message"></label>
	                <div class="w-full flex items-center bg-slate-200 rounded-lg px-3 py-1.5 mb-2">
	                    <textarea class="message w-full h-40 bg-slate-200 p-2" name="message" placeholder="Écrivez votre message ici" style="resize: none;"></textarea>
	                </div>

	                <input type="submit" name="envoyer" value="Envoyer" class="cursor-pointer flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">
	            </fieldset>
	        </form>
	    </div>
	</div>