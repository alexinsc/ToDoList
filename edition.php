<?php
$idUtilisateur = $_GET['valeur_transmise'];
$connexion = new PDO('mysql:host=localhost;dbname=wd-projet', 'root');

if (isset($_POST['id_tache']) && isset($_POST['nouveau_nom']) && isset($_POST['nouvelle_description']) && isset($_POST['etat_tache'])) { // Verifie que les informations nécessaires sont fournies
    $nouveauNom = $_POST['nouveau_nom']; // Obtient le nouveau nom de la tâche
    $nouvelleDescription = $_POST['nouvelle_description']; // Obtient la nouvelle description de la tâche
    $etatTache = $_POST['etat_tache']; // Obtient le nouvel état de la tâche

    // Prépare et exécute la requête SQL pour modifier les détails de la tâche
    $requete = $connexion->prepare('UPDATE taches SET Nom = :nouveau_nom, Description = :nouvelle_description, Etat = :etat_tache WHERE ID = :id'); // Requête SQL pour modifier les détails de la tâche
    $requete->bindParam(':nouveau_nom', $nouveauNom); // Lie le paramètre :nouveau_nom à la variable $nouveauNom
    $requete->bindParam(':nouvelle_description', $nouvelleDescription); // Lie le paramètre :nouvelle_description à la variable $nouvelleDescription
    $requete->bindParam(':etat_tache', $etatTache); // Lie le paramètre :etat_tache à la variable $etatTache
    $requete->bindParam(':id', $idUtilisateur, PDO::PARAM_INT); // Lie le paramètre :id à la variable $id, en spécifiant que c'est un entier
    $requete->execute(); // Exécute la requête SQL

    // Redirect to the list of tasks after update
    header('Location: http://localhost/projetWD/projet_WB.php?valeur_transmise=' . urlencode($idUtilisateur)); // Redirige vers la liste des tâches après la suppression
} else {
    echo 'Error: Incomplete information provided for update';
}
?>
