<?php /* Template Name: Confidentialite */

global $web; ?>


<footer class="footer">
    <nav class="navbar navbar-expand-lg">
        <!--            <a class="navbar-brand" href="-->
        <?php //echo esc_url(home_url($web['pages']['home']['slug'])) ?><!--">-->
        <!--                <img src="wp-content/themes/liji/asset/img/liji.png"  alt="">-->
        <!--            </a>-->
        <ul class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <li><a class="navbar-brand " href="<?php echo esc_url(home_url($web['pages']['confidentialite']['slug'])) ?>"
                   title="">Politique de Confidentialités</a>
            </li>

        </ul>
    </nav>
</footer>
</div><!-- fin .container -->


<?php wp_footer(); ?>

</body>
</html>