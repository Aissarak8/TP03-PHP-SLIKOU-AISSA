<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Créer, afficher, calculer et trier des tableaux
Date : 17/10/2026
*/

require_once 'config.php';

$notes = array(
    'Mohamed' => 16,
    'Ahmed' => 14,
    'Hind' => 13,
    'Aicha' => 15,
    'Samir' => 13,
    'Zakaria' => 13,
    'Rafik' => 10,
    'Ilham' => 9,
    'Hamza' => 7,
    'Sami' => 7,
    'Noura' => 14
);

$modules = array('Informatique', 'Mathématiques', 'Web');

function afficher($tableau)
{
    echo '<table>';
    echo '<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>';

    foreach ($tableau as $nom => $note) {
        if ($note < SEUIL) {
            echo '<tr class="echec">';
        } else {
            echo '<tr>';
        }

        echo '<td>' . htmlspecialchars($nom) . '</td>';
        echo '<td>' . $note . '</td>';
        echo '<td>' . mention($note) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}

$somme = 0;
$meilleure_note = NOTE_MIN;
$note_faible = NOTE_MAX;
$effectifs = array();

foreach ($notes as $note) {
    $somme = $somme + $note;

    if ($note > $meilleure_note) {
        $meilleure_note = $note;
    }

    if ($note < $note_faible) {
        $note_faible = $note;
    }

    $nom_mention = mention($note);

    if (isset($effectifs[$nom_mention])) {
        $effectifs[$nom_mention]++;
    } else {
        $effectifs[$nom_mention] = 1;
    }
}

$moyenne = $somme / count($notes);
$titre = 'Tableaux';

include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';

// Expérience 1 : fichier inexistant
// include 'includes/fichier_inexistant.php';
// Résultat observé : include affiche un avertissement et le script continue.

// require 'includes/fichier_inexistant.php';
// Résultat observé : require provoque une erreur fatale et arrête le script.
// Expérience 2 : inclusion du menu deux fois
// include 'includes/menu_inc.php';
// include 'includes/menu_inc.php';
// Résultat observé : le menu est affiché deux fois.

// include_once 'includes/menu_inc.php';
// include_once 'includes/menu_inc.php';
// Résultat observé : le menu est affiché une seule fois.
?>
    <h2>Exercice 3.1 : modules</h2>
    <ul>
        <?php foreach ($modules as $module) { ?>
            <li><?php echo $module; ?></li>
        <?php } ?>
    </ul>
    <p><?php echo $modules[0]; ?></p>
    <p><?php echo $modules[1]; ?></p>
    <p><?php echo $modules[2]; ?></p>

    <h2>Exercice 3.2 : notes</h2>
    <?php afficher($notes); ?>

    <h2>Exercice 3.3 : statistiques</h2>
    <p>Somme avec la boucle : <?php echo $somme; ?></p>
    <p>Moyenne avec la boucle : <?php echo round($moyenne, 2); ?></p>
    <p>Meilleure note : <?php echo $meilleure_note; ?></p>
    <p>Note la plus faible : <?php echo $note_faible; ?></p>
    <p>Vérification avec array_sum() : <?php echo array_sum($notes); ?></p>
    <p>Vérification avec count() : <?php echo count($notes); ?> apprenants</p>
    <p>Vérification avec max() : <?php echo max($notes); ?></p>
    <p>Vérification avec min() : <?php echo min($notes); ?></p>

    <h3>Effectifs par mention</h3>
    <ul>
        <?php foreach ($effectifs as $nom_mention => $nombre) { ?>
            <li><?php echo $nom_mention . ' : ' . $nombre; ?></li>
        <?php } ?>
    </ul>

    <h2>Exercice 3.4 : tris</h2>
    <h3>Noms croissants avec ksort()</h3>
    <?php
    $notes_triees = $notes;
    ksort($notes_triees);
    afficher($notes_triees);
    ?>

    <h3>Notes décroissantes avec arsort()</h3>
    <?php
    $notes_triees = $notes;
    arsort($notes_triees);
    afficher($notes_triees);
    ?>

    <h3>Noms décroissants avec krsort()</h3>
    <?php
    $notes_triees = $notes;
    krsort($notes_triees);
    afficher($notes_triees);
    ?>

    <h3>Notes croissantes avec asort()</h3>
    <?php
    $notes_triees = $notes;
    asort($notes_triees);
    afficher($notes_triees);
    ?>
    <p>Pour trier le tableau indexé $modules, on utilise sort().</p>

    <h2>Exercice 3.5 : opérateurs de tableaux</h2>
    <?php
    $a = array('x' => 1, 'y' => 2);
    $b = array('y' => 2, 'x' => 1);
    ?>
    <p>Prédiction : $a + $b conserve les éléments de $a.</p>
    <pre><?php var_dump($a + $b); ?></pre>
    <p>Prédiction : $a == $b donne true car les clés et valeurs sont identiques.</p>
    <pre><?php var_dump($a == $b); ?></pre>
    <p>Prédiction : $a === $b donne false car l'ordre des clés est différent.</p>
    <pre><?php var_dump($a === $b); ?></pre>

<?php include 'includes/pied_inc.php'; ?>
