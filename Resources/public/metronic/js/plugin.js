$(document).ready(function(){
    /* 删除标准提示 */
    $('.delete-link').confirmation({
        title: '您确定删除吗？',
        btnOkLabel: '删除',
        btnOkIcon: '',
        btnCancelLabel: '取消',
        btnCancelIcon: '',
        onConfirm: function(event) {
            var did = this.did;

            $('#delete_form_hidden_'+did).submit();
        }
    });

    /* summer note 编辑器 */
    $('.summernote').summernote({
        height: 150,
        lang: 'zh-CN',
        fontSizes: ['8', '9', '10', '11', '12', '14', '16', '24', '32', '64'],
		toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['fontsize', ['fontsize']],
			['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
			['height', ['height']],
			['misc', ['fullscreen']],
		]
    });
    $('.summernote').parent().removeClass('col-md-4');
    $('.summernote').parent().addClass('col-md-6');

});
