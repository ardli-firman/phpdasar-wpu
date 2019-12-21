//ambil elemen
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//event di searchbox
keyword.addEventListener('keyup' ,function() {

	//Object ajax
	var xhr = new XMLHttpRequest();

	//cek kesiapan ajax
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			//menggangtikan div container  dengan respon dari mahasiswa.php
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	//buka koneksi ajax(Method,Sumber data(request dari sumber lain),
	//keyword.value adalah isian yang di ketik di dalam box cari, true adalah asynchronus
	xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value ,true);
	xhr.send();

});