<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Protéger et afficher la page du profil
Date : 17/10/2026
*/

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require_once 'config.php';

$titre = 'Profil';
include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';
?>
    <h2>Profil</h2>
    <p>Bienvenue <?php echo htmlspecialchars($_SESSION['login']); ?>.</p>
    <p><a href="deconnexion.php">Se déconnecter</a></p>
<?php include 'includes/pied_inc.php'; ?>

