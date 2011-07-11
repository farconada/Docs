Ext.create('Ext.data.Store', {
    storeId:'resumenGastosCuentaStore',
    autoLoad: false,
    pageSize: 1,
    totalProperty: 'total',
    fields: ['cuenta', 'cantidad', 'cantidad_anterior' ],
    proxy: {
        type: 'ajax',
        encode: true,
        url: baseUrl + 'gasto/listResumenPorCuenta',
        reader: {
            type: 'json',
            root: 'data'
        }
    }
});

Ext.create('Ext.data.Store', {
    storeId:'resumenIngresosCuentaStore',
    autoLoad: false,
    pageSize: 1,
    totalProperty: 'total',
    fields: ['cuenta', 'cantidad', 'cantidad_anterior' ],
    proxy: {
        type: 'ajax',
        encode: true,
        url: baseUrl + 'ingreso/listResumenPorCuenta',
        reader: {
            type: 'json',
            root: 'data'
        }
    }
});