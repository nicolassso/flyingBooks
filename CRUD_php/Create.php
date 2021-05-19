<?php


$mysqli_link = mysqli_connect("localhost", "root", "", "db_listacompra");
 
if (mysqli_connect_errno()) 
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
if (!isset($_GET["Nombre"]) or $_GET["Nombre"]=="")
{
	echo  "-1";
	exit;
}
$sql="INSERT INTO db_producto (Nombre) VALUES ('".$_GET["Nombre"]."')";
//echo $sql;
$result=mysqli_query($mysqli_link,$sql);

echo "0";

?>