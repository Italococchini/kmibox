<?php $suscripciones = get_suscripciones( ); ?>

<!-- pre>
<?php 
/*
foreach ($suscripciones as $key => $value) {
	$d = $value['detalle']['line_items'];
	foreach ($d as $key => $q) {
		print_r($q->get_order_id());
		print_r($q->get_product()->get_name());
		echo '<hr>';
	}
}  
*/
?>
</pre -->

<article class="row profile-content">

	<div class="col-md-4 col-xs-12 col-md-offset-2"
		style="margin-top:20px;">
		<h3>Selecciona una suscripción</h3>
		<select class="form-control" data-id="select_kmibox" data-target="content-suscripcion">
			<option>Selecciona una Kmibox</option>
			<?php foreach ($suscripciones as $key => $kmibox) { ?>
				<option value="<?php echo $key; ?>"> Orden No.: <?php echo "{$key} " . $kmibox['meta']['kmibox_size']; ?> </option>
			<?php } ?>
		</select>

		<span class="loading hidden">
			<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
			<span>Cargando datos, porfavor espere...</span>
		</span>

	</div>


	<div id="content-suscripcion" 
		class="col-md-8 col-xs-12 col-md-offset-2" 
		style="border-radius:10px; border:1px solid #ccc; margin-top:20px;">

		<div class="row form-horizontal">
			<h2 class="col-md-6">Tu suscripción KMIBOX</h2>
			<div class="col-md-6 col-md-offset-3 text-center">
				<img id="imagen" src="<?php echo get_home_url(); ?>/aimg/box.png" class="img-responsive" >
			</div>
		</div>

		<div class="row text-center">
			<div class="col-md-4">
				<label>Tipo de suscripción</label>
			      <input readonly id="tipo_suscripcion" class="profile-content-input form-control"  value="">
			</div>
			<div class="col-md-4">
				<label>Tipo de Kmibox</label>
				<input readonly id="tipo_kmibox" class="profile-content-input form-control"  value="">
			</div>
			<div class="col-md-4">
				<label>Próxima entrega</label>
				<input readonly id="proxima_entrega" class="profile-content-input form-control"  value="">				
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-6">
				<label>Estatus:</label>
				<input readonly id="estatus" class="profile-content-input form-control"  value="">
			</div>
			<div class="col-md-6">
				<label>Artículos añadidos:</label>
				<select id="articulos" class="profile-content-input form-control"></select>
			</div>
		</div>
		<div class="row text-center">
			<label>Entregas</label>
			<div class="calendar">
				<div class="col-xs-2 col-md-2 ">
					Ene<span class="hidden-xs hidden-sm">ro</span>
				</div>
				<div class="col-xs-2 col-md-2 ">
					Feb<span class="hidden-xs hidden-sm">rero</span>
				</div>
				<div class="col-xs-2 col-md-2 ">
					Mar<span class="hidden-xs hidden-sm">zo</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Abr<span class="hidden-xs hidden-sm">il</span>
				</div>
				<div class="col-xs-2 col-md-2">
					May<span class="hidden-xs hidden-sm">o</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Jun<span class="hidden-xs hidden-sm">io</span>
				</div>
			</div>
			<div class="calendar">
				<div class="col-xs-2 col-md-2">
					Jul<span class="hidden-xs hidden-sm">io</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Ago<span class="hidden-xs hidden-sm">sto</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Sep<span class="hidden-xs hidden-sm">tiembre</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Oct<span class="hidden-xs hidden-sm">ubre</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Nov<span class="hidden-xs hidden-sm">iembre</span>
				</div>
				<div class="col-xs-2 col-md-2">
					Dic<span class="hidden-xs hidden-sm">iembre</span>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<ul class="list-inline list-unstyle" id="leyenda">
				<li><span></span><label>Entregado</label></li> 
				<li><span></span><label>Por entregar</label></li>
			</ul>
		</div>

		<div class="hidden row progreso-entrega form-horizontal">
			<h2 class="col-md-6">Estatus del envío</h2>
			<div class="progress-content">
				<div class="border-curvo col-md-12 text-center">
					
					<div class="row">
						<div id="armada" class="col-xs-12 col-sm-12 col-md-3  pull-left">
							<img src="<?php echo get_home_url(); ?>/img/progress-box.png" class="img-responsive" >
							<label>Armada</label>
						</div>
						<div class="col-md-2 flecha hidden-xs hidden-sm">
							<img src="<?php echo get_home_url(); ?>/img/flecha.png" width="128">
						</div>
						<div id="enviada" class="col-md-3 hidden-xs hidden-sm">
							<img src="<?php echo get_home_url(); ?>/img/progress-cart.png" class="img-responsive" >
							<label>Enviada</label>
						</div>
						<div class="col-md-2 flecha hidden-xs hidden-sm">
							<img src="<?php echo get_home_url(); ?>/img/flecha.png" width="128">
						</div>
						<div id="recibida" class="col-md-3 hidden-xs hidden-sm">
							<img src="<?php echo get_home_url(); ?>/img/progress-house.png" class="img-responsive pull-right" >
							<label>Recibida</label>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</article>