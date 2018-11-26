<?php
/**
 * Created by PhpStorm.
 * User: agataswistowska
 * Date: 22/11/2018
 * Time: 11:23
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <section class="author">
                <h2>Quote Authors</h2>
                <ul class="archive-lists">
		            <?php
		            $posts = get_posts( 'posts_per_page=-1' );
		            foreach( $posts as $post ) : setup_postdata( $post );
			            ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		            <?php endforeach; wp_reset_postdata(); ?>
                </ul>
            </section>
            <section class="categorise">
                <h2>Categories</h2>
                <ul class="archive-lists">
		            <?php wp_list_categories('title_li='); ?>
                </ul>
            </section>
            <section class="tags">
                <h2>Tags</h2>
	            <?php wp_tag_cloud( array(
		            'smallest' => 1,
		            'largest' => 1,
		            'unit' => 'rem',
		            'format' => 'list'
	            )); ?>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>