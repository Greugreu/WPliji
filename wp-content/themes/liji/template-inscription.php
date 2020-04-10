<?php /* Template Name: Inscription */

get_header();

$errors = array();
$success = false;
$redirection = esc_url(home_url($web['pages']['connexion']['slug']));

if (!empty($_POST['submitted'])) {

    // PROTECT FROM XSS
    $nom         = stripslashes(trim(strip_tags($_POST['nom'])));
    $prenom      = stripslashes(trim(strip_tags($_POST['prenom'])));
    $entreprise  = stripslashes(trim(strip_tags($_POST['entreprise'])));
    $adresse     = stripslashes(trim(strip_tags($_POST['adresse'])));
    $codePostal  = stripslashes(trim(strip_tags($_POST['codepostal'])));
    $ville       = stripslashes(trim(strip_tags($_POST['ville'])));
    $email       = stripslashes(trim(strip_tags($_POST['email'])));
    $password    = stripslashes(trim(strip_tags($_POST['password'])));
    $statut      = stripslashes(trim(strip_tags($_POST['statut'])));
    $telephone   = stripslashes(trim(strip_tags($_POST['telephone'])));
    $siret       = stripslashes(trim(strip_tags($_POST['siret'])));
    $tarif       = stripslashes(trim(strip_tags($_POST['tarif'])));
    $places      = stripslashes(trim(strip_tags($_POST['places'])));

    // VALIDATION CHAMPS
    $validation = new Validation();


    $errors['nom']        = $validation->textValid($nom, 'nom', 3, 150);
    $errors['prenom']     = $validation->textValid($prenom, 'prenom', 3, 150);
    $errors['entreprise'] = $validation->textValid($entreprise, 'entreprise', 3, 150);
    $errors['adresse']    = $validation->textValid($adresse, 'adresse', 3, 150);
    $errors['postal']     = $validation->textValid($adresse, 'postal', 3, 150);
    $errors['ville']      = $validation->textValid($adresse, 'ville', 3, 150);
    $errors['email']      = $validation->emailValid($email);
    $errors['password']   = $validation->textValid($password,'password','6','20');
    $errors['statut']     = $validation->textValid($statut, 'statut', 3, 150);
    $errors['telephone']  = $validation->numericValid($telephone, 'telephone', 10, 10);
    $errors['siret']      = $validation->numericValid($siret, 'siret', 14, 14);
    $errors['tarif']      = $validation->textValid($tarif, 'tarif', 0, 5);
    $errors['places']     = $validation->numericValid($places, 'places', 0, 150);


    if ($validation->IsValid($errors)) {
        $hashpassword = wp_hash_password($password);
        $wpdb->insert(
            'pro',
            array(
                'nom'           => $nom,
                'prenom'        => $prenom,
                'nomEntreprise' => $entreprise,
                'adresse'       => $adresse,
                'postal'        => $codePostal,
                'ville'         => $ville,
                'statut'        => $statut,
                'mail'          => $email,
                'telephone'     => $telephone,
                'siret'         => $siret,
                'tarif'         => $tarif,
                'password'      => $hashpassword,
                'createdAt'     => current_time('mysql'),
                'places'        => $places

            ),
            array(
                '%s', '%s', '%s', '%s', '%d', '%s', '%s', '%s', '%d', '%d', '%d','%s','%d'
            )
        );
        $success = true;
        // REDIRECTION CONNEXION
        wp_safe_redirect($redirection, $status = 302, $x_redirect_by = 'WordPress');
        exit();
    }
}
//use inc\service\Form;
$form = new Form($errors);

get_header(); ?>
<?php if ($success) { ?>
    <h2 class="success">Merci de votre inscription</h2>
<?php } else { ?>
    <section class="container">
        <h2>Contact</h2>
        <form class="container" action="" method="post">
            <div class="form-group">
                <?php echo $form->label('nom'); ?>
                <?php echo $form->input('text','nom') ;?>
                <?php echo $form->error('nom'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('prenom'); ?>
                <?php echo $form->input('text','prenom'); ?>
                <?php echo $form->error('prenom'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('entreprise'); ?>
                <?php echo $form->input('text', 'entreprise'); ?>
                <?php echo $form->error('entreprise'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('adresse');?>
                <?php echo $form->input('text', 'adresse');?>
                <?php echo $form->error('adresse'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('code postal');?>
                <?php echo $form->input('text', 'codepostal');?>
                <?php echo $form->error('postal'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('ville');?>
                <?php echo $form->input('text', 'ville');?>
                <?php echo $form->error('ville'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('statut'); ?>
                <?php echo $form->input('text', 'statut'); ?>
                <?php echo $form->error('statut'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('email'); ?>
                <?php echo $form->input('email','email'); ?>
                <?php echo $form->error('email'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('telephone'); ?>
                <?php echo $form->input('text', 'telephone'); ?>
                <?php echo $form->error('telephone'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('siret'); ?>
                <?php echo $form->input('text', 'siret'); ?>
                <?php echo $form->error('siret'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('tarif'); ?>
                <?php echo $form->input('text', 'tarif'); ?>
                <?php echo $form->error('tarif'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('mot de passe'); ?>
                <?php echo $form->input('password','password'); ?>
                <?php echo $form->error('password'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->label('places'); ?>
                <?php echo $form->input('text', 'places'); ?>
                <?php echo $form->error('places'); ?>
            </div>
            <?php echo $form->submit(); ?>
        </form>
    </section>
<?php } ?>
<?php get_footer();
