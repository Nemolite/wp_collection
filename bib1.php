<div class="news-blog-content">
 
  <?php 
      global $query_string; // параметры базового запроса
      query_posts( $query_string .'&posts_per_page=3' ); // базовый запрос + свои параметры 
      if( have_posts())
	  while( have_posts() ){ 
            the_post();
	  ?>
		<div class="article">  
	  <div class="article-img">
	  <a href="<?php the_permalink(); ?>">
	       <img src="<?php the_post_thumbnail_url(); ?>" alt="">
      </a>		   
	  </div> <!-- class="article-img" --> 
	  
	  <div class="article-txt">
	  <div class="article-txt-head">
	        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	  </div>  <!-- class="article-txt-head" -->
          <div class="article-txt-info">	  
	           <?php
                    $more_link_text = 'Читать далее';	  
	                the_content($more_link_text);
	           ?>
	      </div>  <!-- class="article-txt-info" --> 
	  </div>  <!-- class="article-txt" --> 
       </div>  <!-- class="article" --> 
	  <?php
	  
	  }
	 wp_reset_query(); // сброс запроса
  ?>

</div>  <!-- class="news-blog-content" --> 