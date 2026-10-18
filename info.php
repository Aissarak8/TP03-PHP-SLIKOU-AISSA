<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Traiter les données envoyées par la méthode GET
Date : 17/10/2026
*/

require_once 'config.php';

$nom = '';
$prenom = '';
$sexe = '';
$message = 'Données manquantes.';

if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $sexe = $_GET['sexe'];

    if ($sexe == 'M') {
        $message = 'Bonjour Monsieur ' . $prenom . ' ' . $nom;
    } elseif ($sexe == 'F') {
        $message = 'Bonjour Madame ' . $prenom . ' ' . $nom;
    } else {
        $message = 'Sexe invalide.';
    }
}

$titre = 'Résultat du formulaire GET';

include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';
?>
    <h2>Résultat</h2>
    <p><?php echo $message; ?></p>
    <p>Les valeurs GET sont visibles dans l'adresse de la page.</p>
<?php include 'includes/pied_inc.php'; ?>
