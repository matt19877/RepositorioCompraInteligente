<?PHP
$codigo=$_GET['code'];
echo("Location: https://api.mercadolibre.com/oauth/token?grant_type=authorization_code&client_id=6977659590438028&client_secret=Bod7085COHJXx00mXd09kWMoHWr6cDLD&code=".$codigo."&redirect_uri=http://localhost/CompraInteligente/CompraInteligente/operaciones/index.php");

?>