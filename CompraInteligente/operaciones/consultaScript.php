<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src="http://static.mlstatic.com/org-img/sdk/mercadolibre-1.0.4.js"></script>
        <script type="text/javascript" src="../libs/ext-all.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/estilos-exjs.css"/>


        </script>
    </head>




    <body style="overflow: hidden">

        <script>
            //   function consultar()
            //     {  
            //	    MELI.get("/items/MLB474720094", null, function($data) {
            //        alert("Title: " + data[2]["title"]);
            //              } 
            //	 }

            Ext.Loader.setConfig({
                enabled: true
            });
            Ext.require([
                'Ext.grid.*',
                'Ext.data.*',
                'Ext.window.MessageBox',
                'Ext.util.*',
                'Ext.state.*',
                'Ext.tip.QuickTipManager',
                'Ext.window.MessageBox',
                'Ext.toolbar.Paging',
                'Ext.tip.*'
            ]);

            Ext.onReady(function() {
                Ext.QuickTips.init();
                Ext.define('tiposInfo', {
                    extend: 'Ext.data.Model',
                    fields: ['id', 'nombre']
                });  
                Ext.define('PublicacionInfo', {
                    extend: 'Ext.data.Model',
                    fields: ['id', 'nombre']
                });  
                Ext.define('CategoriaInfo', {
                    extend: 'Ext.data.Model',
                    fields: ['id', 'nombre']
                });  
                Ext.create('Ext.data.Store', {
                    id: "tiposStore",
                    model: 'tiposInfo',
                    autoLoad:true,
                    proxy: {
                        extraParams: {
                            operacion: "consultarTipodeProducto"
                        },
                        type: 'ajax',
                        url: '../class/operaciones.php',
                        reader: {
                            type: 'json',
                            root: 'datos'
                        }
                    }
                });
                Ext.create('Ext.data.Store', {
                    id: "PublicacionStore",
                    model: 'PublicacionInfo',
                    autoLoad:false,
                    proxy: {
                        extraParams: {
                            operacion: "consultarTipodeProducto"
                        },
                        type: 'ajax',
                        url: '../class/operaciones.php',
                        reader: {
                            type: 'json',
                            root: 'datos'
                        }
                    }
                });
                Ext.create('Ext.data.Store', {
                    id: "CategoriaStore",
                    model: 'CategoriaInfo',
                    autoLoad:false,
                    proxy: {
                        extraParams: {
                            operacion: "consultarCategoria"
                        },
                        type: 'ajax',
                        url: '../class/operaciones.php',
                        reader: {
                            type: 'json',
                            root: 'datos'
                        }
                    }
                });
              
                // create the Grid
                var panel = Ext.create('Ext.panel.Panel', {
                    id: 'PanelDeSeleccionDeTipoProducto',
                    height: 725,
                    width: 930,
                    border:0,
                    renderTo:Ext.getBody(),
                    title:"Registre su Solicitud",
                    style: 'margin:0 auto;margin-top:50px;overflow: hidden',
                    layout: {
                        align: 'center'
                      
                    },
                    
                    items: [
                        {xtype:'panel',
                            id:'panelContendorPrincipal',
                            height:425,
                            width:930,
                            border:0,
                            layout: {
                                type: 'vbox',
                                align:"center"
                            },
                            items:[{
                                    xtype: 'container',
                                    height: 400,
                                    width: 930,
                                    layout: {
                                        type: 'hbox'
                                    },
                                    items: [
                                        {
                                            id: 'gridTipoProducto',
                                            width: 310,
                                            xtype: 'gridpanel',
                                            height: 400,
                                   
    
                                            listeners: {
        
                                                selectionchange:function() {
                                                    Ext.getCmp('idRegistrar').setDisabled(true);
                                                    var grid=Ext.getCmp('gridTipoProducto')
                                                    var seleccion = grid.getSelectionModel().getSelection();
                                                    var storePublicacion=Ext.getStore('PublicacionStore');
                                                    storePublicacion.removeAll();
                                                    if(seleccion.length==1){
                                                        Ext.getCmp('gridPublicacion').setDisabled(false);
                                                        var id=seleccion[0].get('id');
                                                
                                                        storePublicacion.load({
                                                            params: {
                                                                operacion: "obtenerPublicaciones",
                                                                idProducto:id
                                                            }
                                                        });
                                                    }else{
                            
                                                        Ext.getCmp('gridPublicacion').setDisabled(true);
                                                    }
                                                }
                                            },
                                            columns: [
                                                {
                                                    xtype: 'gridcolumn',
                                                    width: 270,
                                            
                                                    sortable:false,
                                                    height: 50,
                                                    dataIndex: 'nombre',
                                                    text: 'Publicar'
                                                }
                                            ],
                                            selModel: Ext.create('Ext.selection.CheckboxModel', {}),
                                            store: 'tiposStore',
                                            viewConfig: {
                                                stripeRows: true,
                                                enableTextSelection: true
                                            }
                                        },{
                                            width: 310,
                                            xtype: 'gridpanel',
                                            height: 400,
                                            disabled:true,
                                  
                                            id:'gridPublicacion',
                                            listeners: {
                                                selectionchange:function() {
                                                    Ext.getCmp('idRegistrar').setDisabled(true);
                                                    var grid=Ext.getCmp('gridPublicacion')
                                                    var grid2=Ext.getCmp('gridTipoProducto')
                                                    var seleccion = grid.getSelectionModel().getSelection();
                                                    var seleccion2 = grid2.getSelectionModel().getSelection();
                                                    var storeCategoria=Ext.getStore('CategoriaStore');
                                                    storeCategoria.removeAll();
                                            
                                                    if(seleccion2.length==1){
                                                        Ext.getCmp('gridCategoria').setDisabled(false);
                                                        debugger;
                                                        var idPublicacion=seleccion[0].get('id');
                                                        var idTipo=seleccion2[0].get('id');
                                                        storeCategoria.load({
                                                            params: {
                                                                operacion: "obtenerCategoria",
                                                                idPublicacion:idPublicacion,
                                                                idTipo:idTipo
                                                            }
                                                        });
                                                    }else{
                            
                                                        Ext.getCmp('gridCategoria').setDisabled(true);
                                                    }
                        
                        
                                                }
                                            },
                                            columns: [
                                                {
                                                    xtype: 'gridcolumn',
                                                    width: 270,
                                            
                                                    sortable:false,
                                                    height: 50,
                                                    dataIndex: 'nombre',
                                                    text: 'Categoria'
                                                }
                
                                            ],
                                            selModel: Ext.create('Ext.selection.CheckboxModel', {}),
                                            store: 'PublicacionStore',
                                            viewConfig: {
                                                stripeRows: true,
                                                enableTextSelection: true
                                            }
                                        },{
                                            id: 'gridCategoria',
                                            width: 310,
                                            xtype: 'gridpanel',
                                            height: 400,
                                            disabled:true,
                                   
      
                                            listeners: {
                                                selectionchange:function() {
                                                    Ext.getCmp('idRegistrar').setDisabled(false);
                        
                   
                                                }
                                            },
                                            columns: [
          
                                                {
                                                    xtype: 'gridcolumn',
                                                    width: 270,
                                          
                                                    height: 50,
                                                    sortable:false,
                                                    dataIndex: 'nombre',
                                                    text: 'Sub Categoria'
                                            
                                                }
                                            ],
                                            selModel: Ext.create('Ext.selection.CheckboxModel', {}),
                                            store: 'CategoriaStore',
                                            viewConfig: {
                                                stripeRows: true,
                                                enableTextSelection: true
                                            }
                                        }
                                    ]      
                                }]},
                        {
                            xtype: 'panel',
                            border:0,
                            items:[
                                {
                                    xtype: 'textfield',
                               
                                    height: 25,
                                    margin:'0 0 0 360',
                                    fieldLabel: 'Descripcion',
                                    id: "idDescripcion",
                                    minLength:400
                                },
                                {
                                    xtype:'button',
                                    disabled:true,
                                    id:'idRegistrar',
                                    height:30,
                                    margin:'10 0 0 360',
                                    width:200,
                                    text:'Registrar',
                                    handler:function(){
                                        var grid=Ext.getCmp('gridPublicacion')
                                        var grid2=Ext.getCmp('gridTipoProducto')
                                        var grid3=Ext.getCmp('gridCategoria')
                                        var seleccion = grid.getSelectionModel().getSelection();
                                        var seleccion2 = grid2.getSelectionModel().getSelection();
                                        var seleccion3 = grid3.getSelectionModel().getSelection();
                                        var descripcion=Ext.getCmp('idDescripcion').getValue();
                                        var idProducto=seleccion2[0].get('id');
                                        var idPublicacion=seleccion[0].get('id');
                                        var idCategoria=seleccion3[0].get('id');
                                        if(descripcion!=""){
                                            Ext.Ajax.request({
                                                params: {
                                                    operacion: "registrarArticulo",
                                                    idCategoria: idCategoria,
                                                    idProducto: idProducto,
                                                    idPublicacion:idPublicacion,
                                                    descripcion:descripcion
                                                    
                                                },
                                                url: 'class/operaciones.php',
                                                success: function(response, opts) {

                                                    var obj = Ext.decode(response.responseText, true);
                                                    var value = Ext.getStore('clientesStore');
                                                    if (obj) {
                                                        if (obj.success != true)
                                                        {
                                                            Ext.MessageBox.alert('Error', 'Se ha producido un error mientras se editaba el cliente');
                                                        }else{
                                                            Ext.MessageBox.alert('', 'se ha registrado el articulo de manera exitosa');
                                                        
                                                        }  
                                                    }
                                                               
                                                },
                                                failure: function(response, opts) {
                                                    console.log('server-side failure with status code ' + response.status);
                                                }

                                            });
                                            
                                            
                                            
                                        }
                                    
                                    }
                                    
                                 
                                }]
                        }]
                });
    



            });
        </script>
    </body>
</html>