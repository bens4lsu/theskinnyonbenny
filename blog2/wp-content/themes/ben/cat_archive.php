<?php get_header(); 

function cmp($a, $b) {
    return strcmp($a->post_title, $b->post_title);
}


?>

<div id="content" class="widecolumn">

   
    <h2>Index by Category</h2>

    <?php
        $cats = get_categories('sort_column=name&optioncount=1');		
        
        if (is_array($cats) && count($cats)) { 
            
            
            foreach ($cats as $cat) { 
                echo '<h2>'.$cat->name.'</h2>';
                $posts = get_posts('category='.$cat->cat_ID.'&numberposts='.$cat->count);
                if (is_array($posts) && count($posts)) { 
                    echo  '<ul class="index_posts">';
                    usort($posts, 'cmp');
                    foreach($posts as $post) { 
                        //print_r($post);
                        echo '<li><a href="'.$post->guid.'">'.$post->post_title.'</a></li>'; 
                    }
                    echo '</ul>';
                }
            }
        }
    ?>
</div>

<?php get_footer(); ?>