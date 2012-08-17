$(document).ready(function() {
			
			//Adiciona o endereço na div cadastrados
			$('#client_add_adress').click(function() {
				//Conta o número de valores cadastrados já existentes
				var end_count = $('div .registereds-addresses .end').length;
				//Pega os valores dos inputs do formulário a ser inserido
				var country = $('#ClienteCountry :selected').text();
				var country_id = $('#ClienteCountry').val();
				var state = $('#ClienteState :selected').text();
				var state_id = $('#ClienteState').val();
				var city = $('#ClienteCity :selected').text();
				var city_id = $('#ClienteCity').val();
				var neighborhood = $('#ClienteNeighborhood').text();
				var neighborhood_id = $('#ClienteNeighborhood').val();
				var type_address = $('#ClienteTypeAddresses :selected').text();
				var type_address_id = $('#ClienteTypeAddresses').val();
				var des = $('#ClienteDes').val();
				var number = $('#ClienteNumber').val();
				var complement = $('#ClienteComplement').val();
				var cep = $('#ClienteCep').val();
				
				//Faz a verificação dos campos, apresenta a msg de erro se algum ta inválido, e os limpa pra ser adicionado novamente.
				//Campo Logradouro
				if(des == ''){
					if($('.alert').html() == null){
						$('.cliente.info').before('<div class = "alert alert-error">');
					}
					$('.alert').html('<button class="close" data-dismiss="alert">×</button>');
					$('.alert .close').after('<strong>Erro!</strong> O campo "Logradouro" deve ser informado.');
					$('.alert').fadeIn('slow');
					return false;
				} else{
					$('.msg').css('display', 'none');
				}
				//Campo Número
				if(number == '' || number * 1 != number){
					if($('.alert').html() == null){
						$('.cliente.info').before('<div class = "alert alert-error">');
					}
					$('.alert').html('<button class="close" data-dismiss="alert">×</button>');
					$('.alert .close').after('<strong>Erro!</strong> O campo "Número" deve ser válido.');
					$('.alert').fadeIn('slow');
					return false;
				} else{
					$('.msg').css('display', 'none');
				}
				//Campo CEP
				if(cep == ''){
					if($('.alert').html() == null){
						$('.cliente.info').before('<div class = "alert alert-error">');
					}
					$('.alert').html('<button class="close" data-dismiss="alert">×</button>');
					$('.alert .close').after('<strong>Erro!</strong> O campo "CEP" deve ser informado.');
					$('.alert').fadeIn('slow');
					return false;
				} else{
					$('.alert').remove();
					$('#ClienteDes').val('');
					$('#ClienteNumber').val('');
					$('#ClienteComplement').val('');
					$('#ClienteCep').val('');

				}
				//Adiciona os valores na div cadastrado
				 //Insere sempre um numero após o ultimo
				 var end_count_aux = end_count + 1;
				 var des_width = $('#ClienteDes_cadastrado').css("width");
				 //Cria a div end num
				 $(".registereds-addresses").hide().append('<div class = "end '+end_count_aux+'">').fadeIn();
				 
				 //Insere conteudo dentro da end num
					//Div Logradouro
					$('.registereds-addresses .end.'+end_count_aux).html('<div class = "endereco-titulo"><div class = "texto">'+'Endereço '+end_count_aux);
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "logradouro">');
					$('.registereds-addresses .end.'+end_count_aux+' .logradouro').html('<input name="data[Endereco'+end_count_aux+'][des]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteDes_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+des+'"'+
																																				'readonly = "readonly">'
																																				);
					var width = $('#ClienteDes_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteDes_cadastrado'+end_count_aux).css('width', width);
					//Cria a virgula
					$('.registereds-addresses .end.'+end_count_aux+' .logradouro').append('<input class = "campo_pequeno" style = "width: 4px; margin-left: -6px;" disabled = "disabled" value = ", "></input>');
					
					//Div Numero
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "numero">');
					$('.registereds-addresses .end.'+end_count_aux+' .numero').html('<input name="data[Endereco'+end_count_aux+'][number]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteNumber_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+number+'"'+
																																				'readonly = "readonly">'
																																				);
					width = $('#ClienteNumber_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteNumber_cadastrado'+end_count_aux).css('width', width);	
					//Div Complemento
					if(complement.length != 0){
					//Cria a virgula
					$('.registereds-addresses.end.'+end_count_aux+' .numero').append('<input class = "campo_pequeno" style = "width: 4px; margin-left: -6px;" disabled = "disabled" value = ", "></input>');
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "complemento">');
					$('.registereds-addresses .end.'+end_count_aux+' .complemento').html('<input name="data[Endereco'+end_count_aux+'][complement]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteComplement_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+complement+'"'+
																																				'readonly = "readonly">'
																																				);
					width = $('#ClienteComplement_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteComplement_cadastrado'+end_count_aux).css('width', width);
					//Cria o traço
						$('.registereds-addresses .end.'+end_count_aux+' .complemento').append('<input class = "campo_pequeno" style = "width: 10px; margin-left: -5px;" disabled = "disabled" value = " - "></input>');
					} else {
						//Cria o traço
						$('.registereds-addresses .end.'+end_count_aux+' .numero').append('<input class = "campo_pequeno" style = "width: 10px; margin-left: -5px;" disabled = "disabled" value = " - "></input>');
					}
					//Div bairro
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "bairro">');
					$('.registereds-addresses .end.'+end_count_aux+' .bairro').html('<input name="data[Endereco'+end_count_aux+'][neighborhood]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteNeighborhood_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+neighborhood_id+'"'+
																																				'readonly = "readonly">'
																																				);
					width = $('#ClienteNeighborhood_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteNeighborhood_cadastrado'+end_count_aux).css('width', width);	
					//Div Cep
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "cep">');
					//Adiciona o label CEP
					$('.registereds-addresses .end.'+end_count_aux+' .cep').append('<input class = "campo_pequeno" disabled = "disabled" value = "CEP: " style = "width: 35px; clear: both;"></input>');
					
					$('.registereds-addresses .end.'+end_count_aux+' .cep').append('<input name="data[Endereco'+end_count_aux+'][cep]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteCep_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+cep+'"'+
																																				'readonly = "readonly">'
																																				);		
					$('.registereds-addresses .end.'+end_count_aux+' #ClienteCep_cadastrado'+end_count_aux).css('width', '89%');
					//Div Tipo
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "tipo_endereco">');
					//Adiciona o label CEP
					$('.registereds-addresses .end.'+end_count_aux+' .tipo_endereco').append('<input class = "campo_pequeno" disabled = "disabled" value = "Tipo: " style = "width: 35px; clear: both;"></input>');
					$('.registereds-addresses .end.'+end_count_aux+' .tipo_endereco').append('<input name="data[Cliente][type_addresses] "'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteTypeAddresses_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+type_address+'"'+
																																				'readonly = "readonly">'
																																				);			
					$('.registereds-addresses .end.'+end_count_aux+' #ClienteTypeAddresses_cadastrado'+end_count_aux).css('width', '89%');
					//Div cidade
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "cidade">');
					$('.registereds-addresses .end.'+end_count_aux+' .cidade').html('<input name="data[Cliente][city]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteCity_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+city+'"'+
																																				'readonly = "readonly">'
																																				);				
					width = $('#ClienteCity_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteCity_cadastrado'+end_count_aux).css('width', width);	
					//Cria o traço
						$('.registereds-addresses .end.'+end_count_aux+' .cidade').append('<input class = "campo_pequeno" style = "width: 10px; margin-left: -5px;" disabled = "disabled" value = " - "></input>');
					//Div estado
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "estado">');
					$('.registereds-addresses .end.'+end_count_aux+' .estado').html('<input name="data[Cliente][state]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteState_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+state+'"'+
																																				'readonly = "readonly">'
																																				);		
					width = $('#ClienteState_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteState_cadastrado'+end_count_aux).css('width', width);	
					//Cria o traço
						$('.registereds-addresses .end.'+end_count_aux+' .estado').append('<input class = "campo_pequeno" style = "width: 10px; margin-left: -5px;" disabled = "disabled" value = " - "></input>');
					//Div país
					$('.registereds-addresses .end.'+end_count_aux).append('<div class = "pais">');
					$('.registereds-addresses .end.'+end_count_aux+' .pais').html('<input name="data[Cliente][country]"'+
																																				'class="campo_pequeno cadastrado"'+
																																				'id="ClienteCountry_cadastrado'+end_count_aux+'"'+
																																				'type="text"'+
																																				'value = "'+country+'"'+
																																				'readonly = "readonly">'
																																				);	
					width = $('#ClienteCountry_cadastrado'+end_count_aux).textWidth()+'px';
					$('#ClienteCountry_cadastrado'+end_count_aux).css('width', width);																																
			});
			
		//option Tipo de pessoa ao carregar a pagina
		if($("#ClienteFlgType option:selected").val() == 'F'){
				var cpf_value = $('.elements .input.required #ClienteCpf').val();
				if($('.elements .input').hasClass('error')){
					$('.elements .input.error').before('<label for="cpf">CPF</label><input name="data[Cliente][cpf]" class="campo" type="text" id="ClienteId" value= "'+cpf_value+'"></input>');
				} else {
					$('.elements .input.required #ClienteCpf').after('<label for="cpf">CPF</label><input name="data[Cliente][cpf]" class="campo" type="text" id="ClienteId" value= "'+cpf_value+'"></input>');
				}
		} else if($("#ClienteFlgType option:selected").val() == 'J'){
				//Tem que validar aqui o CNPJ
				var cnpj_value = $('.elements .input.required #ClienteCnpj').val();
				if($('.elements .input').hasClass('error')){
					$('.elements .input.error').before('<label for="cnpj">CNPJ</label><input name="data[Cliente][cnpj]" class="campo" type="text" id="ClienteCnpj" value= "'+cnpj_value+'"></input>');
				} else {
					$('.elements .input.required #ClienteCnpj').after('<label for="cnpj">CNPJ</label><input name="data[Cliente][cnpj]" class="campo" type="text" id="ClienteCnpj" value= "'+cnpj_value+'"></input>');
				}
		}
		
		//option Tipo de pessoa change
		$('#ClienteFlgType').change(function(){
			if($("#ClienteFlgType option:selected").val() == 'F'){
			$('.elements').html('<div class = "input text cpf">');
			$('.elements .input.text').hide().html('<label for="ClienteCpf">CPF</label>'+
																			'<input name="data[Cliente][cpf]" class="campo" type="text" id="ClienteCpf">').fadeIn('slow');
			$('.elements .input.text.cnpj').remove();
		} else if($("#ClienteFlgType option:selected").val() == 'J'){
				$('.elements').html('<div class = "input text cnpj">');
				$('.elements .input.text').hide().html('<label for="ClienteCnpj">CNPJ</label>'+
																				'<input name="data[Cliente][cnpj]" class="campo" type="text" id="ClienteCnpj">').fadeIn('slow');
				$('.elements .input.text.cpf').remove();
		}
		});
  }); 