<?php /* Template Name: Contact */
$errors = array();
$success = false;
$redirection = esc_url(home_url($web['pages']['home']));

if (!empty($_POST['submitted'])) {

    // PROTECT FROM XSS
    $nom     = stripslashes(trim(strip_tags($_POST['nom'])));
    $prenom  = stripslashes(trim(strip_tags($_POST['prenom'])));
    $email   = stripslashes(trim(strip_tags($_POST['email'])));
    $sujet   = stripslashes(trim(strip_tags($_POST['sujet'])));
    $message = stripslashes(trim(strip_tags($_POST['message'])));


    $validation = new Validation();


    $errors['nom']     = $validation->textValid($nom, 'nom', 3, 150);
    $errors['prenom']  = $validation->textValid($prenom, 'prenom', 3, 150);
    $errors['sujet']   = $validation->textValid($sujet, 'sujet', 3, 150);
    $errors['email']   = $validation->emailValid($email);
    $errors['message'] = $validation->textValid($message, 'message', 10, 1000);

    if ($validation->IsValid($errors)) {

        $wpdb->insert(
            'contact',
            array(

                'nom'       => $nom,
                'prenom'    => $prenom,
                'sujet'     => $sujet,
                'mail'      => $email,
                'message'   => $message,
                'createdAt' => current_time('mysql')
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );
        $success = true;
        // REDIRECTION HOME
        wp_safe_redirect($redirection, $status = 302, $x_redirect_by = 'WordPress');
        exit();

    }else {
        get_404_template();
    }

}

$form = new Form($errors);


get_header(); ?>
    <style>
        .error {
            color: red;
            font-size: .8em;
        }
    </style>
<section class="container">
    <h2>Contact</h2>

    <form class="container" action="" method="post">
        <div class="form-group">
            <?php echo $form->label('nom') ?>
            <?php echo $form->input('nom') ?>
            <?php echo $form->error('nom') ?>
        </div>
        <div class="form-group">
            <?php echo $form->label('prenom') ?>
            <?php echo $form->input('prenom') ?>
            <?php echo $form->error('prenom') ?>
        </div>
        <div class="form-group">
            <?php echo $form->label('sujet'); ?>
            <?php echo $form->input('sujet'); ?>
            <?php echo $form->error('sujet'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->label('email'); ?>
            <?php echo $form->input('email'); ?>
            <?php echo $form->error('email'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->label('message'); ?>
            <?php echo $form->textarea('message'); ?>
            <?php echo $form->error('message'); ?>
        </div>

        <?php echo $form->submit(); ?>
    </form>
</section>

<?php get_footer();