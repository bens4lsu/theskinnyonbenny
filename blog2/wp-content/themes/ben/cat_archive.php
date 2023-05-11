<?php get_header(); ?>

<div id="content" class="widecolumn">

   
    <h2>Index by Category</h2>

    <?php
        $cats = get_categories('sort_column=name&optioncount=1');		
        
        if (is_array($cats) && count($cats)) { 
            
            
            foreach ($cats as $cat) { 
                print_r($cat);
                echo '<h2>'.$cat->name.'</h2>';
                $posts = get_posts('category='.$cat->cat_ID.'&numberposts='.$cat->count);
                if (is_array($posts) && count($posts)) { 
                    echo  '<ul class="index_posts">';
                    foreach($posts as $post) { 
                        //$author = get_userdata($post->post_author);
                        echo '<li><a href="'.the_permalink().'">'.the_title().'</a></li>'; 
                    }
                }
            }
        }
    ?>
</div>

<?php get_footer(); ?>