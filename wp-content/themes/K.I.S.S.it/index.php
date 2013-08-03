<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package K.I.S.S.it
 * @since K.I.S.S.it 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
            <?php if(have_posts()): ?>
                <?php k_i_s_s_it_content_nav( 'nav-above' ); ?>
                <?php while(have_posts()) : the_post(); ?>
                    <?php
                        /**
                         * include the Post-Format-specific template for the content
                         * if you want to overlook this in a child theme then include a file
                         * called content-__.php (where __ is the Post Format name) and that will be used instead
                         */
                         get_template_part('content', get_post_format());
                    ?>
                <?php endwhile; ?>
                <?php k_i_s_s_it_content_nav( 'nav-below' ); ?>
                <?php else : ?>
                    <?php get_template_part( 'no-results', 'index' ); ?>
            <?php endif; ?>
		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>