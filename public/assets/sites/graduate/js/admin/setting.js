var settingjs = function () {
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

    return {
        init: function() {
            _componentDateTime();
            _componentSelect();
            _componentFileUpload();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    settingjs.init();
});
