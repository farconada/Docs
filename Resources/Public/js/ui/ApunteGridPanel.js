Ext.define('Ext.ux.form.SearchField', {
    extend: 'Ext.form.field.Trigger',

    alias: 'widget.searchfield',

    trigger1Cls: Ext.baseCSSPrefix + 'form-clear-trigger',
    trigger2Cls: Ext.baseCSSPrefix + 'form-search-trigger',

    url: '',
    hasSearch : false,
    paramName : 'query',

    initComponent: function() {
        this.callParent(arguments);
        this.url = this.store.getProxy().url;

    },

    afterRender: function() {
        this.callParent();
        this.triggerEl.item(0).setDisplayed('none');
    },

    onTrigger1Click : function() {
        var me = this;
        if (me.hasSearch) {
            me.setValue('');
            me.hasSearch = false;
            me.triggerEl.item(0).setDisplayed('none');
            me.doComponentLayout();
            var proxy = me.store.getProxy();
            proxy.url = me.url;
            me.store.load();
        }
    },
    onTrigger2Click : function() {
        var me = this;
        me.hasSearch = true;
        me.triggerEl.item(0).setDisplayed('block');
        me.doComponentLayout();
        var proxy = me.store.getProxy();
        var searchUrl = me.url.replace(/list$/i,'search')
        proxy.url = searchUrl + '/?queryString=' + me.getValue();
        me.store.load();

    }
});

Ext.define('Sifpe.grid.Apunte', {
    extend: 'Sifpe.grid.Base',
    alias: 'widget.basegrid',
    initComponent: function() {
        this.groupingFeature = Ext.create('Ext.grid.feature.GroupingSummary', {
            id: 'group',
            groupHeaderTpl: '({rows.length} Apunte{[values.rows.length > 1 ? "s" : ""]})'
        });
        Ext.apply(this, {
            features: [this.groupingFeature],
            columns: [
                {
                    header: 'fecha',
                    dataIndex: 'fecha',
                    xtype: 'datecolumn',
                    format: 'Y-m-d',
                    field: {
                        xtype: 'datefield',
                        allowBlank: false,
                        format: 'd-m-Y',
                        minValue: '2006-01-01',
                        minText: 'Cannot have a start date before the company existed!',
                        maxValue: Ext.Date.format(new Date(), 'Y-m-d')
                    }
                },
                {
                    header: 'empresa',
                    dataIndex: 'empresa',
                    flex: true,
                    renderer: getEmpresaFromId,
                    editor: {
                        xtype: 'combo',
                        editable: false,
                        store:  Ext.data.StoreManager.lookup('empresaStore'),
                        queryMode: 'local',
                        displayField: 'name',
                        valueField: 'id'
                    }
                },
                {
                    header: 'cuenta',
                    dataIndex: 'cuenta',
                    flex: true,
                    renderer: getCuentaFromId,
                    editor: {
                        xtype: 'combo',
                        editable: false,
                        store:  Ext.data.StoreManager.lookup('cuentaStore'),
                        queryMode: 'local',
                        displayField: 'name',
                        valueField: 'id'
                    }
                },
                {
                    header: 'cantidad',
                    dataIndex: 'cantidad',
                    align: 'right',
                    type: 'numbercolumn',
                    summaryType: 'sum',
                    summaryRenderer: function(v, params, data) {
                        return 'Total ' + v;
                    },
                    editor: {
                        xtype: 'textfield',
                        allowBlank: false
                    }
                },
                {
                    header: 'notas',
                    dataIndex: 'notas',
                    flex: true,
                    editor: {
                        type: 'textfield'
                    }
                }
            ]
        });
        this.callParent();
        this.addDocked({
            xtype: 'toolbar',
            items: {
                width: 400,
                fieldLabel: 'Buscador:',
                labelWidth: 60,
                xtype: 'searchfield',
                store: this.store
            }
        });
    },
    onAddClick: function() {
        this.fireEvent('addclick', this);
        edit = this.editing;
        edit.cancelEdit();
        this.store.insert(0, new Apunte());
        edit.startEdit(0, 0);
    }


});