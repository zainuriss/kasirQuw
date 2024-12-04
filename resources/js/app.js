import './bootstrap';
import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('.select2').select2({
        placeholder: function(){
            return $(this).data('placeholder');
        },
        allowClear: true
    });
});

$(document).ready(function () {
    $('.myTable').DataTable({
        columnDefs: [{
            targets: [4], 
            searchable: false // Menonaktifkan fitur pencarian pada kolom ini
        }]
    });
});
