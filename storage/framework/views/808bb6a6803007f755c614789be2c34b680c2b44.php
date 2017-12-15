<style>
    .kv-avatar .file-preview-frame, .kv-avatar .file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }

    .kv-avatar .file-input {
        display: table-cell;
        max-width: 220px;
    }
    .file-zoom-content {
        height: 0 !important;
    }
    .file-input .kv-file-zoom {
        display: none;
    }
    .file-preview-image{
        height: auto !important;
    }
</style>

<script>
    jQuery(function($){
        var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' +
                'onclick="alert(\'Call your custom code here.\')">' +
                '<i class="glyphicon glyphicon-tag">Thẻ</i>' +
                '</button>';
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open">Mở </i>',
            removeIcon: '<i class="glyphicon glyphicon-remove">Xoá</i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="<?php echo @$image_default; ?>" alt="Your Image" style="width:160px">',
            layoutTemplates: {main2: '{preview} ' + btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    });
</script>