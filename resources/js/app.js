import './bootstrap';
import Alpine from 'alpinejs';

$(document).ready(function() {
    $('.select2').select2({
        placeholder: function(){
            return $(this).data('placeholder');
        },
        allowClear: true
    });
});

window.Alpine = Alpine;

Alpine.start();

