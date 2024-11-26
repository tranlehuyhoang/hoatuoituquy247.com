cd /var/www/hoatuoituquy247.com
sudo rm -rf ./*
sudo rm -rf .[^.]*  # Xóa các tệp ẩn
sudo git clone  https://github.com/tranlehuyhoang/hoatuoituquy247.com.git ./ && \
sudo composer install && \
sudo cp .env.production .env && \
sudo chmod -R 777 . && \
sudo php artisan storage:link && \
sudo cp .env.production .env && \
# Kết nối vào MySQL
sudo mysql -u root -p -e "
DROP DATABASE IF EXISTS hoatuoituquy247;
CREATE DATABASE hoatuoituquy247;
CREATE USER IF NOT EXISTS 'hoatuoituquy247'@'localhost' IDENTIFIED BY 'hoatuoituquy247';
GRANT ALL PRIVILEGES ON hoatuoituquy247.* TO 'hoatuoituquy247'@'localhost';
FLUSH PRIVILEGES;"

# Nhập dữ liệu từ file SQL
sudo mysql hoatuoituquy247 < /var/www/hoatuoituquy247.com/hoatuoituquy247.sql
