<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<script language="javascript" type="text/javascript"  src="libs/MercadoLivre/meli.php" >

</script>

<script>
   function consultar()
     {  
	    MELI.get("/items/MLB474720094", null, function($data) {
        alert("Title: " + data[2]["title"]);
              } 
	 }

</script>

<body>

<input type="button" value="Boton" onclick="consultar()" />
</body>
</html>