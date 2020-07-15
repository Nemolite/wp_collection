<?php
/*
Template Name: Документы 
Template Post Type: post, page, product
*/
// вышестоящее комментарии строго обязательны
// Слово "Документ" - будут показан в спике шаблонов в редакторе страниц
get_header();
?>
<div class="nmenu">
			<div class="nmenu-logo">
				<a href="<?php echo get_home_url(); ?>">
         <h1>ЛОГОТИП</h1>
		</a> 
			</div>
		</div> <!-- class="nmenu"-->
	<main id="primary" class="site-main site-main-fix">

		<?php
		while ( have_posts() ) :
			the_post();
            // можно конечно подключить и шаблон
            // например как то так
            // get_template_part( 'template-parts/content-v', get_post_type() );
			// при этом шаблон в виде content-v.php должен быть в директории
			// template-parts
            // или
            // get_template_part( 'template-parts/content', 'page' );
            // content-page.php ->  template-parts
            // там в шаблоне можно и разметку править  			
			the_title('<h1 class="entry-title-fix">', '</h1>');
			the_content();
			// сам контент можно стилизовать и украсить в редакторе панеля управления

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
