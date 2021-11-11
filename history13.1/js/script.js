//mengambil elemen yang sudah diberi id

var keyword = document.getElementById('search-input');
var searchBtn = document.getElementById('search-btn');
var dataTable = document.getElementById('data-table');

	//tambahkan listener event pada input search

	keyword.addEventListener('keyup',function(argument) {
		
		//buat objek ajax
		var ajax = new XMLHttpRequest();

		//cek kesiapan ajax
		ajax.onreadystatechange = function() {
			//4 ready, 200 status ok -> network
			if (ajax.readyState == 4 && ajax.status == 200) {
				dataTable.innerHTML = ajax.responseText;

			}
		}

		//eksekusi ajax
		ajax.open('GET','ajax/mahasiswa.php?keyword=' + keyword.value,true);
		ajax.send();



	});