$(document).ready(function () {

	
$('#search').hide();
	// event ketika keyboadrd diketik
		$('#keyword').on('keyup', function() {
		 
			$('.loader').show();
			//ajax menggunakan load
			//$('#data-table').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());


			$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {


				$('#data-table').html(data);
				$('loader').hide();

			});

	});



});