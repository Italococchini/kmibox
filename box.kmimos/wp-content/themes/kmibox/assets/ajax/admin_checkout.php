<?php

require_once( __DIR__.'/../assets/plugins/Openpay/Openpay_kmibox.php' );

$visible = false;
$cart = get_cart();
$resumen = get_resumen();

$result = [];

if( $_POST ){

	$sts = true;
	foreach ($_POST as $key => $value) {
		if( empty($value) ){
			$result['msg'] = 'Faltan datos, por favor complete el formulario para realizar la suscripción';
			$sts = false;
			break;
		}
	}

	if( $sts ){
		$data = [
			'plan' => [
			    'amount' => $resumen['total'],
			    'status_after_retry' => 'cancelled',
			    'retry_times' => 2,
			    'name' => $cart['items'][0]['name'],
			    'repeat_unit' => 'month',
			    'trial_days' => '90', // segun plan de kmibox
			    'repeat_every' => '1',
			    'currency' => 'MXN'
			],
			'suscripcion' => [
			    'trial_end_date' => '2000-01-01', 
			    'plan_id' => '',
			    'card' => [
			         'card_number' => $_POST['num_cart'],  //'4111111111111111',
			         'holder_name' => $_POST['holder_name'],
			         'expiration_year' => $_POST['exp_year'],
			         'expiration_month' => $_POST['exp_month'],
			         'cvv2' => $_POST['cvv'],
			         'device_session_id' => session_id() 
				]
			]
		];

		$_openpay = cliente( $data);

		if( !isset($_openpay->id) ){
			$result['msg'] = 'Datos guardados satisfactoriamente';
			$visible = true;
		}
	}
}

print_r( json_encode( $result ) );
