<?php /* Template Name: Connexion */
session_start();
global $web;
$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

    // PROTECT FROM XSS
    $mail     = stripslashes(trim(strip_tags($_POST['email'])));
    $password = stripslashes(trim(strip_tags($_POST['password'])));

    $validation = new Validation();

    $errors['mail']     = $validation->emailValid($mail);
    $errors['password'] = $validation->passwordValid($password);

    if ($validation->IsValid($errors)) {
        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}pro WHERE mail = '%s'", $mail));
        if (!empty($user)) {
            if (password_verify($password, $user->password)) {
                $validation->nouvelleSession($user, '/liji/');
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
            <?= $form->input('mail'); ?>
            <?= $form->error('mail'); ?>

            <?= $form->label('password', 'Mot de passe'); ?>
            <?= $form->input('password'); ?>
            <?= $form->error('password'); ?>

            <?= $form->submit('envoyer', 'Se connecter'); ?>

        </form>
    </section>

<?php get_footer();
