<?php
// get the q parameter from URL
$s = $_REQUEST["s"];

$hint = "";
// lookup all hints from array if $q is different from "" 
if ($s !== "") {
    $s = strtolower($s);
    $len=strlen($s);
    /*
	foreach($a as $name) {
        if (stristr($s, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
	
	*/
	

/**********************************************************/
 include ("connect.php");

if($con) {


$sql="SELECT * FROM `grad`, `zupanija` WHERE (`naziv_zupanije`LIKE '$s%' AND `zupanija_id_zupanija` = `id_zupanija`) OR `ime_grada` LIKE '$s%'";
$result2 = $con->query($sql);
 while($row = mysqli_fetch_array($result2)){
			//echo $myrow[0].",".$myrow[1].",".$myrow[2];
			
            $sqll="SELECT * FROM nekretnina where grad_id_grad=".$row['id_grad']."";
            $result3 =$con->query($sqll);
            
            
    while($roww = mysqli_fetch_array($result3)){
        $hint .= '<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/slider/3.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">'.$roww['cijena'].'KN</h4>
                                <h4><a href="#">'.$roww['naziv'].'</a>
                                </h4>
                                <p>'.$roww['opis_nekretnine'].'</p>
                            </div>
                           
                        </div>
                    </div>';
    }
		
	}

	
}
else {
echo "<br>Nije proslo spajanje<br>";
}
/**********************************************************/
	
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;

?>