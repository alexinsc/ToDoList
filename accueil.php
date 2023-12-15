<?php $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root'); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>To do list interactive</title>
    <link href="accueil.css" type="text/css" rel="stylesheet">
</head>


<h1>To-Do List</h1>
    <button onclick="window.location.href = 'http://localhost/projetWD/projet_WB.php';" class="changement">Ajouter une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/edition_tache.php';" class="changement">Modifier une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/delete_tache.php';" class="changement">Supprimer une tâche</button>




<body>
<div class="container">
    <form action="utilisateur.php" method="post">
      <fieldset>
        <p>
          <option value="">Créer un utilisateur</option>
          <fieldset>
                <p>
                    <label for="titre">Utilisateur :</label>
                    <input type="text" name="uti" required="required" autofocus id="uti" placeholder="Alexandre" />
                    <span id="Nom manquant"></span>
                </p>
          </fieldset>
          <input type="submit" id ="submit" value="Ajouter" />
        </p>
    </form>
  </div>

  <div class="container">
    <form action="utilisateur.php" method="post">
      <fieldset>
        <p>
          <select id="utilisateur-select" name="utilisateur-select">
          <option value="">Sélectionner un utilisateur</option>
          <?php
            $requete = $connexion->prepare("SELECT ID_Uti, Utilisateur FROM utilisateur");
            $requete->execute();
            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
              echo '<option value="' . $ligne['ID_Uti'] . '">' . $ligne['Utilisateur']. '</option>';
            }
          ?>
          </select>
        </p>
        <input type="submit" id ="submit" value="Sélectionner" />
      </fieldset>
    </form>
  </div>

  </body>
</html>


<script>
        function validateForm() {
            var utilisateur = document.getElementById("uti").value.trim();
            if (utilisateur === "") {
                document.getElementById("Nom_manquant").innerText = "Veuillez saisir un nom d'utilisateur.";
                return false;
            }
            return true;
        }
    </script>