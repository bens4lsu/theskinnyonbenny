<?php get_header(); ?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<table width="100%"><tr>
				<td class="alignleft"><?php previous_post_link('&laquo; %link') ?></td>
				<td class="alignright"><?php next_post_link('%link &raquo;') ?></td>
			</tr></table>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<small><?php the_time('l, F jS, Y') ?></small>


			<div class="entrytext">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

			</div>
		</div>
	<div>
	<br /><br /><br /><br /><br />
	<?php comments_template(); ?>
	</div>
	<br /><br /><br />

	<div class="navigation">
		<table width="100%"><tr>
			<td class="alignleft"><?php previous_post_link('&laquo; %link') ?></td>
			<td class="alignright"><?php next_post_link('%link &raquo;') ?></td>
		</tr></table>
	</div>

	<?php endwhile; else: ?>



		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
