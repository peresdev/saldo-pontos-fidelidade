var _chave = '4B335B6F-9C4D-47F7-B798-C46FFBC4881A';
var _codigo_loja = 1;
var _codigo_cartao = 32231126850;

$(function(){
	$('.api').click(function(){
		$('.modal').addClass('is-active');

	    $.getJSON('api/RetornaLog', function(data) {
	    	var conteudo = "";

	    	if($.trim(data) != "") {
		    	conteudo = "<table class='table is-responsive'<thead><tr><th>NSU</th><th>Data da Solicitação</th><th>Retorno</th></tr></thead><tbody>";
		        $.each(data, function() {
				  $.each(this, function(k, v) {
				  	conteudo += '<tr>';
				    conteudo += '<td>' + v.nsu + '</td>';
		            conteudo += '<td>' +v.data_solicitacao + '</td>';
		            conteudo += '<td>' +v.retorno + '</td>';
		            conteudo += '</tr>';
				  });
		        });
		        conteudo += "</tbody></table>";
	        } else {
	        	var conteudo = "<strong>Nenhuma consulta realizada na API até o momento.";
	        }

	        $('.resposta-log').html(conteudo);
	    });
	});

	$('.delete').click(function(){
		$('.modal').removeClass('is-active');
	});

	$('.btn-consultar').click(function(){
		var retornoJson = '';

		$.ajax({
		  	url: 'api/ConsultaFidelizacao',
		  	type: 'POST',
		  	data: {chave:_chave, codigo_loja:_codigo_loja, codigo_cartao:_codigo_cartao, 
		  		   numero_documento: $('.numero-documento').val()},
		  	success: function(result) {
	  			$('.resultado-api').removeClass('hide');
	  			$('.resposta-api').html(JSON.stringify(result));
		 
	  			$('.resultado').removeClass('hide');
	  			$('.resposta-resultado').html(result.message);

	  			retornoJson = result;

	  			insereLog(retornoJson);

	  			if(result.message.saldo_disponivel_dinheiro && result.message.pontos) {
	  				$('.resposta-resultado').text("Resultado da consulta pelo Número de documento " + $('.numero-documento').val());
	  				$('.resposta-saldo-disponivel').text(result.message.saldo_disponivel_dinheiro);
	  				$('.resposta-pontos').text(result.message.pontos);
	  				$('.bloco-conteudo').show();
	  			} else {
	  				$('.bloco-conteudo').hide();
	  			}
		  	},
		  	error: function(xhr, status, errorThrown) {
		  		retornoJson = xhr.responseText;
	  			$('.resultado-api').removeClass('hide');
	  			$('.resposta-api').html(xhr.responseText);
	  			insereLog(retornoJson);
			},
		});
	});
});

function insereLog(retornoJson) {
	$.ajax({
	  	url: 'api/InsereLog',
	  	type: 'POST',
	  	data: {retorno: retornoJson},
	  	success: function(result) {},
	  	error: function(xhr, status, errorThrown) {},
	});
}