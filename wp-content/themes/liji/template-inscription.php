<?php /* Template Name: Inscription */
get_header();

$errors      = array();
$success     = false;
$redirection = esc_url(home_url($web['pages']['connexion']['slug']));

if (!empty($_POST['submitted'])) {

    // PROTECT FROM XSS
    $nom           = stripslashes(trim(strip_tags($_POST['nom'])));
    $prenom        = stripslashes(trim(strip_tags($_POST['prenom'])));
    $email          = stripslashes(trim(strip_tags($_POST['email'])));
    $password      = stripslashes(trim(strip_tags($_POST['password'])));
    $entreprise    = stripslashes(trim(strip_tags($_POST['entreprise'])));
    $adresse       = stripslashes(trim(strip_tags($_POST['adresse'])));
    $statut        = stripslashes(trim(strip_tags($_POST['statut'])));
    $telephone     = stripslashes(trim(strip_tags($_POST['telephone'])));
    $siret         = stripslashes(trim(strip_tags($_POST['siret'])));
    $tarif         = stripslashes(trim(strip_tags($_POST['tarif'])));
    $places        = stripslashes(trim(strip_tags($_POST['places'])));

    // VALIDATION CHAMPS
    $validation = new Validation();


    $errors['nom']           = $validation->textValid($nom, 'nom', 3, 150);
    $errors['prenom']        = $validation->textValid($prenom, 'prenom', 3, 150);
    $errors['email']         = $validation->emailValid($email);
    $errors['password']      = $validation->passwordValid($password);
    $errors['entreprise']    = $validation->textValid($entreprise, 'entreprise', 3, 150);
    $errors['adresse']       = $validation->textValid($adresse, 'adresse', 3, 150);
    $errors['statut']        = $validation->textValid($statut, 'statut', 3, 150);
    $errors['telephone']     = $validation->numericValid($telephone,'telephone', 10, 10);
    $errors['siret']         = $validation->numericValid($siret, 'siret', 14, 14);
    $errors['tarif']         = $validation->textValid($tarif, 'tarif',0,5);
    $errors['places']        = $validation->numericValid($places, 'places', 0, 150);


    if ($validation->IsValid($errors)) {

        $wpdb->insert(
            'pro',
            array(
                'nom'           => $nom,
                'prenom'        => $prenom,
                'nomEntreprise' => $entreprise,
                'adresse'       => $adresse,
                'statut'        => $statut,
                'mail'          => $email,
                'telephone'     => $telephone,
                'siret'         => $siret,
                'tarif'         => $tarif,
                'places'        => $places,
                'password'      => $password,
                'createdAt'     => current_time('mysql')
            ),
            array(
                '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d', '%d', '%s'
            )
        );
        $success = true;
        // REDIRECTION CONNEXION
        wp_safe_redirect($redirection, $status = 302, $x_redirect_by = 'WordPress');
        exit();
    }
}

$form = new Form($errors);

get_header(); ?>

    <section class="container">
        <h2>Inscription</h2>
        <form class="container" action="" method="post">
            <div class="form-group">
                <?php echo $form->label('nom','nom') ?>
                <?php echo $form->input('text','nom','Juan') ?>
                <?php echo $form->error('nom') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('prenom','prenom') ?>
                <?php echo $form->input('text','prenom','Deacoy') ?>
                <?php echo $form->error('prenom') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('email','email'); ?>
                <?php echo $form->input('email','email','juan@deacoy.fr'); ?>
                <?php echo $form->error('email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('mot de passe','password'); ?>
                <?php echo $form->input('password','password',''); ?>
                <?php echo $form->error('password'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('entreprise','entreprise') ?>
                <?php echo $form->input('text','entreprise','') ?>
                <?php echo $form->error('entreprise') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('adresse','adresse') ?>
                <?php echo $form->input('text','adresse','') ?>
                <?php echo $form->error('adresse') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('statut','statut') ?>
                <?php echo $form->input('text','statut','') ?>
                <?php echo $form->error('statut') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('telephone','telephone'); ?>
                <?php echo $form->input('text','telephone',''); ?>
                <?php echo $form->error('telephone'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('siret','siret'); ?>
                <?php echo $form->input('text','siret',''); ?>
                <?php echo $form->error('siret'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('tarif','tarif'); ?>
                <?php echo $form->input('text','tarif',''); ?>
                <?php echo $form->error('tarif'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('places','places'); ?>
                <?php echo $form->input('text','places',''); ?>
                <?php echo $form->error('places'); ?>
            </div>
            <?php echo $form->submit('submitted','Envoyez'); ?>
        </form>
    </section>

<?php get_footer();
