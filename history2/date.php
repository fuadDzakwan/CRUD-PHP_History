<?php 

	echo date("l,d M Y ");
echo "<br>";
	echo date("l, d M Y",time()+60*60*24*100); //100 hari kedepan dari sekarang

echo "<br>";

	echo date("l, d M Y",time()-60*60*24*100); //100 hari kebelakang dari sekarang


// mengetahui hari lahir dari waktu sekarang
//jam,menit,detik,bulan,tanggal,tahun
	echo "<br>";
	echo "<br>";
	echo date("l d M Y",mktime(0,0,0,12,22,2000));
	echo "<br>";
	echo "<br>";
	//nr
	echo date("l d M Y",mktime(0,0,0,1,26,2002));
	echo "<br>";
	echo "<br>";
	//kebalikan dari mktime
	echo date("l d M Y",strtotime("3 mar 2001"));


 ?>