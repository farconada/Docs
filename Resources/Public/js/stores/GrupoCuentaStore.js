Ext.define('GrupoCuenta', {
    extend: 'Ext.data.Model',
    fields: [{
        name: 'id',
        type: 'string'
    }, {
        name: 'name',
        type: 'string'
    }],
    validations: [{
        type: 'length',
        field: 'name',
        min: 1
    }]
});
Ext.create('Ext.data.Store', {
    storeId:'grupoCuentaStore',
        autoLoad: true,
        pageSize: 1,
        totalProperty: 'total',
        autoSync: true,
        model: 'GrupoCuenta',
        proxy: {
            type: 'ajax',
            encode: true,
            noCache: false,
            url: baseUrl + 'grupocuenta/list',
            reader: {
                type: 'json',
                root: 'data'
            },
            writer: {
              type: 'json',
              encode: true,
              root: 'entity'
            },
            api: {
                create: baseUrl + 'grupocuenta/save',
                update: baseUrl + 'grupocuenta/save',
                destroy: baseUrl + 'grupocuenta/delete'
            }
        }
    });