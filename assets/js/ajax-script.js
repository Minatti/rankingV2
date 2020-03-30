$(document).ready(() => {
	
//ajax
	$('#wallet').on('change', e => {


		let id = $(e.target).val();
			
		$.ajax({
			type: 'POST',
			url: BASE_URL+'rankings/get_products',
			data: {wallet:id}, //x-www-form-urlencoded
			dataType: 'json',
			success:function(data) {

			var html = '';

			for(var i in data) {
				html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
			}

			$("#products").html(html);						
		
			},
			error: erro => {console.log(erro) }
		})

		//método, url, dados, sucesso, erro
	})
})