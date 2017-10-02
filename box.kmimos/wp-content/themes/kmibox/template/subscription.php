<?php
/* 
 *
 * Template Name: purchase 
 *
 */

get_header(); 

// Reset Session
km_session_reset();

get_template_part( 'template/parts/header/suscription', 'page' ); 

?>

<section id="group-purchase" class="purchase">
	<!-- Fase #1 Tamaño -->
	<section 
		data-fase="1" 
		data-title="Selecciona el tamaño de tu perrhijo" 
		data-subtitle="" 
		data-msg-color="#00D8B5"
		data-msg ="Todos los articulos de la <img src='<?php echo get_home_url(); ?>/img/logo-text-kmibox.png' > son suministrados por:"
		class="container purchase animated" >
	</section>
	
	<!-- Fase #2 Producto -->
	<section 
		data-fase="2" 
		data-title="Elige el tipo de <img src='<?php echo get_home_url(); ?>/img/logo-text-white.png' width='7%' >" 
		data-subtitle="" 
		data-msg-color="#00D8B5"
		data-msg ="Todos los articulos de la <img src='<?php echo get_home_url(); ?>/img/logo-text-kmibox.png' > son suministrados por:"
		class="container purchase hidden animated">
	</section>

	<!-- Fase #3 Plan -->
	<section 
		data-fase="3"
		class="container purchase hidden animated"
		data-title="Selecciona tu plan <img src='<?php echo get_home_url(); ?>/img/logo-text-white.png' width='7%' >" 
		data-subtitle="" 
		data-msg-color="#c16363"
		data-msg ="*Descuento en comparación con el precio unitario o mensual">
 	</section>

	<!-- Fase #4 Extras -->
	<section 
		data-fase="4" 
		class="container purchase hidden animated "
		data-title ="Agrega un artículo especial"
		data-subtitle="Da click sobre el producto para agregar "
		data-msg-color="#c16363"
		data-msg ="">
		<div class="col-sm-12 ">
			<div class="row" id="content-extra">
				<article id="f4-slider-prev" class="col-md-1 col-md-offset-1 text-center vertical-center">
					<i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
				</article>

				<article id="f4-slider-item1" 
					class="hidden-xs hidden-sm col-md-1 text-center vertical-center">
					<img src=""  class="img-responsive" width="300px">
				</article>
				<article id="f4-slider-item2" 
					class="hidden-xs hidden-sm col-md-2 text-center vertical-center">
					<img src=""  class="img-responsive" width="300px">
				</article>

				<article id="f4-slider-item3" data-target="add"
					class="col-xs-12 col-sm-12 col-md-4 text-center vertical-center">
					<img src=""  class="" height="300px" width="300px">
				</article>

				<article id="f4-slider-item4" 
					class="hidden-xs hidden-sm col-md-2 text-center vertical-center">
					<img src=""  class="img-responsive" width="300px">
				</article>
				<article id="f4-slider-item5" 
					class="hidden-xs hidden-sm col-md-1 text-center vertical-center">
					<img src=""  class="img-responsive" width="300px">
				</article>



				<article id="f4-slider-next" class="col-md-1 text-center vertical-center">
					<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
				</article>
			</div>
			<div class="row text-center extra-detalle">
				<h2 id="extra-price"></h2>
				<h3 id="extra-name"></h3>
				<button
					data-action="next"
					data-target="4"
					class="btn btn-sm-kmibox">Continuar</button>
			</div>
		</div>
	</section>

	<!-- Fase #5 Resumen de Compras -->
	<section 
		data-fase="5" 
		class="container purchase hidden animated "
		data-title ="Resumen de compras"
		data-subtitle=""
		data-msg-color="transparent"
		data-msg ="">
		<article class="col-md-12">
			<div class="row">
				<div class="col-xs-12 col-md-12 hidden alert alert-danger alert-dismissible fade in" role="alert" id="cart-content-alerta">
					<span id="cart-alerta"></span>
				</div>
			</div>
			<header class="row">
				<article class="col-md-2">Producto</article>
				<article class="col-md-4 hidden-xs ">Descripci&oacute;n</article>
				<article class="col-md-2 hidden-xs ">Precio unitario</article>
				<article class="col-md-2 hidden-xs ">Cantidad</article>
				<article class="col-md-2 hidden-xs ">Total</article>
			</header>
			<section id="cart-items" class="row"></section>
			<aside id="totales" class="row">
				<div class="col-xs-12 col-md-6 pull-right">
					<article class="row">
						<label class="col-xs-12 col-sm-8 text-right">Productos en esta compra:</label>
						<label class="col-xs-12 col-sm-4 bg-light currency" id="cant-item"></label>
					</article>
					<article  class="row">
						<label class="col-xs-12 col-sm-8 text-right">Total sin IVA:</label>
						<label class="col-xs-12 col-sm-4 bg-light currency" id="subtotal"></label>
					</article>
					<article class="row">
						<label class="col-xs-12 col-sm-8 text-right">IVA:</label>
						<label class="col-xs-12 col-sm-4 bg-light currency" id="iva">0</label>
					</article>
					<div class="row  text-center">
						<article class="col-xs-12 col-sm-4 col-sm-offset-8 pull-right">
							<label>Total:</label>
						</article>
						<article class="col-xs-12 col-sm-4 bg-total col-sm-offset-8 pull-right">
							<label id="total" class="currency"></label>
						</article>
					</div>
				</div>
			</aside>
		</article>
		<article class="col-md-12 text-center">
			<a id="pagar" href="<?php echo get_home_url(); ?>/pagar-mi-kmibox" class="btn btn-sm-kmibox btn-extend">Pagar</a>
			<button id="actualizar" class="btn btn-sm-kmibox btn-extend hidden">Actualizar</button>
		</article>		
	</section>	

</section>

<?php 

get_template_part( 'template/parts/footer/suscription', 'page' ); 

get_footer();
