<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Utiliser les conditions, le switch et les boucles
Date : 17/10/2026
*/

require_once 'config.php';

$notes_test = array(18, 15, 13, 10, 7);

$mois = date("m");

switch ($mois) {
    case "01":
        $nom_mois = "janvier";
        break;
    case "02":
        $nom_mois = "février";
        break;
    case "03":
        $nom_mois = "mars";
        break;
    case "04":
        $nom_mois = "avril";
        break;
    case "05":
        $nom_mois = "mai";
        break;
    case "06":
        $nom_mois = "juin";
        break;
    case "07":
        $nom_mois = "juillet";
        break;
    case "08":
        $nom_mois = "août";
        break;
    case "09":
        $nom_mois = "septembre";
        break;
    case "10":
        $nom_mois = "octobre";
        break;
    case "11":
        $nom_mois = "novembre";
        break;
    case "12":
        $nom_mois = "décembre";
        break;
    default:
        $nom_mois = "mois inconnu";
}

// Sans break, PHP continue dans le case suivant.
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2 - Structures de contrôle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Partie 2 : structures de contrôle</h1>

        <h2>Exercice 2.1 : if / elseif / else</h2>
        <ul>
            <?php foreach ($notes_test as $note) { ?>
                <li><?php echo $note . ' : ' . mention($note); ?></li>
            <?php } ?>
        </ul>

        <h2>Exercice 2.2 : switch</h2>
        <p>Le mois courant est : <?php echo $nom_mois; ?></p>

        <h2>Triangle avec deux boucles for</h2>
        <pre><?php
        for ($i = 1; $i <= 6; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo '*';
            }
            echo "\n";
        }
        ?></pre>

        <h2>Boucle while de 0 à 20</h2>
        <p><?php
        $i = 0;
        while ($i <= 20) {
            if ($i == 10) {
                echo '<strong>' . $i . '</strong> ';
            } else {
                echo $i . ' ';
            }
            $i = $i + 2;
        }
        ?></p>

        <h2>Boucle for avec continue</h2>
        <p><?php
        for ($i = 0; $i <= 10; $i++) {
            if ($i % 2 != 0) {
                continue;
            }
            echo $i . ' ';
        }
        ?></p>

        <h2>while, switch et break 2</h2>
        <p><?php
        $i = 1;
        while (true) {
            switch ($i) {
                case 5:
                    echo 'At 5<br>';
                    break;
                case 10:
                    echo 'At 10; quitting';
                    break 2;
                default:
                    echo $i . ' ';
            }
            $i++;
        }
        ?></p>

        <h2>Boucle do-while de 0 à 20</h2>
        <p><?php
        $i = 0;
        do {
            if ($i == 10) {
                echo '<strong>' . $i . '</strong> ';
            } else {
                echo $i . ' ';
            }
            $i = $i + 2;
        } while ($i <= 20);
        ?></p>
        <p>La boucle do-while exécute toujours son contenu au moins une fois.</p>
    </main>
</body>
</html>
