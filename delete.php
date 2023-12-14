<?php
// Connect to the database
$connexion = new PDO('mysql:host=localhost;dbname=wd-projet', 'root');

// Check if the "id_tache" key is defined in the $_POST array
if (isset($_POST['id_tache'])) {
    $id = $_POST['id_tache']; // Utilisation de 'id_tache' pour récupérer l'ID
    // Prepare the query
    $requete = $connexion->prepare('DELETE FROM taches WHERE ID = :id');
    // Execute the query
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();
    header('Location: http://localhost/projetWD/delete_tache.php');
	exit();
    } else {
    echo 'Error: No ID provided';
}
?>
