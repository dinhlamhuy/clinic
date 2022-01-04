$('#quanlykho').addClass('active');
$('#quanlyphieunhapthuoc').addClass('active');

$(document).ready(function() {
    $('#dsctlnt').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    $(".select2").select2();
} );