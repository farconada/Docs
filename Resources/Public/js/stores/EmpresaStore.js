Ext.define('Empresa', {
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
    storeId:'empresaStore',
        autoLoad: true,
        pageSize: 1,
        totalProperty: 'total',
        autoSync: true,
        model: 'Empresa',
        proxy: {
            type: 'ajax',
            encode: true,
            noCache: false,
            url: baseUrl + 'empresa/list',
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
                create: baseUrl + 'empresa/save',
                update: baseUrl + 'empresa/save',
                destroy: baseUrl + 'empresa/delete'
            }
        }
    });