<?php # HelloClient.php
# Copyright (c) 2005 by Dr. Herong Yang
#
   $client = new SoapClient(null, array(
      'location' => "http://localhost:8080/RNWA/wsbwsdl/HelloServer.php",
      'uri'      => "urn://neretva.fsr.ba/hello",
      'trace'    => 1 ));

   $return = $client->__soapCall("hello",array("vikendica dubrovnik"));
   	echo("\n<pre>".$return)."</pre>";



 


?>