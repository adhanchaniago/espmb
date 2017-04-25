//Need Checking
$("#migo-needchecking").bootgrid({
    rowCount: [10, 25, 50],
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
    },
    url: base_url + "spmb/apiListMigo",
    formatters: {
        "link-ra": function(column, row)
        {
            if(row.flow_no=='1') {
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>';                
            }else{
                return '<a title="View SPMB" target="_blank" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                    +'<a title="Approve SPMB" target="_blank" href="' + base_url + 'spmb/approve/' + row.flow_no + '/' + row.spmb_id + '" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-assignment-alert"></span></a>';
            }
        }
    },
    converters: {
        datetime: {
            from: function (value) { return moment(value); },
            to: function (value) { return moment(value).format("DD/MM/YYYY"); }
        }
    }
}).on("loaded.rs.jquery.bootgrid", function()
{
    
});



function reload_datagrid() {
    $("#migo-needchecking").bootgrid("reload");
}