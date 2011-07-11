Ext.define('Cuenta', {
    extend: 'Ext.data.Model',
    fields: [{
        name: 'id',
        type: 'string'
    }, {
        name: 'name',
        type: 'string'
    },
            {
        name: 'grupo',
        type: 'string'
    }
    ],
    validations: [{
        type: 'length',
        field: 'name',
        min: 1
    }]

});
Ext.create('Ext.data.Store', {
    storeId:'cuentaStore',
        autoLoad: true,
        pageSize: 1,
        totalProperty: 'total',
        autoSync: true,
        model: 'Cuenta',
        proxy: {
            type: 'ajax',
            encode: true,
            url: baseUrl + 'cuenta/list',
            noCache: false,
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
                create: baseUrl + 'cuenta/save',
                update: baseUrl + 'cuenta/save',
                destroy: baseUrl + 'cuenta/delete'
            }
        }
    });