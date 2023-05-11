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

   ?>
			
	


</div>

<?php get_footer(); ?>