<?php 

try{

//$db=new PDO("mysql:host=localhost;dbname=kucukgez_eticaret;charset=utf8",'kucukgez_root','Titanik555');

$db=new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','12345678');

//echo "veritabanı bağlantısı basarılı";
}

catch (ODOExpception $e){

	echo $e->getMessage();



}





 ?>