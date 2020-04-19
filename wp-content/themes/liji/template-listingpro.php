<?php /* Template Name: Listing */
session_start();

$args = array(
    'order' => 'DESC',
    'orderby' => 'date'
);
$the_query = new WP_Query($args);

get_header(); ?>

    <section class="container" id="listing-pro">
        <h1 class="text-center">Choisissez le profil qui vous correspond !</h1>
        <div class="card-deck">
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil1.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 1</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil2.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 1</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil3.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 1</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="card-deck">
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil4.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 1</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil5.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 2</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil6.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 3</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="card-deck">
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil7.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 1</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil8.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 2</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
            <div class="card">
                <img src="../wp-content/themes/liji/asset/img/profil9.jpg"  class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Profil 3</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </section>

<?php
//$args = array(
//    'order' => 'DESC',
//    'orderby' => 'date'
//);
//$the_query = new WP_Query($args);
//?>
<!---->
<?php //// The Loop
//if ($the_query->have_posts()) {
//    while ($the_query->have_posts()) {
//        $the_query->the_post(); ?>
<!--        --><?php //$image = get_the_post_thumbnail_url(get_the_ID(), 'imgsmall');
//        if (!empty($image)) { ?>
<!--            <img width="270px" src="--><?php //echo $image; ?><!--" alt="--><?//= get_the_title(); ?><!--">-->
<!--        --><?php //} ?>
<!--    --><?php //}
//}
//wp_reset_postdata();
//?>


<?php get_footer();