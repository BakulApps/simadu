var settingjs = function () {

    var _componentSelect = function () {
        $('.select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    }

    var _componentFileUpload = function () {
        $('.form-control-uniform-custom').uniform({
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas',
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400'
        })
    }

    var _componentDateTime = function () {
        $('.daterange-time').daterangepicker({
            timePicker: true,
            singleDatePicker: true,
            applyClass: 'bg-slate-600',
            cancelClass: 'btn-light',
            locale: {
                format: 'DD/MM/YYYY h:mm a'
            }
        });
    }

    return {
        init: function() {
            _componentSelect();
            _componentFileUpload();
            _componentDateTime();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    settingjs.init();
});
