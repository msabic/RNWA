<?php
if (isset($_COOKIE['uname'])){
$prijavljen=true;
$razina=$_COOKIE['razina'];
}
else {
$prijavljen=false;
$razina=0;
}
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
function CheckLogin($username,$password){
include("Connect.php");
$korisnik=$_POST['username'];
$lozinka=$_POST['password'];
$sql="SELECT * FROM korisnik WHERE email='$korisnik' AND lozinka='$lozinka'";
$result=$con->query($sql);
$num_rows=0;
while($row=$result->fetch_array())
{
$num_rows++;
	}
	mysqli_free_result($result);

	if ($num_rows >= 1) {
		return true;
	}
	else {
		return false;
	}
}
function ReturnUserData($username,$password){
	include("Connect.php");
	$korisnik=$_POST['username'];
	$lozinka=$_POST['password'];
	$sql="SELECT email, razina FROM korisnik WHERE email='$korisnik' AND lozinka='$lozinka'";
	$result=$con->query($sql);
	$rez=array();
	while($ispisrez=$result->fetch_array())
	{
		$rez=$ispisrez;
	}
return $rez;}
?>
<?php
if (isset($_POST["username"])||isset($_POST["password"])){
				$username=$_POST["username"];
				$password=$_POST["password"];
				$postoji=CheckLogin($username,$password);
				
			if ($postoji){
				$rez=array();
				$uname="";
				$razina=0;
				ReturnUserData($username,$password);
				$rez=ReturnUserData($username,$password);
				
				list($uname,$razina)=$rez;
						
				setcookie('uname', $uname, time()+1800,'/');
				setcookie('razina', $razina, time()+1800,'/');
				echo "<script>alert('Uspješno ste se prijavili.')</script>" ;
				include('index.php');
				}
				else{echo "<script>alert('Prijava nije uspjela pokušajte ponovo.');</script>"; 
				include('index.php');}
			
}
			?>
<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost:8080/rnwa">