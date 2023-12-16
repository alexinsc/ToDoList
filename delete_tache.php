<?php $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root'); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>To do list interactive</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <button onclick="window.location.href = 'http://localhost/projetWD/accueil.php';" class="changement">Ajouter une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/projet_WB.php';" class="changement">Ajouter une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/edition_tache.php';" class="changement">Modifier une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/delete_tache.php';" class="changement">Supprimer une tâche</button>
</head>

<body>
        <!-- Titre de la page -->
        <h1>To-Do List</h1>
        <form method="post" action="delete.php" id="task-form">
            <fieldset>
                <p>
                    <select id="tache-select" name="id_tache"> <!-- Ajout de l'attribut 'name' -->
                        <option value="">Sélectionner une tâche</option>
                        <?php
                        $requete = $connexion->prepare("SELECT ID, Nom, Description FROM taches");
                        $requete->execute();
                        while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $ligne['ID'] . '">' . $ligne['Nom'] . ' : ' . $ligne['Description'] . '</option>';
                        }
                        ?>
                    </select>
                </p>
                <!-- Suppression de la balise <p> en trop -->
            </fieldset>
            <input type="submit" id="submit" value="Supprimer" onclick="return validateForm()" />
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

<script>
    function validateForm() {
        var selectedTask = document.getElementById("tache-select").value;
        if (selectedTask === "") {
            alert("Veuillez sélectionner une tâche");
            return false; // Empêche la soumission du formulaire si aucune tâche n'est sélectionnée
        }
        document.getElementById("id_tache").value = selectedTask; // Place la valeur sélectionnée dans le champ caché
        return true; // Soumet le formulaire si une tâche est sélectionnée
    }
</script>