<?php

$mysqli_link = mysqli_connect("localhost", root, "", "db_listacompra");
 
if (mysqli_connect_errno()) 
{
    printf("MySQL connection failed with the error: %s", mysqli_connect_error());
    exit;
}
$xml="";
$sql="SELECT * from db_productos ";
$result=mysqli_query($mysqli_link,$sql);

while($mostrar=mysqli_fetch_array($result)){

	$xml.=$mostrar["ID"].";";

}

echo $xml;
?>