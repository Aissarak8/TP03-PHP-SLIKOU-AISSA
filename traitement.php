<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Valider le formulaire POST et enregistrer les notes dans un CSV
Date : 17/10/2026
*/

require_once 'config.php';

$message = '';
$valide = true;

if (!isset($_POST['nom']) || !isset($_POST['note_info']) || !isset($_POST['note_math'])) {
    $message = 'Tous les champs doivent exister.';
    $valide = false;
} elseif (empty($_POST['nom']) || $_POST['note_info'] === '' || $_POST['note_math'] === '') {
    $message = 'Tous les champs sont obligatoires.';
    $valide = false;
} elseif (!is_numeric($_POST['note_info']) || !is_numeric($_POST['note_math'])) {
    $message = 'Les notes doivent être numériques.';
    $valide = false;
} else {
    $nom = $_POST['nom'];
    $note_info = (float) $_POST['note_info'];
    $note_math = (float) $_POST['note_math'];

    if ($note_info < NOTE_MIN || $note_info > NOTE_MAX) {
        $message = 'La note d\'informatique doit être entre 0 et 20.';
        $valide = false;
    } elseif ($note_math < NOTE_MIN || $note_math > NOTE_MAX) {
        $message = 'La note de mathématiques doit être entre 0 et 20.';
        $valide = false;
    }
}

if ($valide) {
    $fichier = fopen('data/notes.csv', 'a');

    if ($fichier == false) {
        $message = 'Impossible d\'ouvrir le fichier CSV.';
        $valide = false;
    } else {
        fputcsv($fichier, array($nom, $note_info, $note_math), ';');
        fclose($fichier);
        $moyenne = ($note_info + $note_math) / 2;
        $message = 'Les notes ont été enregistrées.';
    }
}

// POST est préférable pour un mot de passe car la valeur n'apparaît pas dans l'URL.
// $_REQUEST contient les données de $_GET, $_POST et $_COOKIE.
// Le mode "w" effacerait le contenu du fichier avant d'écrire.

$titre = 'Traitement du formulaire';
include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';
?>
    <h2>Résultat de la saisie</h2>
    <p><?php echo $message; ?></p>

    <?php if ($valide) { ?>
        <p>Nom : <?php echo htmlspecialchars($nom, ENT_QUOTES, 'UTF-8'); ?></p>
        <p>Note informatique : <?php echo $note_info; ?></p>
        <p>Note mathématiques : <?php echo $note_math; ?></p>
        <p>Moyenne : <?php echo round($moyenne, 2); ?></p>
        <p>Mention : <?php echo mention($moyenne); ?></p>
    <?php } ?>

    <p><a href="saisie.html">Retour au formulaire</a></p>
<?php include 'includes/pied_inc.php'; ?>
