<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Afficher l'en-tête commun des pages
Date : 17/10/2026
*/
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titre; ?> - <?php echo ETABLISSEMENT; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><?php echo ETABLISSEMENT; ?></h1>
        <p>TP03 PHP - Suivi des notes</p>
    </header>

