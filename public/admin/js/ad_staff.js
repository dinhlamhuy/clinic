$(document).ready(function() {
    $('#dsnhanvien').DataTable( {
        initComplete: function () {
            this.api().columns([3,6]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
            
        },
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
        
    } );
    // $('#dsnhanvien').DataTable({
        // language: {
        //     url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        // },
    // });
    $(".select2").select2();
} );

$('#quanlynhansu').addClass('active');
$('#quanlynhanvien').addClass('active');

$("#btnexcel").click(function(){
    $("#xuatexcelnv").table2excel({
        name: "Worksheet Name",
        filename: "DanhSachNhanVien",
        fileext: ".xls"
    }) 
 });

