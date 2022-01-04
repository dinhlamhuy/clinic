$(document).ready(function() {
    $('#dsthuoc').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    $(".select2").select2();
} );

$('#quanlykho').addClass('active');
$('#quanlythuoc').addClass('active');



// $(document).ready(function() {
//     // Setup - add a text input to each footer cell
//     $('#dsthuoc tfoot th').each( function () {
//         var title = $(this).text();
//         $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
//     } );
 
//     // DataTable
//     var table = $('#dsthuoc').DataTable({
//         initComplete: function () {
//             // Apply the search
//             this.api().columns([1,2,3]).every( function () {
//                 var that = this;
 
//                 $( 'input', this.footer() ).on( 'keyup change clear', function () {
//                     if ( that.search() !== this.value ) {
//                         that
//                             .search( this.value )
//                             .draw();
//                     }
//                 } );
//             });
//         },
        
       
 
// } );
// } );

// $(document).ready(function() {
//     $('#dsthuoc').DataTable( {
//         initComplete: function () {
//             this.api().columns([1,2,3]).every( function () {
//                 var column = this;
//                 var select = $('<select><option value=""></option></select>')
//                     .appendTo( $(column.footer()).empty() )
//                     .on( 'change', function () {
//                         var val = $.fn.dataTable.util.escapeRegex(
//                             $(this).val()
//                         );
 
//                         column
//                             .search( val ? '^'+val+'$' : '', true, false )
//                             .draw();
//                     } );
 
//                 column.data().unique().sort().each( function ( d, j ) {
//                     select.append( '<option value="'+d+'">'+d+'</option>' )
//                 } );
//             } );
//         },
//         language: {
        
//             url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
//         },
//     } );
// } );