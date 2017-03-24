//Need Checking
$("#spmb-needchecking").bootgrid({
    rowCount: [10, 25, 50],
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
    },
    url: base_url + "spmb/apiList/needchecking",
    formatters: {
        "link-rua": function(column, row)
        {
            if(row.flow_no=='1') {
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                    +'<a title="Edit SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '/edit" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-edit"></span></a>';
            }else{
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                    +'<a title="Approve SPMB" href="' + base_url + 'spmb/approve/' + row.flow_no + '/' + row.spmb_id + '" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-assignment-alert"></span></a>';
            }
        },
        "link-ru": function(column, row)
        {
            if(row.flow_no=='1') {
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                    +'<a title="Edit SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '/edit" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-edit"></span></a>&nbsp;&nbsp;';
            }else{
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>';
            }
        },
        "link-ra": function(column, row)
        {
            if(row.flow_no=='1') {
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>';                
            }else{
                return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                    +'<a title="Approve SPMB" href="' + base_url + 'spmb/approve/' + row.flow_no + '/' + row.spmb_id + '" class="btn btn-icon command-edit waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-assignment-alert"></span></a>';
            }
        },
        "link-r": function(column, row)
        {
            return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';
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

//On Process
$("#spmb-onprocess").bootgrid({
    rowCount: [10, 25, 50],
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
    },
    url: base_url + "spmb/apiList/onprocess",
    formatters: {
        "link-rd": function(column, row)
        {
            return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;'
                    +'<a title="Delete SPMB" href="javascript:void(0);" class="btn btn-icon btn-delete-table command-delete waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-delete"></span></a>';
        },
        "link-r": function(column, row)
        {
            return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';
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
    /* Executes after data is loaded and rendered */
    $("#spmb-onprocess").find(".command-delete").on("click", function(e)
    {
        var delete_id = $(this).data('row-id');

        swal({
          title: "Are you sure want to delete this data?",
          text: "You will not be able to recover this action!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(){
          $.ajax({
            url: base_url + 'spmb/apiDelete',
            type: 'POST',
            data: {
                'spmb_id' : delete_id,
                '_token' : $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            error: function() {
                swal("Failed!", "Deleting data failed.", "error");
            },
            success: function(data) {
                if(data==100) 
                {
                    swal("Deleted!", "Your data has been deleted.", "success");
                    //$("#spmb-onprocess").bootgrid("reload");
                    reload_datagrid();
                }else{
                    swal("Failed!", "Deleting data failed.", "error");
                }
            }
          });

          
        });
    });
});

//Finished
$("#spmb-finished").bootgrid({
    rowCount: [10, 25, 50],
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
    },
    url: base_url + "spmb/apiList/finished",
    formatters: {
        "link-r": function(column, row)
        {
            return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';
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

//Canceled
$("#spmb-canceled").bootgrid({
    rowCount: [10, 25, 50],
    ajax: true,
    post: function ()
    {
        /* To accumulate custom parameter with the request object */
        return {
            '_token': $('meta[name="csrf-token"]').attr('content')
        };
    },
    url: base_url + "spmb/apiList/canceled",
    formatters: {
        "link-r": function(column, row)
        {
            return '<a title="View SPMB" href="' + base_url + 'spmb/' + row.spmb_id + '" class="btn btn-icon command-detail waves-effect waves-circle" type="button" data-row-id="' + row.spmb_id + '"><span class="zmdi zmdi-more"></span></a>&nbsp;&nbsp;';
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
    $("#spmb-onprocess").bootgrid("reload");
    $("#spmb-needchecking").bootgrid("reload");
    $("#spmb-finished").bootgrid("reload");
    $("#spmb-canceled").bootgrid("reload");
}