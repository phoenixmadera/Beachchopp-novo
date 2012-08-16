$(document).ready(function() {
	var state_value_default = $('#EnderecoStates').html();
	var city_value_default = $('#EnderecoCities').html();
	//Função que faz o controle do option selecionado.
	$.fn.control = function(){
		$('#EnderecoType option:selected').each(function() {
			switch($(this).val()) { 
				case 'P': 
					$('.input.select.country').remove();
					$('.input.select.state').remove();
					$('.input.select.city').remove();
        break;
				case 'E':
					$('.input.select.country').remove();
					$('.input.select.state').remove();
					$('.input.select.city').remove();
					var country_select = $('#EnderecoCountries').html();
					$('#EnderecoAdicionaForm .input.select.type').after('<div class="input select country">');
					$('.input.select.country').hide().html('<label for = "EnderecoCountries">País</label>'+
																							 '<select name="data[Endereco][countries]" id="EnderecoCountries">'+country_select+'</select>').fadeIn('slow');
				break;
				case 'C':
					//Remove os campos da outra opção
					$('.input.select.country').remove();
					$('.input.select.city').remove();
					$('.input.select.state').remove();
					
					//Define variaveis
					var country_select = $('#EnderecoCountries').html();
					var state_select = $('#EnderecoStates').html();
					
					$('#EnderecoAdicionaForm .input.select.type').after('<div class="input select country">');
					$('.input.select.country').hide().html('<label for = "EnderecoCountries">País</label>'+
																							 '<select name="data[Endereco][countries]" id="EnderecoCountries">'+country_select+'</select>').fadeIn('slow');
					$('#EnderecoAdicionaForm .input.select.country').after('<div class = "input select required state">');
					$('.input.select.state').hide().html('<label for="EnderecoStates">Estado</label>'+
																							 '<select name="data[Endereco][states]" id="EnderecoStates">'+state_select+'</select>').fadeIn('slow');
		
					//Faz o controle dos conteudos
					$.fn.populaSelects = function(){
						var country_selected_value = $(this).val();
						$('#EnderecoStates optgroup').remove();
						//adiciona o valor default dos optgroups no select
						$('#EnderecoStates').html(state_value_default);
						$('#EnderecoStates optgroup').each(function(index) {
							if($(this).attr('label') != country_selected_value){
								$(this).remove();
							}
						});
					}
					$('#EnderecoCountries').populaSelects();
					$('#EnderecoCountries').change(function(){
						$(this).populaSelects();
					});
						//Se o estado é nulo, valida e retorna a borda vermelha no select.
						if($('#EnderecoStates').val() == null){
							$('.state').addClass('control-group error');
						}
				break;
			}
		});
	}
	//Chama a função acima quando a página carregar.
	$('#EnderecoType').control();
	
	//Chama a função acima quando mudar o select.
	$('#EnderecoType').change(function(){
		$(this).control();
 });
	 
 }); 