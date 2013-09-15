<?PHP
session_start('info');
$_SESSION['access_token']= $_POST["Token"];
$_SESSION['nombre']= $_POST["nombre"];
$_SESSION['id']= $_POST["id"];
$_SESSION['email']= $_POST["email"];

echo '<a href="publicar.favoritos.php">publicar.favoritos.php</a>';
echo '<BR><BR>';
echo '<a href="consultaScript.php">consultaScript.php</a>';
echo '<BR><BR>';
echo '<a href="operaciones.php">operaciones.php</a>';
?>