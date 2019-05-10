<?php 

try{


$db=new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'username','password');

//echo "veritabanı bağlantısı basarılı";
}

catch (ODOExpception $e){

	echo $e->getMessage();



}





 ?>
