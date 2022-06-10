    <div class=" p-5 bg-white rounded-xl rounded-tl-none">
        <table class="w-full table">
            <thead class="bg-slate-100 text-slate-500">
                <tr class="p-3">
                    <td>ID</td>
                    <td>Prénom / NOM</td>
                    <td>Email</td>
                    <td>Nom de l'organisation</td>
                    <td>SIRET</td>
                    <td class="text-center">Accès au compte</td>
                </tr>
            </thead>

            <?php
            $link = mysqli_connect("localhost", "root", "root", "charlotte");
            $sql = mysqli_query($link, "SELECT * FROM utilisateurs ORDER BY id_utilisateur") or die('Erreur de la requête SQL');
            while ($donnees = mysqli_fetch_array($sql)) {
            ?>

                <tr>
                    <td><?php echo $donnees['id_utilisateur']; ?></td>
                    <td><?php echo $donnees['prenom'] . " " . $donnees['nom']; ?></td>
                    <td><?php echo $donnees['email']; ?></td>
                    <td><?php echo $donnees['nom_organisation']; ?></td>
                    <td><?php echo $donnees['numero_siret']; ?></td>
                    <td class="text-center">

                        <?php
                        if ($donnees['acces'] == 'oui') {
                        ?>
                            <a class="bg-red-400" href="restriction.php?id=<?php echo $donnees['id_utilisateur']; ?>">
                                <div class="flex justify-center items-center">
                                    <div class="w-10 h-5 flex items-center bg-gray-300 rounded-full mx-3 px-1 bg-green-500" @click="handleToggleActive">
                                        <div class="bg-white w-3 h-3 rounded-full shadow-md transform translate-x-5">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php
                        }
                        ?>

                        <?php
                        if ($donnees['acces'] == 'non') {
                        ?>
                            <a href="autorisation.php?id=<?php echo $donnees['id_utilisateur']; ?>">

                                <div class="w-full h-full flex flex-col justify-center items-center">
                                    <div class="flex justify-center items-center">
                                        <div :class="{ 'bg-cyan-700': toggleActive}" class="w-10 h-5 flex items-center bg-rose-500 rounded-full mx-3 px-1" @click="handleToggleActive">
                                            <div class="bg-white w-3 h-3 rounded-full shadow-md transform" :class="{ 'translate-x-7': toggleActive}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>