<?php
$connexion = new PDO('mysql:host=localhost;dbname=wd-projet', 'root');

// Vérifie que l'ID de la tâche à supprimer est fourni
if (isset($_POST['id_tache'])) { // Vérifie que l'ID de la tâche à supprimer est fourni
    $id = $_POST['id_tache']; // Utilisation de 'id_tache' pour récupérer l'ID
    $requete = $connexion->prepare('DELETE FROM taches WHERE ID = :id'); // Requête SQL pour supprimer la tâche
    $requete->bindParam(':id', $id, PDO::PARAM_INT); // Lie le paramètre :id à la variable $id, en spécifiant que c'est un entier
    $requete->execute(); // Exécute la requête SQL
    header('Location: http://localhost/projetWD/acceuil.php'); // Redirige vers la liste des tâches après la suppression
	exit();
    } else {
    echo 'Error: No ID provided';
}
?>
