<?php $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>To do list interactive</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <button onclick="window.location.href = 'http://localhost/projetWD/accueil.php';" class="changement">Acceuil</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/projet_WB.php?valeur_transmise=<?php echo $idUtilisateur?>';" class="changement">Ajouter une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/edition_tache.php?valeur_transmise=<?php echo $idUtilisateur?>';" class="changement">Modifier une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/delete_tache.php?valeur_transmise=<?php echo $idUtilisateur?>';" class="changement">Supprimer une tâche</button>
</head>

<body>
        <!-- Titre de la page -->
        <h1>To-Do List</h1>
        <form method="post" action="creation.php" id="task-form">
            <fieldset>
                <p>
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" required="required" autofocus id="titre" placeholder="Tâche 1" />
                    <span id="Titre manquant"></span>
                </p>
                <p>
                    <label for="description">Description :</label>
                    <input type="text" name="description" required="required" id="description" placeholder="Description de la tâche" />
                    <span id="description_manquante"></span>
                </p>
                <p>
                    <label for="etat">Etat :</label>
                    <select name="etat" id="etat">
                        <option value="a_faire">A faire</option>
                        <option value="en_cours">En cours</option>
                        <option value="termine">Terminé</option>
                    </select>
                </p>
            </fieldset>
            <input type="submit" id ="submit" value="Créer" />
        </form>

        <div class="tasks-container">
            <!-- Liste de tâches en cours -->
            <div>
                <h2>Tâches à faire</h2>
                <?php $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'a_faire'");
                        $requete->execute(); ?>
                <table border="1">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Etat</th>
                    </tr>
                    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $ligne['Nom']; ?></td>
                        <td><?php echo $ligne['Description']; ?></td>
                        <td><?php echo "A faire"; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  
        
            <!-- Liste de tâches en cours -->
            <div>
                <h2>Tâches en cours</h2>
                <?php $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'en_cours'");
                        $requete->execute(); ?>
                <table border="1">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Etat</th>
                    </tr>
                    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $ligne['Nom']; ?></td>
                        <td><?php echo $ligne['Description']; ?></td>
                        <td><?php echo "En cours"; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  

            <div>
                <h2>Tâches terminées</h2>
                <?php $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'termine'");
                        $requete->execute(); ?>
                <table border="1">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Etat</th>
                    </tr>
                    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $ligne['Nom']; ?></td>
                        <td><?php echo $ligne['Description']; ?></td>
                        <td><?php echo "Terminée"; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  
        </div>
</body>
</html>