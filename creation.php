<?php
$titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$etat = filter_input(INPUT_POST, 'etat', FILTER_SANITIZE_STRING);

try {
    $pdo = new PDO("mysql:host=localhost;dbname=wd-projet", "root");

    $stmt = $pdo->prepare("INSERT INTO taches (Nom, Description, Etat) VALUES (?, ?, ?)");
	$stmt->execute([$titre, $description, $etat]);
	header('Location: http://localhost/projetWD/projet_WB.php');
	exit();

    } catch (\Throwable $th) {
    print_r($th->getMessage()  );
    }
?>

