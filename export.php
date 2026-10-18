<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Exporter les résultats en JSON et comparer avec serialize()
Date : 17/10/2026
*/

require_once 'config.php';

$resultats = array();
$chemin_csv = 'data/notes.csv';

if (file_exists($chemin_csv)) {
    $fichier = fopen($chemin_csv, 'r');

    if ($fichier != false) {
        while (($ligne = fgetcsv($fichier, 1000, ';')) != false) {
            $note_info = (float) $ligne[1];
            $note_math = (float) $ligne[2];
            $moyenne = ($note_info + $note_math) / 2;

            $resultats[] = array(
                'nom' => $ligne[0],
                'note_info' => $note_info,
                'note_math' => $note_math,
                'moyenne' => $moyenne
            );
        }
        fclose($fichier);
    }
}

$json = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents('data/notes.json', $json);

$contenu_json = file_get_contents('data/notes.json');
$resultats_json = json_decode($contenu_json, true);
$resultats_serialize = serialize($resultats);

$titre = 'Export JSON';
include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';
?>
    <h2>Données relues avec json_decode()</h2>
    <pre><?php print_r($resultats_json); ?></pre>

    <h2>Résultat de json_encode()</h2>
    <pre><?php echo htmlspecialchars($json); ?></pre>

    <h2>Résultat de serialize()</h2>
    <pre><?php echo htmlspecialchars($resultats_serialize); ?></pre>

    <p>JSON est directement utilisable par une application JavaScript.</p>
<?php include 'includes/pied_inc.php'; ?>

