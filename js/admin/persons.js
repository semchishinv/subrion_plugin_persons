Ext.onReady(function()
{
    if (Ext.get('js-grid-placeholder'))
    {
        var grid = new IntelliGrid(
        {
            columns:[
                'selection',
                {name: 'fullname', title: _t('fullname'), width: 1, editor: 'text'},
                {name: 'gender', title: _t('gender'), width: 1, editor: 'text'},
                {name: 'date_added', title: _t('date_added'), width: 100, hidden: true},
                {name: 'date_modified', title: _t('date_modified'), width: 100, hidden: true},
                'status',
                {name: 'featured', title: _t('featured'), width: 100, editor: 'text'},
                'update',
                'delete'
            ],
        }, false);

        grid.toolbar = new Ext.Toolbar({items:[
        {
            emptyText: _t('fullname'),
            listeners: intelli.gridHelper.listener.specialKey,
            name: 'fullname',
            width: 250,
            xtype: 'textfield'
        },
        {
            displayField: 'title',
            editable: false,
            emptyText: _t('gender'),
            id: 'fltGender',
            name: 'gender',
            store: ['Male','Female' ],
            typeAhead: true,
            valueField: 'value',
            width: 200,
            xtype: 'combo'
        }
        ,{
            displayField: 'title',
            editable: false,
            emptyText: _t('status'),
            id: 'fltStatus',
            name: 'status',
            store: grid.stores.statuses,
            typeAhead: true,
            valueField: 'value',
            width: 100,
            xtype: 'combo'
        },{
            handler: function(){intelli.gridHelper.search(grid)},
            id: 'fltBtn',
            text: '<i class="i-search"></i> ' + _t('search')
        },{
            handler: function(){intelli.gridHelper.search(grid, true)},
            text: '<i class="i-close"></i> ' + _t('reset')
        }]});

        grid.init();
    }
});