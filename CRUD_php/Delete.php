<?php


$mysqli_link = mysqli_connect("localhost", "root", "", "db_listacompra");
 
if (mysqli_connect_errno()) 
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
if (!isset($_GET["id"]) or $_GET["id"]=="")
{
	echo  "-1";
	exit;
}
$sql="DELETE FROM db_productos WHERE idprod=".$_GET["id"];
//echo $sql;
$result=mysqli_query($mysqli_link,$sql);

echo "0";

?>