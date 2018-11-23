<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
                <div class="bottomMenu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </div>
				<div class="site-info">
					Brought to you by Agata Swistowska <a href="<?php echo esc_url( 'https://redacademy.com/' ); ?>">
                        RED Academy
                    </a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
