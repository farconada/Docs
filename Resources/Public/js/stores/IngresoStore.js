Ext.create('Ext.data.Store', {
    storeId:'ingresoStore',
    autoLoad: true,
    pageSize: 1,
    autoSync: true,
    model: 'Apunte',
    proxy: {
        type: 'ajax',
        encode: true,
        url: baseUrl + 'ingreso/list',
        reader: {
            type: 'json',
            root: 'data',
            totalProperty: 'totalPaginas'
        },
        writer: {
            type: 'json',
            encode: true,
            root: 'entity'
        },
        api: {
            create: baseUrl + 'ingreso/save',
            update: baseUrl + 'ingreso/save',
            destroy: baseUrl + 'ingreso/delete'
        }
    }
});