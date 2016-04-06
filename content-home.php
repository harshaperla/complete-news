<?php
/**
 * @package _tk
 */
?>


<?php // Styling Tip!

// Want to wrap for example the post content in blog listings with a thin outline in Bootstrap style?
// Just add the class "panel" to the article tag here that starts below.
// Simply replace post_class() with post_class('panel') and check your site!
// Remember to do this for all content templates you want to have this,
// for example content-single.php for the post single view. ?>

<?php $my_query = new WP_Query('cat=7&posts_per_page=4');
	if ($my_query->have_posts()) { ?>
		<div class="col-md-9"><div class="main-news"><?php
			$my_query->the_post(); 
			
			if ( has_post_thumbnail() ) {
				?><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a><?php
			} ?>
			
			<div class="image-caption">
				<a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a>
				<span><?php the_category( ' ' ); ?></span>
			</div>
		</div>
		<?php
		while($my_query->have_posts()){
			$my_query->the_post(); ?>
			<div class="col-md-4"> <div class="sub-news"><?php
				if ( has_post_thumbnail() ) {
					?><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a><?php
				} ?>
				
				<div class="image-caption">
					<a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a>
					<span><?php the_category( ' ' ); ?></span>
				</div>
			</div></div><?php 
		}
		?>
		</div>
		<?php
	} ?>
	<div class="col-md-3"> <?php
	$my_query = new WP_Query('posts_per_page=8');

	while($my_query->have_posts()){
		$my_query->the_post(); 	?>
		<a href="<?php the_permalink();?>"><h2><?php the_title(); ?></h2></a> <?php

		
	}?>
	</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php _tk_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
