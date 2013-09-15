Ext.Loader.setConfig({
    enabled: true
});
Ext.require([
    'Ext.grid.*',
    'Ext.data.*',
    'Ext.window.MessageBox',
    'Ext.util.*',
    'Ext.state.*',
    'Ext.window.MessageBox',
    'Ext.tip.*',
    'Ext.toolbar.Paging',
    'Ext.tip.QuickTipManager'
    ]);
Ext.Loader.setPath('Ext', 'js');
Ext.require([
    'Ext.ux.SlidingPager',
    'Ext.ux.data.PagingMemoryProxy'
    ]);
    
    
Ext.onReady(function() {
    var grid = 
Ext.create('Ext.tab.Panel', {
    renderTo: Ext.getBody(),
    height: 100,
    width: 200,
    items: [
        {
            // Explicitly define the xtype of this Component configuration.
            // This tells the Container (the tab panel in this case)
            // to instantiate a Ext.panel.Panel when it deems necessary
            xtype: 'panel',
            title: 'Tab One',
            html: 'The first tab',
            listeners: {
                render: function() {
                    Ext.MessageBox.alert('Rendered One', 'Tab One was rendered.');
                }
            }
        },
        {
            // this component configuration does not have an xtype since 'panel' is the default
            // xtype for all Component configurations in a Container
            title: 'Tab Two',
            html: 'The second tab',
            listeners: {
                render: function() {
                    Ext.MessageBox.alert('Rendered One', 'Tab Two was rendered.');
                }
            }
        }
    ]
});
});