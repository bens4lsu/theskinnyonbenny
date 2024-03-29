<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php 

query_posts($query_string . "&order=DESC") ;
print_r($query_string);
if (have_posts()) : ?>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('');
					      					      $out = "<p style=\"text-align:right;\"><a href=\"". get_permalink() . "#more-$id\">Read On...</a></p>";					      echo $out;
					?>
				</div>

				<!--<p class="postmetadata">Posted in <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p> -->
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<table width="100%"><tr><td class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></td><td>
			<td class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></td></tr></table>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
