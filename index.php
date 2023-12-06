<?php
	$mysqli = new mysqli("localhost", "root", "", "essai");
	$mysqli->set_charset("utf8");
	$requete = "SELECT * FROM carnet";
	$resultat = $mysqli->query($requete);
	while ($ligne = $resultat->fetch_assoc()) {
		echo $ligne['civilite'] . ' ' . $ligne['prenom'] . ' ' . $ligne['nom'] . ' ' . $ligne['email'] . ' ' . $ligne['date_naissance'] . '<br>';
	}
	$mysqli->close();
?>dzd