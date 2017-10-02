<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */ 

get_header(); ?>

	<header id="header" class="row">
		<?php get_template_part( 'template/parts/header/content', 'page' ); ?>
		<article>
			<div class="container" id="banner">
				<div class="col-xs-6 col-xs-offset-3 col-sm-8 col-sm-offset-4 col-md-7 col-md-offset-0">
					<img src="<?php echo get_home_url(); ?>/img/personaje-400x353.png" class="img-responsive">
				</div>
				<div id="banner-text" class="col-xs-12 col-sm-12 col-md-5">
					<img src="<?php echo get_home_url(); ?>/img/kmibox-grandpet-400x97.png" class="img-responsive">
					<h2>Una cajita mensual llena de sorpresas para tu mascota</h2>
					<br>	
					<a href="<?php echo get_home_url(); ?>/quiero-mi-kmibox/?source=<?php echo get_source_url(); ?>" class="btn-kmibox">Quiero mi kmiBOX</a>	
				</div>
				<div class="col-xs-12 col-sm-6 hidden" id="banner-dog">
					<img src="<?php echo get_home_url(); ?>/img/logo-120x35.png" class="img-responsive">
				</div>
			</div>			
		</article>
	</header>

	<section id='section-comment' class="row text-center ">
		<div class="container">
			<h2>¡Regálale un detalle al consentido de tu hogar!</h2>
		</div>
	</section>

	<section id="como-funciona" class="row text-center">
		<div class="container">
			<h2>¿Como funciona?</h2>
			<article class="col-sm-12 col-md-5 col-sm-offset-1">
				<img src="<?php echo get_home_url(); ?>/img/gato.png" class="img-responsive" width="500px">
				<p>
					Cada mes preparamos una caja especial para tu consentido con juguetes, snacks y productos sorpresa
				</p>
			</article>
			<article class="col-sm-12 col-md-5">
				<img src="<?php echo get_home_url(); ?>/img/camion.png" class="img-responsive" width="500px">
				<p>
					Enviamos mensualmente una
					kmiBOX a tu hogar. Las cajas son
					enviadas al final de cada mes. Tu
					peludo disfrutará mucho!
				</p>
			</article>
		</div>			
	</section>

	<section class="row back-picture"></section>

	<section id="contenido-kmibox" class="row text-center">
		<div class="container">
			<h2>¿Qué lleva dentro una <img src="<?php echo get_home_url(); ?>/img/logo-text-kmibox.png" class="logo-text-kmibox"> ?</h2>
			<article class="col-sm-12">
				<img src="<?php echo get_home_url(); ?>/img/Caja.png" class="img-responsive" width="100%">
			</article>
			<p class="col-xs-12">Todos los artículos de la <img src="<?php echo get_home_url(); ?>/img/logo-text-kmibox.png" class="logo-text-kmibox"> son suministrados por <img src="<?php echo get_home_url(); ?>/img/Gran pet 1.png" class="logo-text-kmibox img-center" width="16%"></p>
		</div>
	</section>

	<section id="como-consigo-kmibox" class="row back-kmibox text-center">
		<div class="container">
			<h2>¿Cómo consigo mi <img src="<?php echo get_home_url(); ?>/img/logo-text-white.png" class="logo-text" width="20%"> ?</h2>
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="row">
					<article class="col-sm-12 col-md-6">
						<img src="<?php echo get_home_url(); ?>/img/icono-3.png" class="img-responsive" width="300px">
						<p class="progress-text">
							<span>Elige</span> el tamaño de
							tu consentido
						</p>
					</article>		
					<article class="col-sm-12 col-md-6">
						<img src="<?php echo get_home_url(); ?>/img/icono-4.png" class="img-responsive" width="300px">
						<p class="progress-text">
							<span>Selecciona </span>el
							valor de kmibox
						</p>
					</article>		
				</div>
				<div class="row">
					<article class="col-sm-12 col-md-6">
						<img src="<?php echo get_home_url(); ?>/img/icono-5.png" class="img-responsive" width="300px">
						<p class="progress-text">
							<span>Añade</span> un artículo
							especial 
						</p>
					</article>		

					<article class="col-sm-12 col-md-6">
						<img src="<?php echo get_home_url(); ?>/img/icono-6.png" class="img-responsive" width="300px">
						<p class="progress-text">
							<span>Recibe</span> tu kmiBOX
						</p>
					</article>		
				</div>
			</div>
		</div>
	</section>

	<section id="contenido-kmibox" class="row text-center section-red">
		<div class="container">
			<h2 class="h-3x">LLÉVATELA AHORA MISMO POR</h2>
			<article class="col-xs-12 col-md-3">
				<img src="<?php echo get_home_url(); ?>/img/Peronaje 3.png" class="img-responsive" width="85%">
			</article>

			<article class="col-xs-12 col-md-3">
				<a href="<?php echo get_permalink(); ?>/quiero-mi-kmibox/?tipo=Chica&source=<?php echo (array_key_exists('source', $_GET))? $_GET['source'] : '' ; ?>">
					<img src="<?php echo get_home_url(); ?>/img/Precio 1.png" class="img-responsive">
				</a>
			</article>
			<article class="col-xs-12 col-md-3">
				<a href="<?php echo get_permalink(); ?>/quiero-mi-kmibox/?tipo=Grande&source=<?php echo (array_key_exists('source', $_GET))? $_GET['source'] : '' ; ?>">
					<img src="<?php echo get_home_url(); ?>/img/Precio 2.png" class="img-responsive">
				</a>
			</article>

			<article class="col-xs-12 col-md-3">
				<img src="<?php echo get_home_url(); ?>/img/Personaje 2.png" class="img-responsive" width="85%">
			</article>

			<article class="col-xs-12">		
				<h2 class="subtitle" style="font-weight: normal;">PESOS MENSUALES*</h2>
				<h3 class="subtitle">*Costo mensual. Aplica para suscripciones trimestral, semestral y anual</h3>
			</article>
		</div>
	</section>

	<section class="row text-center">
		<div class="container">
			<h2>¡Regálasela a un amigo o un familiar!</h2>
			<div class="col-sm-12">
				<img src="<?php echo get_home_url(); ?>/img/Elemento.png" id="regalo" class="img-responsive" >
			</div>
			<p>¡No pierdas la oportunidad de hacer feliz al perrhijo de cualquiera de tus amigos o
				familiares! Regala una suscripción de la kmiBOX y nosotros la haremos llegar mes con
				mes a ese peludito especial</p>
			<br>	
			<br>	
			<a href="<?php echo get_permalink(); ?>/quiero-mi-kmibox/?source=<?php echo (array_key_exists('source', $_GET))? $_GET['source'] : '' ; ?>" class="btn-kmibox">Quiero mi kmiBOX</a>	
		</div>
	</section>
	<br>
	<br>


	<?php get_template_part( 'template/parts/footer/footer', 'page' ); ?>

<?php get_footer();

 