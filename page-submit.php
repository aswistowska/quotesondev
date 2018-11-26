<?php
/**
 * Created by PhpStorm.
 * User: agataswistowska
 * Date: 23/11/2018
 * Time: 12:11
 */
get_header(); ?>
    <header>
<?php if( is_user_logged_in() && current_user_can( 'edit_posts' ) ): ?>

	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php endif; ?>
    </header>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if( is_user_logged_in() && current_user_can( 'edit_posts' ) ): ?>

                <div class="quote-submission-wrapper">
                    <form name="quoteForm" id="quote-submission-form">
                        <div class="form">
                            <label for="quote-author">Author of Quote</label>
                            <input type="text" name="quote_author" id="quote-author" class="quote-author">
                        </div>

                        <div class="form">
                            <label for="quote-content">Quote</label>
                            <textarea type="text" name="quote_content" id="quote-content" class="quote-content" cols="20" rows="3"></textarea>
                        </div>

                        <div class="form">
                            <label for="quote-source">Where did you find this quote?</label>
                            <input type="text" name="quote_source" id="quote-source" class="quote-source">
                        </div>

                        <div class="form">
                            <label for="quote-source-url">Provide a url source of the quote?</label>
                            <input type="text" name="quote_source_url" id="quote-source-url" class="quote-source-url">
                        </div>

                        <input id="submit-quote-button" type="submit" value="Submit Quote">

                    </form>
                </div>

			<?php else: ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>
                <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Click here to login.</a>
			<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>