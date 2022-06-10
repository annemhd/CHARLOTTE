<header class="container xl mx-auto flex flex-row justify-between mt-5">
    <div class="flex items-center">
        <a href="index.php">
            <img src="logo.svg" alt="logo">
        </a>
        <a href="" class="ml-7 p-1.5 hover:text-blue-700">À propos</a>
        <div class="p-1.5 hover:text-blue-700 cursor-pointer" onclick="modal('#contact-form')">Contact</div>
    </div>

    <div class="flex items-center">
        <form method="GET" action="" class="flex flex-row m-0">
            <div class="flex items-center bg-white rounded-lg px-3 py-1.5">
                <label for="recherche"></label>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.3333 9.33333H9.80667L9.62 9.15333C10.2733 8.39333 10.6667 7.40667 10.6667 6.33333C10.6667 3.94 8.72667 2 6.33333 2C3.94 2 2 3.94 2 6.33333C2 8.72667 3.94 10.6667 6.33333 10.6667C7.40667 10.6667 8.39333 10.2733 9.15333 9.62L9.33333 9.80667V10.3333L12.6667 13.66L13.66 12.6667L10.3333 9.33333V9.33333ZM6.33333 9.33333C4.67333 9.33333 3.33333 7.99333 3.33333 6.33333C3.33333 4.67333 4.67333 3.33333 6.33333 3.33333C7.99333 3.33333 9.33333 4.67333 9.33333 6.33333C9.33333 7.99333 7.99333 9.33333 6.33333 9.33333Z" fill="#334155" />
                </svg>
                <input type="text" name="recherche" class="bg-white ml-3" placeholder="Recherche">
            </div>

            <button class="flex items-center bg-blue-600 hover:bg-blue-700 rounded-lg p-1.5 ml-2" name="recherche">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 14H14.71L14.43 13.73C15.41 12.59 16 11.11 16 9.5C16 5.91 13.09 3 9.5 3C5.91 3 3 5.91 3 9.5C3 13.09 5.91 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="white" />
                </svg>
            </button>
        </form>

        <?php
        if (isset($_SESSION['email'])) {
            if ($_SESSION['statut'] == 'administrateur') {
        ?>
                <a href="tableaudebord.php" class="btn-gestion flex items-center bg-blue-600  hover:bg-blue-700 rounded-lg p-1.5 ml-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="white" />
                        <path d="M9 12H7V17H9V12Z" fill="white" />
                        <path d="M17 7H15V17H17V7Z" fill="white" />
                        <path d="M13 14H11V17H13V14Z" fill="white" />
                        <path d="M13 10H11V12H13V10Z" fill="white" />
                    </svg>
                </a>

            <?php
            } else if ($_SESSION['statut'] == 'organisateur') {
            ?>

                <button class="flex items-center bg-blue-600  hover:bg-blue-700 rounded-lg p-1.5 ml-2" onclick="modal('#ajoutevent-form')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 13H13V19H11V13H5V11H11V5H13V11H19V13Z" fill="white" />
                    </svg>
                </button>

        <?php

            } else {
                echo 'MES FAVORIS<BR>';
            }
        }
        ?>

        <div class="relative">
            <button class="dropbtn flex items-center bg-blue-600 hover:bg-blue-700 rounded-lg p-1.5 ml-2" onclick="dropdown('#identification-dropdown')">
                <svg class="relative" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6C13.1 6 14 6.9 14 8C14 9.1 13.1 10 12 10C10.9 10 10 9.1 10 8C10 6.9 10.9 6 12 6ZM12 16C14.7 16 17.8 17.29 18 18H6C6.23 17.28 9.31 16 12 16ZM12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z" fill="white" />
                </svg>
            </button>

            <div id="identification-dropdown" class="bg-white drop-shadow-xl px-6 py-7 rounded-2xl max-w-fit absolute right-0 mt-3 hidden" style="min-width:288px;">
                <?php
                if (!isset($_SESSION['email'])) {
                    include('connexion.php');
                }

                if (isset($_SESSION['email'])) {
                ?>
                    <h3 class="text-xl font-semibold text-center mb-3">Bonjour, <?php echo $_SESSION['prenom']; ?></h3>

                    <?php
                    if ($_SESSION['statut'] == 'administrateur') {
                    ?>

                        <a href="tableaudebord.php" class=" flex justify-center items-center  text-slate-900 bg-slate-300 hover:bg-slate-400 rounded-lg w-full px-3 py-2 mb-2">
                            <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.6667 2H3.33333C2.6 2 2 2.6 2 3.33333V12.6667C2 13.4 2.6 14 3.33333 14H12.6667C13.4 14 14 13.4 14 12.6667V3.33333C14 2.6 13.4 2 12.6667 2ZM12.6667 12.6667H3.33333V3.33333H12.6667V12.6667Z" fill="#475569" />
                                <path d="M6.00033 8H4.66699V11.3333H6.00033V8Z" fill="#475569" />
                                <path d="M11.3333 4.66663H10V11.3333H11.3333V4.66663Z" fill="#475569" />
                                <path d="M8.66634 9.33337H7.33301V11.3334H8.66634V9.33337Z" fill="#475569" />
                                <path d="M8.66634 6.66663H7.33301V7.99996H8.66634V6.66663Z" fill="#475569" />
                            </svg>
                            Tableau de bord
                        </a>

                    <?php }

                    if ($_SESSION['statut'] == 'organisateur') {
                    ?>

                        <a href="tableaudebord.php" class="flex justify-center items-center  text-slate-900 bg-slate-300 hover:bg-slate-400 rounded-lg w-full px-3 py-2 mb-2">
                            <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.333 1.99996H12.6663V0.666626H11.333V1.99996H4.66634V0.666626H3.33301V1.99996H2.66634C1.93301 1.99996 1.33301 2.59996 1.33301 3.33329V14C1.33301 14.7333 1.93301 15.3333 2.66634 15.3333H13.333C14.0663 15.3333 14.6663 14.7333 14.6663 14V3.33329C14.6663 2.59996 14.0663 1.99996 13.333 1.99996ZM13.333 14H2.66634V5.33329H13.333V14Z" fill="#475569" />
                            </svg>

                            Mes évènements
                        </a>

                    <?php }

                    if ($_SESSION['statut'] == 'utilisateur') { ?>
                        <a href="tableaudebord.php" class="flex justify-center items-center  text-slate-900 bg-slate-300 hover:bg-slate-400 rounded-lg w-full px-3 py-2 mb-2">
                            <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.99967 14.2333L7.03301 13.3533C3.59967 10.24 1.33301 8.18667 1.33301 5.66667C1.33301 3.61333 2.94634 2 4.99967 2C6.15967 2 7.27301 2.54 7.99967 3.39333C8.72634 2.54 9.83967 2 10.9997 2C13.053 2 14.6663 3.61333 14.6663 5.66667C14.6663 8.18667 12.3997 10.24 8.96634 13.36L7.99967 14.2333Z" fill="#475569" />
                            </svg>

                            Mes favoris
                        </a>
                    <?php } ?>


                    <button class="flex justify-center items-center text-slate-900 bg-slate-300 hover:bg-slate-400 rounded-lg w-full px-3 py-2 mb-2" onclick="modal('#gestioncompte-form')">
                        <svg class="mr-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.00033 7.99996C9.47366 7.99996 10.667 6.80663 10.667 5.33329C10.667 3.85996 9.47366 2.66663 8.00033 2.66663C6.52699 2.66663 5.33366 3.85996 5.33366 5.33329C5.33366 6.80663 6.52699 7.99996 8.00033 7.99996ZM8.00033 9.33329C6.22033 9.33329 2.66699 10.2266 2.66699 12V13.3333H13.3337V12C13.3337 10.2266 9.78033 9.33329 8.00033 9.33329Z" fill="#475569" />
                        </svg>

                        Gerer mon compte</button>

                    <a href="deconnexion.php" class="flex justify-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg w-full px-3 py-2">Déconnexion</a>

                <?php } else {
                    echo '';
                } ?>

            </div>
        </div>

    </div>
</header>