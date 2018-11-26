<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */
$source     = get_post_meta( get_the_ID(), '_qod_quote_source', true );
$source_url = get_post_meta( get_the_ID(), '_qod_quote_source_url', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
    <div class="entry-meta">
        <h2 class="entry-title"><?php the_title() ?></h2>
        <span class="source">
            <?php if($source && $source_url) : ?>
                , <a href="<?php echo $source_url; ?>"><?php echo $source; ?></a>
            <?php elseif($source) : ?>
                , <?php echo $source?>
            <?php endif;?>
        </span>
    </div>
</article><!-- #post-## -->
<?php if (is_home() || is_single()): ?>
    <button type="button" id="new-quote-button">Show Me Another!</button>
<?php endif;?>