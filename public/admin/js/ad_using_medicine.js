$('#quanlythuocne').addClass('active');
$('#quanlycsd').addClass('active');
$(document).ready(function() {
    $('#dscsd').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json'
        },
    });
    
} );