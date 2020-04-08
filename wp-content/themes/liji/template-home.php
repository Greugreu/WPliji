<?php /* Template Name: Home */

get_header(); ?>

    <main class="container">
        <h1>Home</h1>
        <pre>
        <?php print_r($web['pages']); ?>
        </pre>

    </main>

<?php get_footer();