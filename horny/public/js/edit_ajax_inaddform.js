function edit_ajax_inaddform()
            {
                $.ajax({
                    url : "edit-ajax.html", // gửi ajax đến file edit_ajax_inaddform.php
                    type : "post", // chọn phương thức gửi là post
                    dateType:"text", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                         id : $('#id').text(),
                         name : $('#name').text(),
                         description : $('#description').text(),
                         price : $('#price').text(),
                         //image : $('#image').attr('src')
                    },
                    success : function (result){
                        $('#add-form').html(result);
                    }
                });
            }
