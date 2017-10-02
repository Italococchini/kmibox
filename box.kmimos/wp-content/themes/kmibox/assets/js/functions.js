
	// ***************************************
	// Global Function 
	// ***************************************
	function autoload_execute(){
		if( autoload != '' ){
			faseNext( $('[data-value="'+autoload+'"]') );
		}
	}
	function loadFase(fase_id){

		var offset = 0;

		var obj = $('[data-fase="'+fase_id+'"]'); 
		if( obj.length > 0 ){
			loadAttr( obj );

			switch( fase_id){
				// ***************************************
				// Fase #1 - Tamaño
				// ***************************************
				case 1:
					$('#btn-linkprev').removeClass('hidden');
					$('[data-action="prev"]').addClass('hidden');

					// Cargar Items
					$('[data-fase="1"]').empty();

					offset = 'col-sm-offset-'+cal_column(service);
					$.each(order_size, function(key, val){
						key = val ;						
						if( 'undefined' != typeof icons[key] ){

							$('[data-fase="1"]')
							.attr({
								'color': color_default,
							})
							.append( 
								$('<article class="text-center col-sm-4 '+offset+'"></article>')
								.append( 
								$('<h2>')
									.text(ucfirst(key))
								,$('<img />')
									.addClass('img-responsive')
									.attr({
										'src': icons[key],
										'width': '200px',
									})
								,$('<button>Seleccionar</button>')
									.addClass('btn')
									.addClass('btn-sm-kmibox')
									.attr({
										'data-value': key,
										'data-action':'next',
										'data-target': "1",
										'data-color': color_default,
									})
								)
							);
							offset = '';
						}
					});
				break;
				// ***************************************
				// Fase #2 - Producto
				// ***************************************
				case 2:
					$('#btn-linkprev').addClass('hidden');
					$('[data-action="prev"]').removeClass('hidden');

					// Cargar Items
					$('[data-fase="2"]').empty();

					// Cargar Items
					var producto = service[ kmibox_param['fase1'] ];
					$('[data-fase="2"]').empty();
					var col = 'col-sm-offset-1'; //+cal_column(producto);
					var product_id=0;

					// ******************
					// Autoload 
					// ******************
					var count_item_fase2 = 0;
					$.each(producto, function(key, val){

						autoload = ucfirst(key);

						// Crear item del producto
						$('[data-fase="2"]')
						.attr({
							'color': color_default,
						})
						.append(
							$('<article class="text-center col-sm-4 '+col+'"></article>')
							.append( 
								$('<h2>')
									.css('font-size', '30px' )
									.css('color', val['color'] )
									.text(ucfirst(key))
								,$('<div>')
									.attr('id', 'slider_'+val['content']['ID'])
									.attr('data-ride', 'carousel')
									.addClass('carousel slide')
									.append( $('<div>')
										.addClass('carousel-inner')
										.attr('role', 'listbox')
										.attr('id', 'items-'+val['content']['ID'])
									)
								,$('<div>')
									.addClass('pag-image')
								,$('<div>').append(
									$('<label>')
										.addClass('label-precio')
										.text('$'+val['price-min'])
										.css('border-color', val['color'] )
									,$('<button data-action="next">Seleccionar</button>')
										.css('background', val['color'] )
										.addClass('btn')
										.addClass('btn-sm-kmibox')
										.attr({
											'data-value': ucfirst(key),
											'data-target': "2",
											'data-color': val['color'],
										})
								)
								,$('<p>')
									.addClass('text-left')
									.addClass('no-margin')
									.addClass('tipo-contenido')
									.html("Contiene: <br>"+ucfirst(val['content']['post_content']))
							)
						);

						// Agregar galeria del producto
						var galeria = '<div class="item active"><img src="'+val['gallery']['thumnbnail']+'" alt="" width="200px" height="200px"></div>';
						if(val['gallery']['other'].length > 0){
							$.each( val['gallery']['other'], function(idx, row){
								galeria += '<div class="item"><img src="'+row['url']+'" alt="" width="200px" height="200px"></div>';
							} );

							$('#slider_'+val['content']['ID'])
								.append(
									$('<a class="left carousel-control" href="#slider_'+val['content']['ID']+'" disabled role="button" data-slide="prev"></a>')
										.append('<i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i><span class="sr-only">Previous</span>')
									,$('<a class="right carousel-control" href="#slider_'+val['content']['ID']+'" role="button" data-slide="next">')
										.append('<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i><span class="sr-only">Next</span>')
								);
						}
						$('#items-'+val['content']['ID']).append(galeria);							

						col = 'col-sm-offset-2';
						count_item_fase2++;
					});

					if( count_item_fase2 == 1 ){
						setTimeout(autoload_execute, 2);
					}
				break;
				// ***************************************
				// Fase #3 - Plan ****
				// ***************************************
				case 3: 
					
					// Cargar Items
					var plan = service[ kmibox_param['fase1'] ][ kmibox_param['fase2'] ]['plan'];
					var image= service[ kmibox_param['fase1'] ][ kmibox_param['fase2'] ]['gallery']['thumnbnail'];				
					var color= service[ kmibox_param['fase1'] ][ kmibox_param['fase2'] ]['color'];				
					var col  = 2; //cal_column(plan);
					var offset = 'col-md-offset-2';
					
					$('[data-fase="3"]').empty();

					$('[data-fase="3"]')
						.append(
							$('<img />')
								.addClass('img-responsive')
								.attr({
									'src': image,
									'width': '300px',
								})
						);
				
					var style = 'style="background: url(https://box.kmimos/img/box-sombra.png);'+
    							'background-size: contain; '+
    							'background-repeat: no-repeat; '+
    							'padding-bottom: 19px;"';

					$.each(order_plan, function(key, _val){
						if( 'undefined' != typeof plan[_val] ){
							var key = _val;
							var val = plan[_val];
							var price = val["price"];

							var ahorro = val["ahorro"];
							var ahorro_porcent = 0;
							var off_class = 'hidden';
							if( ahorro>0 ){
								ahorro_porcent = val["ahorro_porcent"];
								off_class = '';
							}

							$('[data-fase="3"]')
								.addClass('text-center')
								.append(
									$('<article class="text-center center-box col-xs-12 col-md-'+col+' '+offset+'" ></article>')
									.append( 
										$('<button></button>')
											.addClass('btn btn-sm-kmibox btn-sm-kmibox-price')
											.css('background', color)
											.attr({
												'data-action': 'next',
												'data-value': key,
												'data-target': '3',
												'data-object': val['ID'],
												'data-color': color_default,
											})
											.append(

												$('<label class="ahorro '+off_class+'"></label>')
													.text(ahorro_porcent + '% off'),
												$('<div></div>')
													.addClass('btn-price')
													.text('$'+price),
												$('<div></div>')
													.addClass('btn-name')
													.text(ucfirst(key))
											)
										,$('<span></span>')
											.addClass("ahorro-label")
											.addClass(off_class)
											.text( "Ahorra $"+ahorro )
									)
								);
							offset = '';
						}
					});
				break;
				// ***************************************
				// Fase #4 - Extras
				// ***************************************
				case 4:
					// Omitir paso
					$('#btn-omitir').removeClass('hidden');
					$("#slider-item").empty();

					var count_items = 1;
					$.each( extras, function(ind, itm){					
						changeExtra( count_items, ind, 0 );
						count_items++;
					});

					// Registrar Carrito de compras
					// addCart(urlbase);
				break;
				// ***************************************
				// Fase #5 - Resumen de Compra
				// ***************************************
				case 5:
					$('#btn-omitir').addClass('hidden');

					var xdata = {'key':'get_cart'}
					$.post( urlbase+"/ajax/admin_cart.php", {xdata}, function(result) {
						$( '#cart-items' ).empty();
						if( result != ''){

							var cart = $.parseJSON(result);
							var subtotal = 0;
							var total = 0;
							var cant_item = 0;

							$.each( cart['items'], function(index, item){ 
								add_item_cart(
									item.ID,
									item.name,
									item.type,
									item.thumnbnail,
									item.price,
									item.cant,
									item.total									
								);

								subtotal += item.total;
								total += item.total;

								cant_item += parseInt( item.cant );
								console.log(item.cant);
							});

							$('#cant-item').html(cant_item);
							$('#subtotal').html('$ '+subtotal);
							$('#total').html('$ '+total);
						}
					})
					.fail(function() {
						console.log( "error al registrar los datos al carrito de compras" );
					})
				break;
			}
		}
	}
	function add_item_cart( ID, name, type, thumnbnail, price, cant, total ){
		$( '#cart-items' )
		.append( 
			$('<article class="item-cart-container" id="art'+ID+'"></article>')
			.addClass('col-md-12')
			.append(

				$('<div></div>')
				.addClass('row')
				.append(	
					$('<div></div>')
					.addClass('col-xs-12 col-md-2')
					.append(
						
						$('<a data-target="delete" data-type="box'+type+'" data-parent="'+ID+'"></a>')
							.append(
								$('<i class="fa fa-close"></i> <span class="hidden-sm hidden-md hidden-lg">Remover</span>')
							)
						,$('<span></span>')
							.attr({
								'href':"#"
							})
							.append(
								$('<img>')
								.attr({
									'src': thumnbnail, 
									'width':"60px", 
									'height':"60px"	 
								})
							)
					)	
					,$('<div></div>')
					.addClass('col-xs-12 col-md-4')
					.append(
						$('<label></label>').html( name )
					)


					,$('<div></div>')
					.addClass('col-xs-12 col-md-2 currency')
					.append(
						$('<label>') 
						.html( '$ '+ price )
					)

					,$('<div></div>')
					.addClass('col-xs-12 col-md-2 cantidad')
					.append(
						$('<input>') 
							.addClass("col-xs-5 col-md-6")
							.attr({
								'readonly':'true'
								,'type':"numeric" 
								,'id':"cant-" + ID 
								,'value': cant
								,'data-type':type
							})
						,$("<div></div>") 
							.addClass("col-xs-6 col-md-4 items-cant-cart")
							.attr("data-target","actions")
							.append(
								$("<button></button>") 
									.attr({
										'data-action':"sumarItems",
										'data-type': type,
										'data-id': ID	
									})
									.append('<i class="fa fa-plus"></i>')
								,$("<button></button>") 
									.attr({
										'data-action':"restarItems",
										'data-type': type,
										'data-id': ID	
									})
									.append('<i class="fa fa-minus"></i>')
							)
							
					)
					,$('<div></div>') 
						.addClass("col-xs-12 text-center bg-dark col-md-2 currency")
						.append( $('<label>').html( '$ '+total ) )
				)
			)
		);
	}
	function loadColor( obj_fase ){
		color = obj_fase.attr('color'); 
		if( $(obj_fase).attr('color') == ''){
			color = color_default;	
		}

		// header
		$('#header-purchase').css('background', color);
		$('.compra-titulo').css('background', color);
		$('#marcas').css('background-color', color);
	}
	function loadAttr( obj ){
		// Titulo
		$("#title").html( $.parseHTML( obj.data("title") ) );
		// SubTitulo
		$("#subtitle").html( $.parseHTML( obj.data("subtitle") ) );
		// Footer Titulo
		$("#section-msg").html( $.parseHTML( obj.data("msg") ) );
		$("#section-msg").css('color', obj.data("msg-color") );
	}
	function cal_column(_service){
		var col = 4;
		var count_items = Object.keys(_service).length;
		if( count_items > 0 && count_items < 3 ){
			col = (12 - (count_items * 4)) / 2; 
		}
		return col;
	}
	function ucfirst(string){
		return string.substr(0,1).toUpperCase()+string.substr(1,string.length).toLowerCase();
	}
	// Change items Slider
	function changeExtra( count_items, item, defecto ){

		var itm;
		var tmp = defecto;
		if( extras.indexOf(item) >= -1 ){
			tmp = item;
		}
		itm = extras[ tmp ];

		$("#f4-slider-item"+count_items).empty();
		$("#f4-slider-item"+count_items)
		.attr({
			'data-index': tmp,
			'data-id': itm['ID'],
			'data-name': itm['name'],
			'data-price': itm['price']
		})
		.append( 
			$("<img>")
			//.addClass("vertical-center") 
			//.addClass("text-center") 
			.attr({
				'width':"300px",
				'height':"300px",
				'src': itm['thumnbnail']
			})
			,$('<div>')
				.attr({
					'data-agregado': tmp
				})
				.css("top", "50%") 
				.css("width", "100%") 
				.css("height", "auto")
				.css("position", "absolute")
				.addClass("row hidden")
				.append( 
					$('<span>')
						.css("font-weight", "bold")
						.css("color", "#fff")
						.css("background", "#00D8B5")
						.html("Ha sido añadido")
				)
		);
		// Cargar Detalle del producto
		$('#extra-price').html(
			'$' + $("#f4-slider-item3").attr('data-price')
		);
		$('#extra-name').html(
			$("#f4-slider-item3").attr('data-name')
		);
		// validar si ya fue agregado
		existeExtra(tmp, 0, 0);
	}
	// Exste items Slider
	function existeExtra( id, delay=1000, fade=1200, primary=false ){
		// Eliminar item
		if(kmibox_param['cart']['extra'][id] >= 0){
			$("[data-agregado='"+id+"'] span")
				.css("background", "#00D8B5")
				.html("Ha sido añadido")
			$("[data-agregado='"+id+"']")
				.fadeIn(fade)
				.removeClass('hidden');
			$("[data-index='"+id+"'] img")
				.addClass('selected')
		}else{
		// Agregar item
			if( !$("[data-agregado='"+id+"']").hasClass('hidden') ){
				$("[data-agregado='"+id+"'] span")
					.css("background", "#c16363")
					.html("Ha sido removido");
				$("[data-agregado='"+id+"']")
					.delay(delay).fadeOut(fade)
				$("[data-index='"+id+"'] img")
					.removeClass('selected')
			}
		}
		if( primary ){
			addCart(urlbase);
		}
	}
	function faseNext( _this ){
		// Config.
		var fase_section= $('[data-fase="' + _this.data("target") + '"]');
		var fase = fase_section.attr("data-fase");
		var faseNext_id = parseFloat(fase)+1;
		var faseNext = $('[data-fase="'+faseNext_id+'"]');

		// Es la ultima fase
		if( $('[data-fase="'+faseNext_id+'"]').length > 0 ){

			kmibox_param['fase'+_this.attr('data-target')] = _this.attr('data-value');
			if( _this.attr('data-object') > 0 ){
				kmibox_param['cart']['code'] = _this.attr('data-object');
			}
			loadFase( faseNext_id );

			// Mostrar Proxima fase
			faseNext
				.addClass('bounceInRight animated')
				.removeClass('hidden')
			;			
			// Ocultar Obj. Actual
			$(fase_section).addClass('hidden');
			// Cargar Titulo
			$("#title").html( faseNext.data("title") );
			// Boton Prev
			$('[data-action="prev"]')
				.attr('data-target', fase)
				;
			// Config Color Base
			$(faseNext).attr('color', _this.data('color'));
			loadColor(faseNext);

			if(faseNext_id==4){
				$('#btn-omitir').removeClass('hidden');
				addCart( urlbase );
			}else{
				$('#btn-omitir').addClass('hidden');
			}
			save_session_cart();
		}
	}
	function fasePrev( _this ){
		// Actual
		var fase_section= $('[data-fase="' + _this.attr("data-target") + '"]');
		var fase = fase_section.attr("data-fase");

		// Siguiente
		var faseNext_id = parseFloat(fase)+1;
		var faseNext = $('[data-fase="'+faseNext_id+'"]');

		// Anterior
		var fasePrev_id = parseFloat(fase)-1;

		// Es la ultima fase
		if( $('[data-fase="' + _this.attr("data-target") + '"]').length > 0 ){

			// Mostrar Proxima fase
			fase_section
				.removeClass('bounceInRight')
				.addClass('bounceInLeft')
				.removeClass('hidden')
			;			
			// Ocultar Obj. Actual
			$(faseNext)
				.addClass('hidden');

			// Cargar Titulo
			loadAttr( fase_section );

			// Boton Next
			_this.attr('data-target', fasePrev_id);

			if(fasePrev_id==0){
				$('#btn-linkprev').removeClass('hidden');
				$('[data-action="prev"]').addClass('hidden');
			}else{
				$('#btn-linkprev').addClass('hidden');
				$('[data-action="prev"]').removeClass('hidden');
			}

			if(fasePrev_id==3){
				$('#btn-omitir').removeClass('hidden');
			}else{
				$('#btn-omitir').addClass('hidden');
			}

			loadColor( fase_section ); 
			save_session_cart();

		}
	}
	function save_session_cart(){
		var xdata = {
			'key': 'save_session_cart',
			'param': kmibox_param
		};
console.log(xdata);
		$.post( urlbase+"/ajax/admin_cart.php", {xdata}, function(result) {	
			console.log(result);
		})
		.fail(function() {
			console.log( "error al registrar los datos al carrito de compras" );
		});
	}