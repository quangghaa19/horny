/**/

function edit_ajax(id)
            {
                $.ajax({
                    url : "./public/template/admin/edit_row.php", // gửi ajax đến file edit_row.php
                    type : "post", // chọn phương thức gửi là post
                    dateType:"text", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                         //number : $('#number').val()
                         id : $('#id-'+id).text(),
                         name : $('#name-'+id).text(),
                         description : $('#description-'+id).text(),
                         price : $('#price-'+id).text(),
                         image : $('#h-img-'+id).attr('src')
                    },
                    success : function (result){
                        // Sau khi gửi và kết quả trả về thành công thì gán nội dung trả về
                        // đó vào thẻ div có id = result
                        $('#row-' + id).addClass('light-grey');
                        $('#row-' + id).html(result);
                    }
                });
            }

function save_ajax(id, image)
            {
                // URL
                var url = "./public/template/admin/save_row.php";
                
                // Proceeding image 
                //var new_img_name = "";
                var save_img = "";
                var new_img_name="";
                if( ($('#in-image-'+id)[0].files) && ($('#in-image-'+id)[0].files[0]) )
                    new_img_name = $('#in-image-'+id)[0].files[0].name;
                if( new_img_name == "" ){
                    save_img = image;
                } else {
                    save_img = new_img_name; 
                }
                
                // Data
                var data = {
                        id : $('#id-'+id).text(),
                        name : $('#in-name-'+id).val(),
                        description : $('#in-description-'+id).val(),
                        price : $('#in-price-'+id).val(),
                        image : save_img
                    };
                
                // Success Function
                var success = function (result){
                    $('#row-' + id).removeClass('light-grey');
                    $('#row-' + id).html(result);
                };
                
                // Result Type
                var dataType = 'text';
                
                // Send Ajax
                $.post(url, data, success, dataType);
            }