<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Manipuler les variables, les constantes, les types et les chaînes
Date : 17/10/2026
*/

require 'config.php';

// Ceci est un commentaire avec deux barres.
# Ceci est un commentaire avec un dièse.
/* Ceci est un commentaire
   sur plusieurs lignes. */

// $x est valide : il commence par une lettre.
// $_x est valide : il commence par un tiret bas.
// $2x est invalide : il commence par un chiffre.
// $x-y est invalide : le tiret est un opérateur.
// $Prix_HT est valide : il contient des lettres et un tiret bas.
// $prix ht est invalide : un nom de variable ne contient pas d'espace.
// $état est valide en PHP, mais les accents sont déconseillés dans les noms.
$x = 1;
$_x = 2;
$Prix_HT = 60;
$état = 'actif';

$a = 'variable a minuscule';
$A = 'variable A majuscule';

$seuil_existe = defined('SEUIL');
$inconnue_existe = defined('INCONNUE');

// Une constante non définie provoque une erreur en PHP 8.
// const déclare une constante directement dans le code.
// define() crée une constante pendant l'exécution du script.

$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

$test = 42;
$test = (string) $test;

// 0, 0.0, "0", "", [], null donnent false. "abc" donne true.
// (int) 3.9 donne 3. (int) "12abc" donne 12.
// (float) "1.5e3" donne 1500. (int) true donne 1.
$decimal = 255;
$hexadecimal = 0xFF;
$octal = 0377;
$binaire = 0b11111111;

$traitees = 'égales à';
$ici = 2;
$chaine = '*Bonjour les développeurs*';
$chaine_sans_etoiles = trim($chaine, '*');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1 - Bases de PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Partie 0 et Partie 1</h1>

        <h2>Hello PHP</h2>
        <?php echo 'Hello PHP'; ?>

        <h2>Exercice 1.1 : variables</h2>
        <p><?php echo $a; ?></p>
        <p><?php echo $A; ?></p>

        <h2>Exercice 1.2 : constantes</h2>
        <p>Établissement : <?php echo ETABLISSEMENT; ?></p>
        <p>Note minimale : <?php echo NOTE_MIN; ?></p>
        <p>Note maximale : <?php echo NOTE_MAX; ?></p>
        <p>Seuil : <?php echo SEUIL; ?></p>
        <p>SEUIL est définie : <?php var_dump($seuil_existe); ?></p>
        <p>INCONNUE est définie : <?php var_dump($inconnue_existe); ?></p>

        <h2>Exercice 1.3 : calcul</h2>
        <p>Le prix TTC du produit est de <?php echo $prix_ttc; ?> €.</p>

        <h2>Exercice 1.4 : types et conversions</h2>
        <pre><?php
        var_dump($test);
        var_dump((bool) 0);
        var_dump((bool) 0.0);
        var_dump((bool) "0");
        var_dump((bool) "");
        var_dump((bool) "abc");
        var_dump((bool) array());
        var_dump((bool) null);
        var_dump((int) 3.9);
        var_dump((int) "12abc");
        var_dump((float) "1.5e3");
        var_dump((int) true);
        ?></pre>

        <p>Décimal : <?php echo $decimal; ?></p>
        <p>Hexadécimal : <?php echo $hexadecimal; ?></p>
        <p>Octal : <?php echo $octal; ?></p>
        <p>Binaire : <?php echo $binaire; ?></p>

        <h2>Exercice 1.5 : chaînes</h2>
        <pre><?php
        echo "Ahmed a dit : \"J'ai réussi\"";
        echo "\n";
        echo 'Voulez-vous supprimer C:\\*.*?';
        echo "\n";
        echo 'Ceci n\'affichera pas \\n de nouvelle ligne';
        echo "\n";
        echo 'Les variables ne seront pas $traitees $ici';
        echo "\n";
        echo "Les variables seront $traitees $ici";
        ?></pre>

        <p>Après trim() : <?php echo $chaine_sans_etoiles; ?></p>
        <p>
            <?php
            $caracteres = preg_split('//u', $chaine_sans_etoiles, -1, PREG_SPLIT_NO_EMPTY);

            for ($i = 0; $i < strlen($chaine_sans_etoiles); $i++) {
                if (!isset($caracteres[$i])) {
                    break;
                }

                echo $caracteres[$i] . '<br>';
            }
            ?>
        </p>
    </main>
</body>
</html>
