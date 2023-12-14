<?php $connexion = new PDO("mysql:host=localhost;dbname=wd-projet", 'root'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>To do list interactive</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <button onclick="window.location.href = 'http://localhost/projetWD/projet_WB.php';" class="changement">Ajouter une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/edition_tache.php';" class="changement">Modifier une tâche</button>
    <button onclick="window.location.href = 'http://localhost/projetWD/projet_WB.php';" class="changement">Supprimer une tâche</button>
    <img id="photo" src="https://attachments.office.net/owa/alexis.insalaco%40edu.ece.fr/service.svc/s/GetAttachmentThumbnail?id=AAMkADYzNWUyMzJjLTIxNDctNGVlZS05NmYwLWI3NmYxZTk0NDllNwBGAAAAAAC%2Br8%2BJn7KRT6oROjN%2BW6aFBwDW%2BR3D8nWgSLzDGv0DqCfsAAAAAAEMAADW%2BR3D8nWgSLzDGv0DqCfsAABaGMWvAAABEgAQAK8QhRHecPtIkEqELSri6xM%3D&thumbnailType=2&token=eyJhbGciOiJSUzI1NiIsImtpZCI6IjczRkI5QkJFRjYzNjc4RDRGN0U4NEI0NDBCQUJCMTJBMzM5RDlGOTgiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJjX3VidnZZMmVOVDM2RXRFQzZ1eEtqT2RuNWcifQ.eyJvcmlnaW4iOiJodHRwczovL291dGxvb2sub2ZmaWNlLmNvbSIsInVjIjoiMTljN2JkOGY3Y2Y3NGVkZGE1YWE3NGIxMGJhZmI2NDMiLCJ2ZXIiOiJFeGNoYW5nZS5DYWxsYmFjay5WMSIsImFwcGN0eHNlbmRlciI6Ik93YURvd25sb2FkQGEyNjk3MTE5LTY2YzUtNDEyNi05OTkxLWIwYThkMTVkMzY3ZiIsImlzc3JpbmciOiJXVyIsImFwcGN0eCI6IntcIm1zZXhjaHByb3RcIjpcIm93YVwiLFwicHVpZFwiOlwiMTE1MzgwMTEyNTkxNDk0MTMzOFwiLFwic2NvcGVcIjpcIk93YURvd25sb2FkXCIsXCJvaWRcIjpcIjVlMmI0YWM3LTljMzctNDkyYS05ZDM0LTg4OWRlZDRhMTBkMVwiLFwicHJpbWFyeXNpZFwiOlwiUy0xLTUtMjEtMzE0MDgyNTYzNS0yNDIxMDg1OTI0LTE1NTYyNzU1NDAtNDYwMzE1ODBcIn0iLCJuYmYiOjE3MDI1ODM3NTIsImV4cCI6MTcwMjU4NDM1MiwiaXNzIjoiMDAwMDAwMDItMDAwMC0wZmYxLWNlMDAtMDAwMDAwMDAwMDAwQGEyNjk3MTE5LTY2YzUtNDEyNi05OTkxLWIwYThkMTVkMzY3ZiIsImF1ZCI6IjAwMDAwMDAyLTAwMDAtMGZmMS1jZTAwLTAwMDAwMDAwMDAwMC9hdHRhY2htZW50cy5vZmZpY2UubmV0QGEyNjk3MTE5LTY2YzUtNDEyNi05OTkxLWIwYThkMTVkMzY3ZiIsImhhcHAiOiJvd2EifQ.G27WBRfy2QkgZlay-fXdAlRID8r8ryGETRQ_JgKrINHiDzCnzm13G7Dyu4wnzgKThQI34fSEluok6H2yHSdz3NBZDcU6Kp0417rzW0X4RVpzWJWuDqmH7oX9W8Ilro6EgCvB3u5I79iu_pUosSwB5FkFFjAHawY6SaLzWayw-Hu9D7XdPaRcY4Vwnb8cFHoEoDsB9k1gbXxaHoroOwjdGLbyqMTuP7f37u1TrMRIRmJM3WO5hIGmGY4_GGoYUPX6dYTjwpketnOY2VUqBXDK_xyfWjHn7RLZg9lhcyFAT3j8MtXWM9vlJHLDCuCKZHolPMr0tOuWZx5Ab_aQJjB2DA&X-OWA-CANARY=X-OWA-CANARY_cookie_is_null_or_empty&owa=outlook.office.com&scriptVer=20231201002.07&clientId=0FF48460BE344892851C2085641434FB&animation=true&persistenceId=dd6ba81a-8898-4e5c-ad1e-669b6b25be8d" alt="texte descriptif image" title="">

</head>

<body>
        <!-- Titre de la page -->
        <h1>To-Do List</h1>
        <form method="post" action="creation.php" id="task-form">
            <fieldset>
                <p>
                    <label for="titre">Titre :</label>
                    <input type="text" name="titre" required="required" autofocus id="titre" placeholder="Tâche 1" />
                    <span id="Titre manquant"></span>
                </p>
                <p>
                    <label for="description">Description :</label>
                    <input type="text" name="description" required="required" id="description" placeholder="Description de la tâche" />
                    <span id="description_manquante"></span>
                </p>
                <p>
                    <label for="etat">Etat :</label>
                    <select name="etat" id="etat">
                        <option value="en_cours">En cours</option>
                        <option value="a_faire">A faire</option>
                        <option value="termine">Terminé</option>
                    </select>
                </p>
            </fieldset>
            <input type="submit" id ="submit" value="Créer" />
        </form>

        <div class="tasks-container">
            <!-- Liste de tâches en cours -->
            <div>
                <h2>Tâches à faire</h2>
                <?php $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'a_faire'");
                        $requete->execute(); ?>
                <table border="1">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Etat</th>
                    </tr>
                    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $ligne['Nom']; ?></td>
                        <td><?php echo $ligne['Description']; ?></td>
                        <td><?php echo "A faire"; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  
        
            <!-- Liste de tâches en cours -->
            <div>
                <h2>Tâches en cours</h2>
                <?php $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'en_cours'");
                        $requete->execute(); ?>
                <table border="1">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Etat</th>
                    </tr>
                    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $ligne['Nom']; ?></td>
                        <td><?php echo $ligne['Description']; ?></td>
                        <td><?php echo "En cours"; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  

            <div>
                <h2>Tâches terminées</h2>
                <?php $requete = $connexion->prepare("SELECT Nom, Description, Etat FROM taches WHERE Etat = 'fait'");
                        $requete->execute(); ?>
                <table border="1">
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Etat</th>
                    </tr>
                    <?php while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $ligne['Nom']; ?></td>
                        <td><?php echo $ligne['Description']; ?></td>
                        <td><?php echo "Terminée"; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>  
        </div>
</body>
</html>
