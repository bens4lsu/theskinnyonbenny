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

    <?php

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
                <? } 
    ?>
			
	


</div>

<?php get_footer(); ?>