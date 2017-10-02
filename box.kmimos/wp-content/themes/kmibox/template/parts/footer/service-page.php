<?php $result = get_products(); ?>
<script type='text/javascript'>
	<?php 
	// ****************************
	// Extras
	// ****************************
	?>
	var extras = {}; 
	<?php if(!empty($result['extra'])){ ?>
		extras = $.parseJSON(JSON.stringify(eval( <?php echo $result['extra']; ?>)));
	<?php } ?>
	<?php 
	// ****************************
	// Servicios
	// ****************************
	?>
	var services = $.parseJSON(JSON.stringify(eval( <?php echo $result['product']; ?>))); 
</script>
<script type='text/javascript'>
	<?php 
	// ****************************
	// Variables
	// ****************************
	?>

	var faseID = 1 <?php //echo (get_faseID() > 0)? get_faseID() : 1 ; ?>;
	var urlbase = "<?php echo get_home_url(); ?>";
	var ajaxurl = "<?php echo get_home_url() . admin_url( 'admin-ajax.php', 'relative' ); ?>";
	var color_default = '#00D8B5';
	var source = "<?php echo $result['source']; ?>";
	var service = services[source];
	var icons = {
		'Grande' : '<?php echo get_home_url(); ?>/img/grande.png',
		'Chica' : '<?php echo get_home_url(); ?>/img/pequeno.png',
	};
	var order_size = {
		'1':'Chica',
		'2':'Mediano',
		'3':'Grande'
	}
	var order_plan = { 
		'1':'Semanal', 
		'2':'Quincenal', 
		'3':'Mensual', 
		'4':'Trimestral', 
		'5':'Semestral', 
		'6':'Anual'
	}

	var mis_suscripciones = "";
	var kmibox_param = {
		"fase1": "<?php get_param_purchase('fase1'); ?>",
		"fase2": "<?php get_param_purchase('fase2'); ?>",
		"fase3": "<?php get_param_purchase('fase3'); ?>",
		"cart": {
			"code": "<?php get_param_purchase('code'); ?>",
			"extra": {},
		}
	};
	var autoload = '<?php get_param_purchase('fase1'); ?>';
	var debug={};

</script>
<script type='text/javascript' src="<?php echo get_home_url(); ?>/js/functions.js"></script>
<script type='text/javascript' src="<?php echo get_home_url(); ?>/js/admin_user.js"></script>
<script type='text/javascript' src="<?php echo get_home_url(); ?>/js/admin_cart.js"></script>
<script type='text/javascript' src="<?php echo get_home_url(); ?>/js/init.js"></script>

<script type='text/javascript' src="<?php echo get_home_url(); ?>/plugins/bootstrap-validator/bootstrapValidator.js"></script>
