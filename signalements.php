       <div class="p-5 bg-white rounded-xl rounded-tl-none">
           <table class="w-full table bg-white">
               <?php
                $link = mysqli_connect("localhost", "root", "root", "charlotte");
                $sql = mysqli_query($link, "SELECT * FROM evenements WHERE signalement =  'oui'") or die('Erreur de la requête SQL');
                $total = mysqli_num_rows($sql);
                if ($total == 0) {

                    $err = 'Pas de signalements';
                }
                while ($donnees = mysqli_fetch_array($sql)) {
                ?>

                   <h2><?php echo $donnees['titre_evenement']; ?></h2>
                   <p><?php echo $donnees['date']; ?></p>
                   <?php echo "<a href='https://maps.google.com/maps?q=" . $donnees['adresse'] . "+" . $donnees['ville'] . "+" . $donnees['code_postal'] . "' target='_blank'>";
                    echo $donnees['adresse'] . "<br>" . $donnees['ville'] . " - " . $donnees['code_postal'];
                    echo "</a>"; ?>

                   <p><?php echo $donnees['description']; ?></p>
                   <hr>

               <?php
                }

                ?> <div class="text-center text-xl p-7 text-slate-600">
                   <?php
                    echo $err;
                    ?>
               </div>
           </table>
       </div>