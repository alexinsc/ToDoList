<?php
$idUtilisateur = $_GET['valeur_transmise'];
// Connexion à la base de données (PDO)
try {
    $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", "root");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification de la méthode de requête et existence des données
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uti"])) {
        $utilisateur = $_POST["uti"];

        // Préparation et exécution de la requête d'insertion
        $requete = $connexion->prepare("INSERT INTO utilisateur (Utilisateur) VALUES (:utilisateur)");
        $requete->bindParam(':utilisateur', $utilisateur);
        $requete->execute();

        // Confirmation de l'ajout
        echo "L'utilisateur $utilisateur a été ajouté avec succès !";
        header('Location: http://localhost/projetWD/accueil.php'); // Redirige vers la liste des tâches après la suppression
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["utilisateur-select"])) {
    $idUtilisateur = $_POST["utilisateur-select"];

    // Connexion à la base de données (PDO)
    try {
        header('Location: http://localhost/projetWD/projet_WB.php?valeur_transmise=' . urlencode($idUtilisateur)); // Redirige vers la liste des tâches après la suppression
        exit();
    } catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }

    }
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
