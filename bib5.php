<?php

// Это йнкция пагинации, желательно в functions.php
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Страниц ".$paged." из ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
?>

<?php 
// ---------------------------------------------
// Ставим нужное место

if (function_exists("pagination")) {
    pagination($custom_query->max_num_pages);
} 
// ----------------------------------------------
?>


 <?php 
	//-----------------------------------
     // Примерная разметка, файл стилей не приложен	
	 // обратить внимание на строку ниже
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
 			 
     $args = array(
	'posts_per_page' => 3, // вывод 5 записей
	'paged'=> $page

);
global $query_van;
$query_van = new WP_Query( $args ); 


if( $query_van->have_posts() ){
	while( $query_van->have_posts() ){
		$query_van->the_post();
	  ?>
                	<div class="content-list-block">
                        
                       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                       <p>
					   <?php
                    $more_link_text = 'Читать далее';	  
	                the_content($more_link_text);
	                    ?>
					   </p>
                      <div class="block-foot">
                      	<div class="block-foot-data">
                      		<p>Дата публикации:  <span><?php echo get_the_date(); ?></span></p>
                      	</div>
                      	<div class="block-foot-comment">
                      		<p>Комментарии:  <span>47</span></p>
                      	</div>
                      	<div class="block-foot-view">
                      		<p>Просмотров:  <span>110</span></p>
                      	</div>
                      </div>
                		
                	</div>
                	  <?php
  
	                        }
						  } 
                    else
	                   echo 'Записей нет.';
                       ?>

                	<div class="content-list-pagi">
					 <?php if (function_exists("pagination")) {
    pagination($query_van->max_num_pages);
} ?>
  <?php
 
  wp_reset_postdata(); // сброс запроса
 ?>
                    </div> 
                		
          
                </div>	

		    </div>
