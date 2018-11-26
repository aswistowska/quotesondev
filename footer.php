<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <div class="bottomMenu">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </div>
        <p>Brought to you by <a href="<?php echo esc_url( 'https://redacademy.com/' ); ?>">
                RED Academy</a></p>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
