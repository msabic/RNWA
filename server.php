<?php
if(!extension_loaded("soap")){
  dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled",0);
$server = new SoapServer("ispis.wsdl");

function doHello($yourName){
 
$username = "root";
$password = "";
$hostname = "localhost"; 

$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

$selected = mysql_select_db("iznajmljivanje_nekretnina",$dbhandle)
  or die("Could not select iznajmljivanje_nekretnina");

$result = mysql_query("SELECT *  FROM NEKRETNINA where NAZIV= \"" . $yourName."\"");
$response = array();
  
  while ($row = mysql_fetch_array($result)) {

$tmp            = array();
		$tmp["Naziv nekretnine"]        = $row["naziv"]; 
		$tmp["Bazen"]        = $row["bazen"];
		$tmp["Broj katova"]        = $row["broj_katova"];
		$tmp["Broj soba"]        = $row["broj_soba"];
		$tmp["Cijena"]        = $row["cijena"];
    $tmp["Garaza"]        = $row["garaza"];
    $tmp["Grad Id"]        = $row["grad_id_grad"];
    $tmp["Id nekretnina"]        = $row["idnekretnina"];
    $tmp["Kucni ljubimci"]        = $row["kucni_ljubimci"];
    $tmp["Kvadratura"]        = $row["kvadratura"];
    $tmp["Opis"]        = $row["opis_nekretnine"];
    $tmp["Vrsta Id"]=$row["vrsta_nekretnine_id_vrsta_nekretnine"];
    $tmp["Zupanija"]        = $row["zupanija_id_zupanija"];

								      

        array_push($response, $tmp);

    $privremeni = $privremeni
      ."\n Naziv_nekretnine: " . $row["naziv"]
      ."\n Bazen: " . $row["bazen"]
      ."\n Broj_katova: " . $row["broj_katova"]
      ."\n Broj_soba: " . $row["broj_soba"]
      ."\n Cijena: " . $row["cijena"]
      ."\n Garaza: " . $row["garaza"]
      ."\n Grad_Id: " . $row["grad_id_grad"]
      ."\n Id_nekretnina: " . $row["idnekretnina"]
      ."\n Kucni_ljubimci: " . $row["kucni_ljubimci"]
      ."\n Kvadratura: " . $row["kvadratura"]
      ."\n Opis: " . $row["opis_nekretnine"]
      ."\n Vrsta_Id: " . $row["vrsta_nekretnine_id_vrsta_nekretnine"]
       ."\n Zupanija: " . $row["zupanija_id_zupanija"]
      ."\n \n";
}



    $jsonn = json_encode($response);
  
  
  return $jsonn;
      return $privremeni;
}

$server->AddFunction("doHello");
$server->handle();
?>