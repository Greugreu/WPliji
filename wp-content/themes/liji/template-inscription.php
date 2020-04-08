<?php /* Template Name: Inscription */
get_header();

$errors      = array();
$success     = false;
$redirection = esc_url(home_url($web['pages']['connexion']['slug']));

if (!empty($_POST['submitted'])) {

    // PROTECT FROM XSS
    $nom           = stripslashes(trim(strip_tags($_POST['nom'])));
    $prenom        = stripslashes(trim(strip_tags($_POST['prenom'])));
    $nomEntreprise = stripslashes(trim(strip_tags($_POST['entreprise'])));
    $adresse       = stripslashes(trim(strip_tags($_POST['adresse'])));
    $statut        = stripslashes(trim(strip_tags($_POST['statut'])));
    $mail          = stripslashes(trim(strip_tags($_POST['mail'])));
    $telephone     = stripslashes(trim(strip_tags($_POST['telephone'])));
    $siret         = stripslashes(trim(strip_tags(is_numeric($_POST['siret']))));
    $tarif         = stripslashes(trim(strip_tags($_POST['tarif'])));
    $places        = stripslashes(trim(strip_tags($_POST['places'])));

    // VALIDATION CHAMPS
    $validation = new Validation();


    $errors['nom']           = $validation->textValid($nom, 'nom', 3, 150);
    $errors['prenom']        = $validation->textValid($prenom, 'prenom', 3, 150);
    $errors['nomEntreprise'] = $validation->textValid($nomEntreprise, 'entreprise', 3, 150);
    $errors['adresse']       = $validation->textValid($adresse, 'adresse', 3, 150);
    $errors['statut']        = $validation->textValid($statut, 'statut', 3, 150);
    $errors['mail']          = $validation->emailValid($mail);
    $errors['telephone']     = $validation->textValid($telephone, 'telephone', 10, 10);
    $errors['siret']         = $validation->textValid($siret, 'siret', 14, 14);
    $errors['tarif']         = $validation->textValid($tarif, 'tarif',0,5);
    $errors['places']        = $validation->textValid($places, 'places', 0, 150);


    if ($validation->IsValid($errors)) {

        $wpdb->insert(
            'pro',
            array(

                'nom'           => $nom,
                'prenom'        => $prenom,
                'nomEntreprise' => $nomEntreprise,
                'adresse'       => $adresse,
                'statut'        => $statut,
                'mail'          => $mail,
                'telephone'     => $telephone,
                'siret'         => $siret,
                'tarif'         => $tarif,
                'places'        => $places,
                'createdAt'     => current_time('mysql')
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
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
                <?php echo $form->label('entreprise') ?>
                <?php echo $form->input('entreprise') ?>
                <?php echo $form->error('entreprise') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('adresse') ?>
                <?php echo $form->input('adresse') ?>
                <?php echo $form->error('adresse') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('statut') ?>
                <?php echo $form->input('statut') ?>
                <?php echo $form->error('statut') ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('mail'); ?>
                <?php echo $form->input('mail'); ?>
                <?php echo $form->error('mail'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('telephone'); ?>
                <?php echo $form->input('telephone'); ?>
                <?php echo $form->error('telephone'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('siret'); ?>
                <?php echo $form->input('siret'); ?>
                <?php echo $form->error('siret'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('tarif'); ?>
                <?php echo $form->input('tarif'); ?>
                <?php echo $form->error('tarif'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('places'); ?>
                <?php echo $form->input('places'); ?>
                <?php echo $form->error('places'); ?>
            </div>
            <?php echo $form->submit(); ?>
        </form>
    </section>

<?php get_footer();
