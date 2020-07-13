				<?php
$args = array(
	'posts_per_page' => 5 // выводит 5 записей
);
$query = new WP_Query( $args ); 
if( $query->have_posts() ){
	while( $query->have_posts() ){
		$query->the_post();
		?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
		<?php
	}
	wp_reset_postdata(); // сбрасываем переменную $post
} 
else
	echo 'Записей нет.';
?>