<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Détruire la session et rediriger vers la connexion
Date : 17/10/2026
*/

session_start();
session_unset();
session_destroy();

header('Location: login.php');
exit;

