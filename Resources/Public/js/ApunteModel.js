Ext.define('Apunte', {
    extend: 'Ext.data.Model',
    fields: [
        {
            name: 'id',
            type: 'string'
        },
        {
            name: 'fecha',
            type: 'date',
            format: 'Y-m-d'
        },
        {
            name: 'notas',
            type: 'string'
        },
        {
            name: 'empresa',
            type: 'string'
        },
        {
            name: 'cuenta',
            type: 'string'
        },
        {
            name: 'cantidad',
            type: 'number'
        }
    ],
    validations: [
        {
            type: 'presence',
            field: 'empresa'
        },
        {
            type: 'presence',
            field: 'cuenta'
        },
        {
            type: 'presence',
            field: 'cantidad'
        }
    ]
});
