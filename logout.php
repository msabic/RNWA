
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
				<?php
					if (isset($_COOKIE['uname'])){
					setcookie('uname', "", time()-0,'/');
					}
				include("index.php");
				echo "<script>alert('Uspješno ste se odjavili.')</script>" ;
				?>
				
<META HTTP-EQUIV="refresh" CONTENT="0; URL=http://localhost:8080/rnwa">