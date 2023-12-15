<?php
$idUtilisateur = $_GET['valeur_transmise'];
$connexion = new PDO('mysql:host=localhost;dbname=wd-projet', 'root');

// Vérifie que l'ID de la tâche à supprimer est fourni
if (isset($_POST['id_tache'])) { // Vérifie que l'ID de la tâche à supprimer est fourni
    $requete = $connexion->prepare('DELETE FROM taches WHERE ID = :id'); // Requête SQL pour supprimer la tâche
    $requete->bindParam(':id', $idUtilisateur, PDO::PARAM_INT); // Lie le paramètre :id à la variable $id, en spécifiant que c'est un entier
    $requete->execute(); // Exécute la requête SQL
    header('Location: http://localhost/projetWD/projet_WB.php?valeur_transmise=' . urlencode($idUtilisateur)); // Redirige vers la liste des tâches après la suppression
	exit();
    } else {
    echo 'Error: No ID provided';
}
?>
