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
