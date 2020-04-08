<?php
/**
 * Register a custom menu page.
 */
function wpdocs_register_my_contact_menu_page(){
    add_menu_page(
        __( 'Contact', 'wonder' ),
        'Contact',
        'manage_options',
        'contactpageadmin',
        'contact_menu_page',
        'dashicons-email-alt2',
        56
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_contact_menu_page' );

/**
 * Display a custom menu page
 */
function contact_menu_page(){
    $urlBase = admin_url().'admin.php?page=contactpageadmin';
    ?>
    <ul>
        <li><a class="button" href="<?= $urlBase; ?>">Listing</a></li>
    </ul>
    <?php
    if(!empty($_GET['single']) && is_numeric($_GET['single'])) {
        $id = $_GET['single'];
        contact_admin_single($id,$urlBase);
    } else {
        contact_admin_listing($urlBase);
    }
}


function contact_admin_listing($urlBase)
{
    global $wpdb;
    $contacts = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}contact ORDER BY created_at DESC", OBJECT );
    ?>
    <div class="wrap">
        <table class="wp-list-table widefat fixed striped posts">
            <thead>
            <tr>
                <th>id</th>
                <th>sujet</th>
                <th>email</th>
                <th>message</th>
                <th>date</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody id="the-list">
            <?php foreach ($contacts as $contact) { ?>
                <tr>
                    <td><?= $contact->id; ?></td>
                    <td><?= $contact->sujet; ?></td>
                    <td><?= $contact->email; ?></td>
                    <td><?= $contact->message; ?></td>
                    <td><?= date('d/m/Y',strtotime($contact->created_at)); ?></td>
                    <td>
                        <a href="<?= $urlBase; ?>&single=<?= $contact->id; ?>">voir</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}

function contact_admin_single($id,$urlBase)
{
    global $wpdb;
    $contact = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}contact WHERE id = $id" , OBJECT );
    ?>
    <p>id: <?= $contact->id; ?></p>
    <p>sujet: <?= $contact->sujet; ?></p>
    <p>email: <?= $contact->email; ?></p>
    <p>Message: <?= $contact->message; ?></p>
    <p>Date: <?= date('d/m/Y',strtotime($contact->created_at)); ?></p>
    <?php
}