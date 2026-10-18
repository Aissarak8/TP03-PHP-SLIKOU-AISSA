<?php
/*
Auteur : AISSA SLIKOU - Groupe G3
Objectif : Créer une session, un cookie et rediriger vers le profil
Date : 17/10/2026
*/

session_start();

require_once 'config.php';

$message = '';
$dernier_login = '';

if (isset($_COOKIE['dernier_login'])) {
    $dernier_login = $_COOKIE['dernier_login'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        $login = $_POST['login'];
        $_SESSION['login'] = $login;

        setcookie('dernier_login', $login, time() + 86400, '/');

        $tableau_cookie = array(
            'login' => $login,
            'date' => date('d/m/Y H:i:s')
        );
        $cookie_json = json_encode($tableau_cookie);
        setcookie('infos_login', $cookie_json, time() + 86400, '/');

        header('Location: profil.php');
        exit;
    } else {
        $message = 'Le login est obligatoire.';
    }
}

$infos_login = array();

if (isset($_COOKIE['infos_login'])) {
    $infos_login = json_decode($_COOKIE['infos_login'], true);
}

// Une session est stockée sur le serveur. Un cookie est stocké dans le navigateur.
// setcookie() et header() doivent être appelés avant tout affichage car ils envoient des en-têtes HTTP.

$titre = 'Connexion';
include 'includes/entete_inc.php';
include_once 'includes/menu_inc.php';
?>
    <h2>Connexion</h2>
    <p><?php echo $message; ?></p>

    <form method="post" action="login.php">
        <label>Login :</label>
        <input type="text" name="login" value="<?php echo htmlspecialchars($dernier_login); ?>" required>
        <button type="submit">Se connecter</button>
    </form>

    <?php if (!empty($infos_login)) { ?>
        <p>Dernier login : <?php echo htmlspecialchars($infos_login['login']); ?></p>
        <p>Date de connexion : <?php echo htmlspecialchars($infos_login['date']); ?></p>
    <?php } ?>
<?php include 'includes/pied_inc.php'; ?>

