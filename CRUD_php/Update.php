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
if (!isset($_GET["id"]) or $_GET["id"]=="")
{
	echo  "-1";
	exit;
}
$sql="UPDATE db_productos SET Nombre='".$_GET["Nombre"]."' WHERE idprod=".$_GET["id"];
//echo $sql;
$result=mysqli_query($mysqli_link,$sql);

echo "0";

?>