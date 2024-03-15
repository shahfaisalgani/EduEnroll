<?php
define('DB_SERVER','ecommercedb000.mysql.database.azure.com');
define('DB_USER',' "Faisalgani@ecommercedb000');
define('DB_PASS' ,'09@Atik786');
define('DB_NAME', 'onlinecourse');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
