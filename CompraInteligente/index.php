<?PHP
session_start('info');
?>
<html>
    <head>
        <script src="http://static.mlstatic.com/org-img/sdk/mercadolibre-1.0.4.js"></script>
        <script type="text/javascript" src="js/index/index.js"></script>
        <script type="text/javascript" src="libs/ext-all.js"></script>
		<script type="text/javascript" src="libs/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="libs/jquery.redirect.min.js"></script>		
        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="stylesheet" type="text/css" href="css/estilos-exjs.css"/>
        <link rel="stylesheet" type="text/css" href="css/estilos-exjs2.css"/>

        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <title></title>
    </head>

    <script type="application/javascript">
        function loguear()
        {
		   var token = "";
			MELI.init ({ client_id : 6977659590438028 });
			MELI.login(function() {
				MELI.get("/users/me",{},
					function(data) { token=MELI.getToken(); 
						$().redirect('operaciones/index.php', {'Token': token, 'nombre': data[2].first_name, 'id':data[2].id,"email": data[2].email});
					}
				);
			});
			
			return false;
			
        }



    </script>
    <body bgcolor="#FFF059" style="font-family:Arial, Helvetica, sans-serif">
        <table align="center" width="1000" height="600" >
            <tr>
                <td>
                    <table align="center"  bgcolor="#FFF059" background="imagenes/logo_compraInteligente.png" width="900" height="350">
                        <tr>
                            <td>
                            
                            </td>
                        </tr>
                    </table>
                   
                </td>
         </tr>
         <tr>
             <td>
                 <table bgcolor="#FFFFFF"  align="center" width="1000" height="">
                 <tr>
                     <td>
                     <table align="center" width="500" height="auto">
                         <tr>
                             <td>
                                <form action="class/auth/login.php" method="post">
                            <table width="400" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                           <td width="126" align="center">
						   <input type="button" id="imageField" value="Ingresar A La Aplicacion" onClick="loguear();"/></td>
							 


                                </tr>
                            </table>
                        </form>
                             </td>
                         </tr>
                         
                     </table>
                     </td>
                     <td>
                      <table bgcolor="#FFFFFF" align="center" width="500" height="auto" style="vertical-align: super" >
                         <tr>
                             <td>
                                 <h2 style=" color:#F60">Descripci&oacute;n  </h2>
                                 <ul>
                                   <li>
                                   <h4> Estado del env&iacute;o </h4>
                                   <p> Se notificar&aacute; al usuario que haya efectuado una compra el estado del env&iacute;o de 
                                     su compra </p>
                                   </li>
                                     
                                   <li>  
                                   <h4> Favorito Inteligente </h4> 
                                   <p> El usuario al agregar un art&iacute;culo a <b>favoritos</b> tendr&aacute; la opci&oacute;n 
                                     de ser ofertado por los vendedores que posean el mismo o un art&iacute;culo similar </p>
                                   </li>  
                                     
                                   <li>  
                                   <h4> Esperar postulaci&oacute;n </h4>
                                   <p> Si hay un art&iacute;culo que no encontras podes  acceder a un apartado e indicar 
                                     nombre, categoria y subcategorias del art&iacute;culo, y en el momento que un vendedor                                     postule el art&iacute;culo se te enviar&aacute; un aviso </p>       
                                   </li>
                                  </ul>                              
                             </td>
                         </tr>
                         
                     </table>
                     </td>
                 </tr>    
                 </table>
             </td>
         </tr>
                            
        </table>

                            </body>
                            </html>
