$(document).ready(function() {
    $('#dschucvu').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    $(".select2").select2();
} );

$('#quanlynhansu').addClass('active');
$('#quanlychucvu').addClass('active');
