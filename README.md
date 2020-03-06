# Read me please

1. Ý tưởng:
  - Mô hình MVC
  - Tạo các thư viện cân dùng cho cả hệ thống
  - Controller cha liên kết tất cả các thư viện
  - Controller con kế thừa và sử dụng các hàm tương ứng
  - Tạo môt file admin nhận mọi request từ user, điều hướng đến function tương ứng
2. Demo
  - Import csdl     products.spl
  - Sửa file config.php trong folder system
  - Run file:
    http://localhost:8080/crud_mvc/admin.php?c=home 
    http://localhost:8080/crud_mvc/admin.php?c=home&a=create
