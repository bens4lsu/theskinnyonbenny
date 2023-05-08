<?php get_header(); ?>

<div id="content" class="widecolumn">

<?php
	$page_id = (integer)$_GET['page_id'];
	$baseURL = '/blog2/cat_archives?';
 	$sortby = "categories"; 
	if (isset($_GET['sortby'])) $sortby = $_GET['sortby'];
	$nbSumupChars = 200;
?>      


			<h2>Blog Index</h2>
			<!--  Can use this to show an index by date and by tag also
			
			<div id="index_navigation">
					<p class="index_navigation_left">
						<span>Sort by: </span>
						<a href="<?=$baseURL?>sortby=categories" <?=$sortby == "categories" ? 'class="selected"' : ''?> >Categories</a>
						<a href="<?=$baseURL?>sortby=tags" <?=$sortby == "tags" ? 'class="selected"' : ''?>>Tags</a>
						<a href="<?=$baseURL?>sortby=months" <?=$sortby == "months" ? 'class="selected"' : ''?>>Date</a>
					</p>
					<? if (isset($SnazzyArchives)) { ?>
						<p class="index_navigation_right">
							<span>View the </span>
							<a href="<?=$baseURL?>sortby=timeline" <?=$sortby == "timeline" ? 'class="selected"' : ''?>>Timeline</a>
						</p>
					<? } ?>
			</div>   -->
			<?php
				switch ($sortby) {
					case "categories":
						$subBaseURL = $baseURL."sortby=categories&category_id=";
						$category_id = $_GET["category_id"];
						$cats = get_categories('sort_column=name&optioncount=1');		
						if (is_array($cats) && count($cats)) { ?>
							<p class="index_expand">
								<a title="Expand all posts by categories" href="<?=$subBaseURL?>all">Expand all</a>
							</p>
							<ul class="index">
								<?php foreach ($cats as $cat) { ?>
									<li id="cat-<?=$cat->cat_ID?>" class="cat-item">
										<a title="View all posts filed under <?=$cat->name?>" href="<?=$subBaseURL.$cat->cat_ID?>#cat-<?=$cat->cat_ID?>"><?=$cat->name?></a> <span>(<?=$cat->count?>)</span>
									</li>
									<? if ($category_id == $cat->cat_ID || $category_id == "all") {
										global $post;
										$posts = get_posts('category='.$cat->cat_ID.'&numberposts='.$cat->count);
										if (is_array($posts) && count($posts)) { ?>
											<ul class="index_posts">
									 			<? foreach($posts as $post) { 
													$author = get_userdata($post->post_author); ?>
									    			<li>
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> by <?=$author->first_name?> <?=$author->last_name?> 
														<p>
															<?=substr(strip_tags($post->post_content), 0, $nbSumupChars)?><?=strlen($post->post_content)>$nbSumupChars ? "..." : ""?>
														</p>
													</li>
									 				<? } ?>
									 		</ul>
										<? } ?>
									<? } ?>
								<? } ?>
							</ul>
						<? } ?>
					<?php break;
					case "tags":
						$subBaseURL = $baseURL."sortby=tags&tag_id=";
						$tag_id = $_GET["tag_id"];
						$tags = get_tags('get=all&optioncount=1');
						if (is_array($tags) && count($tags)) { ?>
							<p class="index_expand">
								<a title="Expand all posts by tags" href="<?=$subBaseURL?>all">Expand all</a>
							</p>
							<ul class="index">
									<?php foreach ($tags as $tag) { ?>
										<li id="tag-<?=$tag->term_taxonomy_id?>" class="tag-item">
											<a title="View all posts tagged with <?=$tag->name?>" href="<?=$subBaseURL.$tag->term_taxonomy_id?>#tag-<?=$tag->term_taxonomy_id?>"><?=$tag->name?></a> <span>(<?=$tag->count?>)</span>
										</li>
										<? if ($tag_id == $tag->term_taxonomy_id || $tag_id == "all") {
											global $post;
											$posts = get_posts('tag='.$tag->slug.'&numberposts='.$tag->count);
											if (is_array($posts) && count($posts)) { ?>
												<ul class="index_posts">
										 			<? foreach($posts as $post) { 
														$author = get_userdata($post->post_author); ?>
										    			<li>
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> by <?=$author->first_name?> <?=$author->last_name?> 
															<p>
																<?=substr(strip_tags($post->post_content), 0, $nbSumupChars)?><?=strlen($post->post_content)>$nbSumupChars ? "..." : ""?>
															</p>
														</li>
										 				<? } ?>
										 		</ul>
											<? } ?>
										<? } ?>
									<? } ?>
							</ul>
						<? } ?>
					<?php break;
					case "months":
						global $wp_locale;
						$months = get_months_index();
						$subBaseURL = $baseURL."sortby=months&month_id=";
						$month_id = $_GET["month_id"];
						if (is_array($months) && count($months)) { ?>
							<p class="index_expand">
								<a title="Expand all posts by month of publication" href="<?=$subBaseURL?>all">Expand all</a>
							</p>
							<ul class="index">
								<?php foreach ($months as $month) { ?>
									<li id="month-<?=$month->year?>-<?=$month->month?>" class="month-item">
										<a title="View all posts from <?=$wp_locale->get_month($month->month)?> <?=$month->year?>"  href="<?=$subBaseURL.$month->year?>-<?=$month->month?>#month-<?=$month->year?>-<?=$month->month?>">
											<?=$wp_locale->get_month($month->month)?> <?=$month->year?>
										 </a> <span>(<?=$month->count?>)</span>
									</li>			
									<? if ($month_id == $month->year."-".$month->month || $month_id == "all") {
										global $post;
										$endMonth = (integer)$month->month;
										$endYear = (integer)$month->year;
										if ($endMonth != 12) 
											$endMonth++;
										else $endYear++;
										$beginDate = $month->year.'-'.$month->month.'-1';
										$endDate = $endYear.'-'.$endMonth.'-1';
										$posts = get_posts_months_index($beginDate, $endDate);
										if (is_array($posts) && count($posts)) { ?>
											<ul class="index_posts">
									 			<? foreach($posts as $post) { 
													$author = get_userdata($post->post_author); ?>
									    			<li>
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> by <?=$author->first_name?> <?=$author->last_name?> 
														<p>
															<?=substr(strip_tags($post->post_content), 0, $nbSumupChars)?><?=strlen($post->post_content)>$nbSumupChars ? "..." : ""?>
														</p>
													</li>
									 			<? } ?>
									 		</ul>
										<? } ?>
									<? } ?>
								<? } ?>
							</ul>
						<? }
					break;
					case "timeline":
						if (isset($SnazzyArchives)) echo $SnazzyArchives->display();
					break;
				}
			?>
			
	


</div>

<?php get_footer(); ?>