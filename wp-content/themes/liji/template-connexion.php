<?php /* Template Name: Connexion */

global $web;
$errors = false;
if (!empty($_POST['submitted'])) {
    $user = wp_signon($_POST);
    if (is_wp_error($user)) {
        $error = $user->get_error_message();
    } else {
        wp_redirect(home_url($web['pages']['home']['slug']));
        exit;
    }
}

$form = new Form($errors);

get_header(); ?>

    <section class="container" id="template-connexion">
        <h2 class="text-center">Connexion</h2>
        <form class="container" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
            <div class="form-group">
                <?php echo $form->label('email','user_login'); ?>
                <?php echo $form->input('email', 'user_login','user_login'); ?>
                <?php echo $form->error('email'); ?>

                <?php echo $form->label('Mot de passe','password'); ?>
                <?php echo $form->input('password', 'password','password'); ?>
                <?php echo $form->error('password'); ?>

            </div>
            <?php echo $form->submit(); ?>
        </form>
    </section>

<?php get_footer();


