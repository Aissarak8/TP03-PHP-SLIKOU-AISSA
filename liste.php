<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Lire le fichier CSV et afficher les notes
Date : 17/10/2026
*/

require_once 'config.php';

$titre = 'Liste des notes';
include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';
?>
    <h2>Lecture avec fgetcsv()</h2>

    <?php
    $chemin = 'data/notes.csv';
    $nombre_apprenants = 0;
    $total_moyennes = 0;

    if (!file_exists($chemin)) {
        echo '<p>Le fichier notes.csv n\'existe pas encore.</p>';
    } else {
        $fichier = fopen($chemin, 'r');

        if ($fichier == false) {
            echo '<p>Impossible d\'ouvrir le fichier.</p>';
            include 'includes/pied_inc.php';
            exit;
        }
        ?>

        <table>
            <tr>
                <th>Nom</th>
                <th>Info</th>
                <th>Math</th>
                <th>Moyenne</th>
                <th>Mention</th>
            </tr>
            <?php
            while (($ligne = fgetcsv($fichier, 1000, ';')) != false) {
                $nom = $ligne[0];
                $note_info = (float) $ligne[1];
                $note_math = (float) $ligne[2];
                $moyenne = ($note_info + $note_math) / 2;
                $total_moyennes = $total_moyennes + $moyenne;
                $nombre_apprenants++;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($nom, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo $note_info; ?></td>
                    <td><?php echo $note_math; ?></td>
                    <td><?php echo round($moyenne, 2); ?></td>
                    <td><?php echo mention($moyenne); ?></td>
                </tr>
                <?php
            }
            fclose($fichier);
            ?>
        </table>

        <?php
        if ($nombre_apprenants > 0) {
            $moyenne_generale = $total_moyennes / $nombre_apprenants;
            echo '<p>Moyenne générale : ' . round($moyenne_generale, 2) . '</p>';
        }
    }
    ?>

    <h2>Lecture bas niveau avec fgets()</h2>
    <pre><?php
    if (file_exists($chemin)) {
        $fichier = fopen($chemin, 'r');

        if ($fichier != false) {
            while (!feof($fichier)) {
                $ligne = fgets($fichier);

                if ($ligne != false) {
                    $elements = explode(';', trim($ligne));
                    print_r($elements);
                }
            }
            fclose($fichier);
        }
    }
    ?></pre>
    <p>fgetcsv() gère les séparateurs et les guillemets du format CSV.</p>
    <p>fgets() avec explode() est simple, mais gère mal un séparateur placé dans une valeur.</p>
<?php include 'includes/pied_inc.php'; ?>
