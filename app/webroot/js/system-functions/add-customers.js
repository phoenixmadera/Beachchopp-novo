$(document).ready(function() {

	//Retorna o código HTML de todos os optgroups e options do select.
		var state_value_default = $('#ClienteState').html();
		var city_value_default = $('#ClienteCity').html();

	//Função que retorna o tamanho do texto em PIXELS. :D sou foda demais.
		$.fn.textWidth = function(){
			//Cria um span provisório pra pegar o WIDTH dele.
			var html_calc = $('<span class = "aux">' + $(this).val() + '</span>');
			//Insere o span na pagina
			html_calc.prependTo('body');
			//Salva o valor do WIDTH do span.
			var width = html_calc.width();
			//Remove o span provisório
			html_calc.remove();
			//Retorna o valor em PIXELS do texto inserido pelo usuário.
			return width;
  	}

  	/* 
  		Função genérica pra popular os selects.
  		@selector = Seletor Javascript filho(destino) do select que executará.
  		@value_default = Valor default(todos os options) do filho do select que executará. 
		*/
  	$.fn.populaSelects = function(selector, value_default){
			var selected_value = $(this).val();
			$(selector+' optgroup').remove();
			//adiciona o valor default dos optgroups no select
				$(selector).html(value_default);

			$(selector+' optgroup').each(function(index) {
				if($(this).attr('label') != selected_value){
					$(this).remove();
				}
			});
		}

		$.fn.controlCustomerType = function(){
			$('#ClienteFlgType option:selected').each(function() {

				var cpf_value = $('.elements .input.required #ClienteCpf').val();
				var cnpj_value = $('.elements .input.required #ClienteCnpj').val();
				var options_html = $('#ClienteResponsible').html();
				var val = $(this).val();

				$('.elements .aux').remove();
				
				switch(val){
					case 'F':
						if($('.elements .input').hasClass('error')){
							$('.elements').append('<div class = "input text required aux cpf control-group error">');
							$('.elements .cpf.control-group.error').append('<label for="cpf">CPF</label><input name="data[Cliente][cpf]" type="text" id="ClienteId" value= "'+cpf_value+'"></input>');
					} else {
						$('.elements').append('<div class = "input text required aux cpf">');
						$('.elements .aux').hide().append('<label for="cpf">CPF</label><input name="data[Cliente][cpf]" type="text" id="ClienteId" value= "'+cpf_value+'"></input>').fadeIn('slow');
					}
					break;
						case 'J':
							var cnpj_value = $('.elements .input.required #ClienteCnpj').val();
							var responsible_value = $('.elements .input.required').val();
						if($('.elements .input.hidden-cnpj').hasClass('error')){
							$('.elements').append('<div class = "input text required aux cnpj control-group error">');
							$('.elements .cnpj.control-group.error').append('<label for="cnpj">CNPJ</label><input name="data[Cliente][cnpj]" class="campo" type="text" id="ClienteCnpj" value= "'+cnpj_value+'"></input>');
						} else if($('.elements .input.hidden-responsible').hasClass('error')) {
							$('.elements').append('<div class = "input select required aux responsible control-group error">');
							$('.elements .responsible.control-group.error').append('<label for="responsible">Responsável</label><select name="data[Cliente][responsible]" id="ClienteResponsible"></input>');
							
						} else {
								$('.elements').append('<div class = "input text required aux cnpj">');
								$('.elements .aux.cnpj').hide().append('<label for="cnpj">CNPJ</label><input name="data[Cliente][cnpj]" class="campo" type="text" id="ClienteCnpj" value= "'+cnpj_value+'"></input>').fadeIn('slow');
								$('.elements').append('<div class = "input select required aux responsible">');
								$('.elements .aux.responsible').hide().append('<label for="cnpj">Responsável</label><select name="data[Cliente][responsible]" id="ClienteResponsible"></select>').fadeIn('slow');
								$('.elements .aux.responsible #ClienteResponsible').append(options_html);
						}
					break;
				}
			});
		}
});