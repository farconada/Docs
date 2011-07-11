Ext.define('Sifpe.chart.ResumenMes', {
    extend: 'Ext.chart.Chart',
    alias: 'widget.resumenmeschart',

    initComponent: function() {
        Ext.apply(this, {
            title: 'Gastos / Ingresos %',
            animate: {
                easing: 'bounceOut',
                duration: 500
            },
            shadow: true,
            store: Ext.data.StoreManager.lookup('resumenMesStore'),
            flex: 1,
            axes: [
                {
                    type: 'gauge',
                    position: 'gauge',
                    minimum: 0,
                    maximum: 100,
                    steps: 10,
                    margin: 7
                }
            ],
            series: [
                {
                    type: 'gauge',
                    donut: 30,
                    field: 'porcentaje'
                }
            ]
        });
        this.callParent();
    }

});

Ext.define('Sifpe.panel.ResumenMes', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.resumenmespanel',

    initComponent: function() {
        Ext.apply(this, {
            title: 'Gastos / Ingresos %',
            layout: 'fit',
            border: false,
            items: {xtype: 'resumenmeschart'}
        });
        this.callParent();
    }

});
