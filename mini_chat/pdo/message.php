<div id="refresh">

    <?php
        // Connexion à la base de données
        include 'connection.php';

        $reponse = $bdd->query('SELECT m.pseudo, m.message,m.date, u.color FROM mini_chat m LEFT JOIN user u ON m.pseudo = u.pseudo ORDER BY ID DESC LIMIT 0, 10');

        // Vérifions si la requête a fonctionné
        if(!$reponse) {
        // terminer le programme avec l'erreur d'affichée
            print_r($bdd->errorInfo()); 
        }
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while (($donnees = $reponse->fetch())){
            echo '<p><strong style="color:'.$donnees['color']. '">' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) ." ". '<p><span class="badge badge-secondary">'. $donnees['date'] . '</span></p> ';
        
        }
        $reponse->closeCursor();
        ?>
</div>