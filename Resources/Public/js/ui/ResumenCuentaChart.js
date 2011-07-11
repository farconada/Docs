Ext.define('Sifpe.chart.ResumenCuenta', {
    extend: 'Ext.chart.Chart',
    alias: 'widget.resumencuentachart',

    initComponent: function() {
        Ext.apply(this, {
            animate: true,
            shadow: true,
            store: Ext.data.StoreManager.lookup('resumenGastosCuentaStore'),
            axes: [
                {
                    type: 'Numeric',
                    position: 'left',
                    fields: ['cantidad','cantidad_anterior'],
                    grid: true,
                    minimum: 0
                },
                {
                    type: 'Category',
                    position: 'bottom',
                    fields: ['cuenta'],
                    label: {
                        renderer: function (value) {
                            if (value.length >= 10) {
                                return value.substring(0, 15);
                            }
                            return value;
                        },
                        rotate: {
                            degrees: 20
                        }
                    }
                }
            ],
            series: [
                {
                    type: 'column',
                    axis: 'left',
                    highlight: true,
                    xField: 'cuenta',
                    yField: ['cantidad','cantidad_anterior'],
                    tips: {
                        trackMouse: true,
                        width: 74,
                        height: 38,
                        renderer: function(storeItem, item) {
                            var cuenta = item.value[0];
                            if (cuenta.length >= 10) {
                                cuenta = cuenta.substring(0, 15);
                            }
                            this.setTitle(cuenta + ' ' + item.value[1]);
                        }
                    }
                }
            ]
        });
        this.callParent();
    }

});