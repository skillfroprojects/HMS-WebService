<?php
// Create connection to Oracle
$conn = oci_connect("phphol", "welcome", "//127.:8080");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";
}
// Close the Oracle connection
oci_close($conn);
?>