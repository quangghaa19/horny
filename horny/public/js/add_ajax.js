function add_ajax(){
    var file_data = $('#in-file').prop('files')[0];
    var form_data = new FormData();
        //lấy ra kiểu file
        if( file_data ){
            form_data.append('id', $('#in-id').val());
            form_data.append('name', $("#in-name").val());
            form_data.append('description', $("#in-description").val());
            form_data.append('price', $("#in-price").val());
            form_data.append('file', file_data);
        } else {
            form_data.append('id', $('#in-id').val());
            form_data.append('name', $("#in-name").val());
            form_data.append('description', $("#in-description").val());
            form_data.append('price', $("#in-price").val());
        }
            
            //sử dụng ajax post
            $.ajax({
                url: 'save-add-ajax.html', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (res) {
                    //$('.status').append("Product added.");
                    $('#add-form').html(res);
                }
            });
}