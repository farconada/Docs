Ext.define('Sifpe.grid.Base', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.basegrid',

    initComponent: function() {
        this.addEvents('addclick', 'deleteclick');
        this.editing = Ext.create('Ext.grid.plugin.RowEditing', {
            clicksToEdit: 2
        });

        Ext.apply(this, {
            height: 400,
            autoWidth: true,
            style: 'padding: 5px',
            selType: 'rowmodel',
            plugins: [this.editing],
            dockedItems: [
                {
                    xtype: 'toolbar',
                    items: [
                        {
                            id: 'btnAdd',
                            text: 'Nuevo',
                            iconCls: 'icon-add',
                            scope: this,
                            handler: this.onAddClick
                        },
                        '-',
                        {
                            iconCls: 'icon-delete',
                            text: 'Borrar',
                            disabled: true,
                            itemId: 'delete',
                            scope: this,
                            handler: this.onDeleteClick
                        }
                    ]
                }
            ],
            bbar: Ext.create('Ext.PagingToolbar', {
                id: 'gridPaging',
                store: this.store,
                displayInfo: true,
                displayMsg: 'Mostrando elementos {0} - {1} de {2}',
                emptyMsg: "Nada que mostrar"
            })
        });
        this.callParent();
        this.getSelectionModel().on('selectionchange', this.onSelectChange, this);

        // Solucion temporal para
        // http://www.sencha.com/forum/showthread.php?133767-Store.sync()-does-not-update-dirty-flag
        this.store.on('write', function(store, operation) {
            var success = operation.wasSuccessful();
            if (success) {
                Ext.each(operation.records, function(record) {
                    if (record.dirty) {     // ??? Why???
                        record.commit();
                    }
                    if (record.phantom) {     // ??? Why???
                        record.phantom = false;
                    }
                });
            }
        });
    },
    onSelectChange: function(selModel, selections) {
        this.down('#delete').setDisabled(selections.length === 0);
    },
    onDeleteClick: function() {
        this.fireEvent('deleteclick', this);
        var selection = this.getView().getSelectionModel().getSelection()[0];
        if (selection) {
            this.store.remove(selection);
        }
    },
    onAddClick: function() {
        this.fireEvent('addclick', this);
    }

});
