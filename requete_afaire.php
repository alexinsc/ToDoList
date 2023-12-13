<?php
try {
    // Connexion à la base de données MySQL avec PDO
    $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root');

    // Préparation de la requête SQL
    $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'a_faire'");
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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Résultat de la requête PHP</title>
    <style>
        /* Style pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            /* Ajoutez d'autres styles selon vos besoins */
        }

        /* Style pour les cellules */
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            /* Autres styles */
        }

        /* Style pour l'en-tête du tableau */
        th {
            background-color: #f2f2f2;
            /* Autres styles */
        }

        /* Autres styles personnalisés pour le tableau */
        /* ... */
    </style>
</head>
</html>