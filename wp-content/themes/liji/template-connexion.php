<?php /* Template Name: Connexion */
session_start();
global $web;
$errors = array();
$success = false;
$form = new Form();
$valid = new Validation();

if (!empty($_POST['submitted'])) {

    // PROTECT FROM XSS
    $mail     = stripslashes(trim(strip_tags($_POST['email'])));
    $password = trim(strip_tags($_POST['password']));

    $errors['mail'] = $valid->emailValid($mail);

    if ($valid->IsValid($errors)) {
        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}pro_login WHERE email_pro = '%s'", $mail));
        if (!empty($user)) {
            if (password_verify($password, $user->password_pro)) {
                $valid->nouvelleSession($user, '/childguard-wp/');
            } else {
                return $error = 'L\'email ou le mot de passe ne sont pas valide';
            }
        } else {
            return $error = "L\'email ou le mot de passe ne sont pas valide";
        }
    }
}

$form = new Form($errors);

get_header(); ?>

    <section class="container">
        <h1>Connexion</h1>
        <form action="" method="post" class="formulaire">

            <?= $form->label('mail', 'Email'); ?>
            <?= $form->input('mail', 'text'); ?>
<!--            --><?//= $form->errors('mail'); ?>

            <?= $form->label('password', 'Mot de passe'); ?>
            <?= $form->input('password', 'password'); ?>
<!--            --><?//= $form->errors('password'); ?>

            <?= $form->submit('envoyer', 'Se connecter'); ?>

        </form>
    </section>

<?php get_footer();
