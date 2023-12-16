<?php
// Connect to the database
$connexion = new PDO('mysql:host=localhost;dbname=wd-projet', 'root');

if (isset($_POST['id_tache']) && isset($_POST['nouveau_nom']) && isset($_POST['nouvelle_description']) && isset($_POST['etat_tache'])) {
    $id = $_POST['id_tache'];
    $nouveauNom = $_POST['nouveau_nom'];
    $nouvelleDescription = $_POST['nouvelle_description'];
    $etatTache = $_POST['etat_tache'];

    // Prepare and execute the query to update task details including the state
    $requete = $connexion->prepare('UPDATE taches SET Nom = :nouveau_nom, Description = :nouvelle_description, Etat = :etat_tache WHERE ID = :id');
    $requete->bindParam(':nouveau_nom', $nouveauNom);
    $requete->bindParam(':nouvelle_description', $nouvelleDescription);
    $requete->bindParam(':etat_tache', $etatTache);
    $requete->bindParam(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    // Redirect to the list of tasks after update
    header('Location: edition_tache.php');
} else {
    echo 'Error: Incomplete information provided for update';
}
?>