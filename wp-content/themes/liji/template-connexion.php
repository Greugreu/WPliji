<?php /* Template Name: Connexion */
$title = "Connexion";
$errors = array();
$success = false;

$form = new Form();
if (!empty($_POST['submitted'])) {
    $post = $this->cleanXss($_POST);
    $validation = new Validation();
    $errors['mail'] = $validation->emailValid($post['mail']);

    if ($validation->IsValid($errors) == true) {
        $user = UserModel::findUserByMail($post['mail']);
        if ($user->mail === $post['mail'] && password_verify($post['password'], $user->password)) {
            $_SESSION = array(
                'id' => $user->id,
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'role' => $user->role,
                'email' => $user->email,
                'ip' => $_SERVER['REMOTE_ADDR'],
            );
            echo 'ça passe';
        } else {
            $errors['password'] = 'Mail ou mot de passe incorrect';
        }
    } else {
        $errors['login'] = 'Erreur dans les identifiants';
    }
}

$form = new Form($errors);

get_header(); ?>

    <section class="container">
        <h1>Connexion</h1>
        <form action="" method="post" class="formulaire">

            <?= $form->label('mail', 'Email'); ?>
            <?= $form->input('mail', 'text'); ?>
            <?= $form->errors('mail'); ?>

            <?= $form->label('password', 'Mot de passe'); ?>
            <?= $form->input('password', 'password'); ?>
            <?= $form->errors('password'); ?>

            <div class="infoFormulaire">
                <a href="mdpOublie.php">Mot de passe oublié ?</a>
                <p>Pas de compte ? <a href="inscription.php"> Inscrivez-vous</a></p>
            </div>

            <?= $form->submit('envoyer', 'Se connecter'); ?>

        </form>
    </section>

<?php get_footer();
