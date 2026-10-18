<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Afficher le pied de page et utiliser les dates
Date : 17/10/2026
*/

$date_fin = new DateTime('2027-01-31');
$date_actuelle = new DateTime();

if ($date_actuelle <= $date_fin) {
    $difference = $date_actuelle->diff($date_fin);
    $jours_restants = $difference->days;
} else {
    $jours_restants = 0;
}

$message_date = '';

if (isset($_GET['jour']) && isset($_GET['mois']) && isset($_GET['annee'])) {
    $jour = (int) $_GET['jour'];
    $mois = (int) $_GET['mois'];
    $annee = (int) $_GET['annee'];

    if (checkdate($mois, $jour, $annee)) {
        $message_date = 'La date saisie est valide.';
    } else {
        $message_date = 'La date saisie est invalide.';
    }
}
?>
</main>
<footer>
    <p>Date du jour : <?php echo date('d/m/Y'); ?></p>
    <p>Nombre de jours jusqu'au 31/01/2027 : <?php echo $jours_restants; ?></p>

    <form method="get">
        <p>Vérifier une date :</p>
        <input type="number" name="jour" placeholder="Jour" required>
        <input type="number" name="mois" placeholder="Mois" required>
        <input type="number" name="annee" placeholder="Année" required>
        <button type="submit">Vérifier</button>
    </form>

    <?php if ($message_date != '') { ?>
        <p><?php echo $message_date; ?></p>
    <?php } ?>
</footer>
</body>
</html>
