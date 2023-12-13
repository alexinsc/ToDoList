<?php $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>To do list interactive</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <button onclick="window.location.href = 'http://localhost/projetWD/projet_WB.html';" class="changement">Ajouter une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/edition_tache.html';" class="changement">Modifier une tâche</button>
    <button onclick="window.location.href = 'https://fr.w3docs.com/';" class="changement">Supprimer une tâche</button>
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
                        <option value="en_cours">En cours</option>
                        <option value="a_faire">A faire</option>
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
                        <td><?php echo $ligne['Etat']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  
        
            <!-- Liste de tâches terminées -->
            <div>
                <h2>Tâches en cours</h2>
                <?php
                    try {
                        $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'en_cours'");
                        $requete->execute();

                        // Vérification s'il y a des résultats
                        if ($requete->rowCount() > 0) {
                            // Affichage des données dans un tableau HTML
                            echo "<table border='1'>
                            <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Etat</th>
                            </tr>";

                            // Boucle pour parcourir les résultats de la requête
                            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $ligne['Nom'] . "</td>";
                                echo "<td>" . $ligne['Description'] . "</td>";
                                echo "<td>" . $ligne['Etat'] . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "Aucun résultat trouvé.";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                ?>
            </div>  

            <div>
                <h2>Tâches terminées</h2>
                <?php
                    try {
                        // Préparation de la requête SQL
                        $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'Terminé'");
                        $requete->execute();

                        // Vérification s'il y a des résultats
                        if ($requete->rowCount() > 0) {
                            // Affichage des données dans un tableau HTML
                            echo "<table border='1'>
                            <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Etat</th>
                            </tr>";

                            // Boucle pour parcourir les résultats de la requête
                            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $ligne['Nom'] . "</td>";
                                echo "<td>" . $ligne['Description'] . "</td>";
                                echo "<td>" . $ligne['Etat'] . "</td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "Aucun résultat trouvé.";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                ?>
            </div>  
        </div>
</body>
</html>