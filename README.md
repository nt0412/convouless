<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
 

## About Project

web tin tức được viết bằng ngôn ngữ PHP sự dụng framework laravel

### Chức năng chính của website
- Đọc báo
- Xem thông tin covid ([src](https://api.apify.com/v2/key-value-stores/EaCBL1JNntjR3EakU/records/LATEST?disableRedirect=true))
- Đăng ký tài khoản
- Đăng nhập tài khoản
- Đăng bài báo
- xóa bài
- Sửa bài
- Quản lý lược xem 


## Cách chạy dự án

### Chuẩn bị 
- Composer =>2.3.5 ([tải và cài](https://getcomposer.org/download/))
- PHP  7.4.29 ([tải và cài](https://www.php.net/downloads.php))
- Xampp  ([tải và cài](https://www.apachefriends.org/download.html))

Bước 1: clone project vào thư mục chỉ định của xampp (ex: 'c:/xampp/htdocs/')

Bước 2: coppy file .env-example thành .env

bước 3: [import database vào mysql](https://blog.templatetoaster.com/xampp-phpmyadmin/)

Bước 4: cài đặt các thư viện khác bằng composer
mở cmd thư mục clone
```bash
composer install
```
or Chạy trực tiếp
```bash
php artisan sever
```

or chạy qua xampp

mở xampp start apache && mysql 

trang home
[http://localhost:8888/convouless/](http://localhost:8888/convouless)

đăng nhập dashboard 
[http://localhost:8888/convouless/admin](http://localhost:8888/convouless/admin)

pass: admin@gmail.com 

pass: 12345678

#image
## Home
<img alt="Awesome GitHub Profile Readme" src="https://github.com/nt0412/convouless/blob/92be4f4d935b480575541c7e4020e8a291119fe1/image/page_home.png"> </img>

## Dashboad
<img alt="Awesome GitHub Profile Readme" src="https://github.com/nt0412/convouless/blob/92be4f4d935b480575541c7e4020e8a291119fe1/image/dashboad.png"> </img>
