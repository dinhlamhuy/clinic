$('#quanlythuocne').addClass('active');
$('#quanlynhomthuoc').addClass('active');

$(document).ready(function() {
    $('#dsnhomthuoc').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    
} );