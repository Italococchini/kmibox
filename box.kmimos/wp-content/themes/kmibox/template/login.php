<?php
/* 
 *
 * Template Name: login
 *
 */
get_header(); 

?>
<header class="row">
	<?php get_template_part( 'template/parts/header/content', 'page' ); ?>
</header>
<section class="container">

	<?php if ( !is_user_logged_in() ){ ?>
		<input type="hidden" name="redirect" value="<?php echo get_home_url().'/perfil-usuario'; ?>">
		<?php get_template_part( 'template/parts/page/login', 'page' ); ?>
	<?php } ?>

</section>
<?php get_template_part( 'template/parts/footer/footer', 'page' ); ?>

<?php get_footer(); ?>

<?php if ( is_user_logged_in() ){ ?>
<script type="text/javascript">
	$(function($){
		window.location = urlbase + '/perfil-usuario';
	});
</script>
<?php } ?>

