<?php

include_once("model/Nekretnina.php");

class Model {
	public function getNekretnina()
	{
		// here goes some hardcoded values to simulate the database
		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iznajmljivanje_nekretnina";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM nekretnina";
//mysql_query("SET NAMES 'utf8'", $connection);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$arej = array();
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
   
    array_push($arej, new Nekretnina($row["naziv"], $row["opis_nekretnine"], $row["broj_soba"], $row['idnekretnina'], $row['cijena']));

	}
} else { 
$arej = array();
    //echo "0 results";
}
$conn->close();
		return $arej;
	}
	
	public function getNekretnine($naziv)
	{

		
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iznajmljivanje_nekretnina";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM nekretnina WHERE naziv = ". $naziv;
//mysql_query("SET NAMES 'utf8'", $connection);
$result = $conn->query($sql);
$test = new Nekretnina("a", "b", "c");
if ($result->num_rows > 0) {
	$arej = array();
    // output data of each row
	
    while($row = $result->fetch_assoc()) {

	    array_push($arej, new Nekretnina($row["naziv"], $row["opis_nekretnine"], $row["broj_soba"]));

	$test = new Nekretnina($row["naziv"], $row["opis_nekretnine"], $row["broj_soba"]);
	}
} else { 
$arej = array();

    //echo "0 results";
}
$conn->close();
		return $test;
	}
	
	}
	

?>