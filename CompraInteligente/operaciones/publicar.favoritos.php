<?PHP

session_start('info');
?>

<html>
    <head>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
        <script src="http://static.mlstatic.com/org-img/sdk/mercadolibre-1.0.4.js"></script>
		<script type="text/javascript" src="../libs/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="../libs/jquery.redirect.min.js"></script>
       <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	   
        <title></title>
    </head>

    <script type="application/javascript">
		var cod_item = "";
	
		function guardarID(itemwe)
		{
			 cod_item =itemwe;
		}
		
		function publicar(estado)
		{
			if(estado)
			{
				// futura llamada ajax para guardar en la db
				alert(cod_item);
			}else{
				cod_item = "";
			}
		}
        function loguear()
        {
			// Url para pedir favoritos
		   var favorItem= "https://api.mercadolibre.com/users/me/bookmarks?access_token=<?PHP echo $_SESSION['access_token'] ?>";
		    var ItemABuscar= "https://api.mercadolibre.com/items/";
			$.getJSON(favorItem, function(data) {
				var items = [];
				$.each(data, function(key, val) {
					
					$.getJSON(ItemABuscar+val.item_id,function(item) {
					    //var elemento = "<li class=\"ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-btn-up-c\" data-corners=\"false\" data-shadow=\"false\" data-iconshadow=\"true\" data-wrapperels=\"div\" data-icon=\"arrow-r\" data-iconpos=\"right\" data-theme=\"c\">";
						var	elemento = "<li class=\"ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-last-child ui-btn-up-c\" data-corners=\"false\" data-shadow=\"false\" data-iconshadow=\"true\" data-wrapperels=\"div\" data-icon=\"arrow-r\" data-iconpos=\"right\" data-theme=\"c\">";
							elemento += "<div class=\"ui-btn-inner ui-li ui-li-has-alt\"> <div class=\"ui-btn-text\">";
							
						elemento +="<a class=\"ui-link-inherit\" href=\'#\'><img class=\"ui-li-thumb\" src=\'"+item.pictures[0].url+"\'><h2 class=\"ui-li-heading\">"+item.title+"</h2><p class=\"ui-li-desc\">"+item.subtitle+"</p></a> </div></div> ";
						elemento +="<a id=\""+item.id+"\" onClick=\"guardarID(\'"+item.id+"\');\" class=\"ui-li-link-alt ui-btn ui-btn-icon-notext ui-btn-up-c\" data-transition=\"pop\" data-position-to=\"window\" data-rel=\"popup\"  href=\"#purchase\" title=\"Purchase album\" data-corners=\"false\" data-shadow=\"false\" data-iconshadow=\"true\" data-wrapperels=\"span\" data-icon=\"false\" data-iconpos=\"notext\" data-theme=\"c\" aria-haspopup=\"true\" aria-owns=\"purchase\" aria-expanded=\"false\">";
						elemento +="<span class=\"ui-btn-inner\"> <span class=\"ui-btn-text\"></span>";
						elemento +="<span class=\"ui-btn ui-btn-up-d ui-shadow ui-btn-corner-all ui-btn-icon-notext\" data-corners=\"true\" data-shadow=\"true\" data-iconshadow=\"true\" data-wrapperels=\"span\" data-icon=\"gear\" data-iconpos=\"notext\" data-theme=\"d\" title=\"\">";
						elemento +="<span class=\"ui-btn-inner\"><span class=\"ui-btn-text\"></span><span class=\"ui-icon ui-icon-gear ui-icon-shadow\"> </span> </span></span></span> </a></li>";
						$("ul").append(elemento)
					});
					
				});
				
			});
			
        }

    </script>
    <body bgcolor="#FFF059">
	<ul data-role="listview" data-split-icon="gear" data-split-theme="d" data-inset="true">

		
</ul>
	    <script type="application/javascript">
			loguear();
		</script>
<div data-role="popup" id="purchase" data-theme="d" data-overlay-theme="b" class="ui-content" style="max-width:340px; padding-bottom:2em;">
    <h3>Publicar su favorito</h3>
    <p>Desea publicar su favorito para recibir sugerencia de mejores ofertas? </p>
    <a href="index.html" onClick="publicar(true);" data-role="button" data-rel="back" data-theme="b" data-icon="check" data-inline="true" data-mini="true">Aceptar</a>
    <a href="index.html" onClick="publicar(false);" data-role="button" data-rel="back" data-inline="true" data-mini="true">Cancel</a>
</div>
	</body>
 </html>