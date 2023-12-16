<?php
$titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING); // Récupère le titre de la tâche
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING); // Récupère la description de la tâche
$etat = filter_input(INPUT_POST, 'etat', FILTER_SANITIZE_STRING); // Récupère l'état de la tâche
try {
    $pdo = new PDO("mysql:host=localhost;dbname=wd-projet", "root");

    $stmt = $pdo->prepare("INSERT INTO taches (Nom, Description, Etat) VALUES (?, ?, ?)"); // Requête SQL pour créer une nouvelle tâche
	$stmt->execute([$titre, $description, $etat]); // Exécute la requête SQL
	header('Location: http://localhost/projetWD/creation.php'); // Redirige vers la liste des tâches après la création
	exit();

    } catch (\Throwable $th) {
    print_r($th->getMessage()  );
    }
?>

