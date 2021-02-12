$("#peserta-tbl").DataTable({
    "ordering": false,
});

$('.btn-add').click(function() {
    // $('.modal-form .modal-title').html('Tambah Role');
    // $('.modal-form #h-mode').val('add');
    // $('.modal-form #form').attr('action','role/add');
    $('.modal-form').modal('show');
});

$('#peserta-tbl tbody').on('click', '.btn-view', function () {
    id = $(this).attr('data-id');
    if(id != ""){
        
        //--> GET DATA
        $.ajax({
            url : 'peserta/getpeserta',
            type: "GET",
            dataType: "json",
            data : "id="+id,
            success: function(data, textStatus, jqXHR)
            {
                console.log(data);

                $('.modal-view').modal('show');
            }
        });
    }else{

        // alert(id);
    }

});

$('#peserta-tbl tbody').on('click', '.btn-edit', function () {
    id = $(this).attr('data-id');
    if(id != ""){
        
        //--> GET DATA
        $.ajax({
            url : 'peserta/getpeserta',
            type: "GET",
            dataType: "json",
            data : "id="+id,
            success: function(data, textStatus, jqXHR)
            {
                console.log(data);

                $('.modal-form').modal('show');
            }
        });
    }else{

        // alert(id);
    }

});

$('#peserta-tbl tbody').on('click', '.btn-delete', function () {
    id = $(this).attr('data-id');
    if(id != ""){
        
        //--> GET DATA
        $.ajax({
            url : 'peserta/getpeserta',
            type: "GET",
            dataType: "json",
            data : "id="+id,
            success: function(data, textStatus, jqXHR)
            {
                console.log(data);

                $('.modal-delete').modal('show');
            }
        });
    }else{

        // alert(id);
    }

});

/** add active class and stay opened when selected */
var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
     return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
     return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

