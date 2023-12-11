<?php
try {
    // Connexion à la base de données MySQL avec PDO
    $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root');

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

// Fermeture de la connexion à la base de données (si nécessaire)
$connexion = null;
?>
