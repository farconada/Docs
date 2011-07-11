Ext.create('Ext.data.Store', {
    storeId:'resumenGastosAnioStore',
    autoLoad: false,
    pageSize: 1,
    fields: ['mes','cantidad','cantidad_anterior'],
    proxy: {
        type: 'ajax',
        encode: true,
        url: baseUrl + 'gasto/listResumenAnual',
        reader: {
            type: 'json',
            root: 'data'
        }
    }
});

Ext.create('Ext.data.Store', {
    storeId:'resumenIngresosAnioStore',
    autoLoad: false,
    pageSize: 1,
    fields: ['mes','cantidad','cantidad_anterior'],
    proxy: {
        type: 'ajax',
        encode: true,
        url: baseUrl + 'ingreso/listResumenAnual',
        reader: {
            type: 'json',
            root: 'data'
        }
    }
});