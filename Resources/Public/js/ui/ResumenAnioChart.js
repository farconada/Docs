Ext.define('Sifpe.chart.ResumenAnio', {
    extend: 'Ext.chart.Chart',
    alias: 'widget.resumenaniochart',

    initComponent: function() {
        Ext.apply(this, {
            animate: true,
            shadow: true,
            legend: {
                position: 'bottom'
            },
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
                    fields: ['mes'],
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
                    xField: 'mes',
                    yField: 'cantidad',
                    tips: {
                        trackMouse: true,
                        width: 74,
                        height: 38,
                        renderer: function(storeItem, item) {
                            this.setTitle(item.value[1]);
                        }
                    }
                },
                {
                    type: 'line',
                    axis: 'left',
                    highlight: true,
                    xField: 'mes',
                    yField: 'cantidad_anterior',
                    tips: {
                        trackMouse: true,
                        width: 74,
                        height: 38,
                        renderer: function(storeItem, item) {
                            this.setTitle(item.value[1]);
                        }
                    },
                    style: {
                        fill: '#18428E',
                        stroke: '#18428E',
                        'stroke-width': 3
                    }

                }
            ]
        });
        this.callParent();
    }

});