<?php get_header(); ?>

	<div id="content" class="widecolumn">

		<?php if (have_posts()) : ?>

		<div class="navigation">
			<table width="100%"><tr>
				<td class="alignleft"><?php previous_post_link('&laquo; %link') ?></td>
				<td class="alignright"><?php next_post_link('%link &raquo;') ?></td>
			</tr></table>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<div class="entry">
					<?php the_excerpt() ?>
				</div>

				<p class="postmetadata">Posted in <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<table width="100%"><tr>
				<td class="alignleft"><?php previous_post_link('&laquo; %link') ?></td>
				<td class="alignright"><?php next_post_link('%link &raquo;') ?></td>
			</tr></table>
		</div>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>