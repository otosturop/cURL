<?php

function connect($url,$data){

	$tarayici = $_SERVER['HTTP_USER_AGENT'];
	$cookie = "cookie.txt";
	//Bir cURL oturumu Başlatır.
	$curl = curl_init();
	//aktarma seçenekleri curl_setopt();
	//İçeriği alınacak url seçimi post edilen sayfa alınmalıdır.
	curl_setopt($curl, CURLOPT_URL, $url);
	//engelemelere karşı refere bilgisi nerden gelindiği bilgisini verir
	curl_setopt($curl, CURLOPT_REFERER, "http://www.google.com.tr");
	//veri transferini başlatır
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	// Post yapımını sağlar
	curl_setopt($curl, CURLOPT_POST, true);
	//formdaki post verilerini girilmesini sağlar
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	//yönlendirmeleri sağlar 
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	// çıktıda başlık bulunmasını sağlar ya da iptal eder.
	curl_setopt($curl, CURLOPT_HEADER, true);
	//zaman aşımını önler sonsuz döngüye girmesin diye
	curl_setopt($curl, CURLOPT_TIMEOUT, -1);

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($curl, CURLOPT_NOBODY, true);


	//engelemeye karşı tarayıcı bilgisi gönderir.
	curl_setopt($curl, CURLOPT_USERAGENT, $tarayici);
	//cookie oluşturmamızı sağlar.
	curl_setopt($curl, CURLOPT_COOKIE, $cookie);
	//gelen cookie değerlerini hangi dosyada tutacağımızı belirtir.
	curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
	// tutulan cookieleri geri göndermemizisağlar
	curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
	//belirtilencurl sorgusunu çalıştırır.
	$ok = curl_exec($curl);
	//curl sorgusunu sonlandırır.
	curl_close($curl);
	return $ok;
}

// giriş yapılacak sitenin form elementlerininin namelerine göre giriş yapılmalıdır
$yaz = connect("formun gönderildiği adres","login=kullanıcı&passwd=sifre");
echo $yaz;
 ?>
