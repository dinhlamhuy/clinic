$('#quanlythuocne').addClass('active');
$('#quanlygocthuoc').addClass('active');
$(document).ready(function() {
    $('#dsgocthuoc').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    
} );