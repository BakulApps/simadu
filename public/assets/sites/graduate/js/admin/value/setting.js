var settingjs = function () {
    var _componetnDataTable = function () {
        $('.year_id').change(function () {
            $('.datatable-setting').DataTable().ajax.reload();
        })
        $('.setting_id').change(function () {
            $('.datatable-setting').DataTable().ajax.reload();
        })
        $('.datatable-setting').DataTable({
            bprocessing: true,
            bserverSide: true,
            ajax:({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/penilaian/setting',
                type: 'post',
                dataType: 'json',
                data: function (d) {
                    d._type = 'data';
                    d._data = 'all';
                    d.year_id = $('.year_id').val();
                    d.setting_id = $('.setting_id').val();
                },
            }),
            autoWidth: false,
            bLengthChange: true,
            bSort: false,
            scrollX: true,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '_INPUT_',
                binfo: false,
                orderable: false,
                searchPlaceholder: 'Pencarian...',
                lengthMenu: '<span>Tampilkan:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') === 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') === 'rtl' ? '&rarr;' : '&larr;' }
            },
        })
    }

    var _componentSelect = function () {
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
        $('.select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    }

    var _componentUniform = function () {
        $('.form-control-uniform-custom').uniform({
            fileButtonClass: 'action btn bg-blue',
            selectClass: 'uniform-select bg-pink-400 border-pink-400',
            fileButtonHtml: 'Pilih Berkas',
            fileDefaultHtml: 'Tidak ada berkas terpilih'
        });
    }

    var _componentSubmit = function () {
        $('#submit').click(function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: baseurl + '/penilaian/pengaturan',
                type: 'post',
                data: {
                    _type: 'update',
                    setting_value_semester_point: $('#setting_value_semester_point').val(),
                    setting_value_exam_point: $('#setting_value_exam_point').val(),
                },
                success: function(resp){
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-' + resp['class'] + ' border-' + resp['class'] + ' alert-styled-left'
                    });
                },
            });

        })
    }

    return {
        init: function() {
            _componentSubmit()
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    settingjs.init();
});
