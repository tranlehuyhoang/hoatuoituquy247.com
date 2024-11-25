cd /var/www/hoatuoituquy247.com
sudo rm -rf ./*
sudo rm -rf .[^.]*  # Xóa các tệp ẩn
sudo git clone  https://github.com/tranlehuyhoang/hoatuoituquy247.com.git ./ && \
sudo composer install && \
sudo cp .env.production .env && \
sudo chmod -R 777 . && \
sudo php artisan storage:link && \

# Xóa và tạo lại database
DB_NAME="hoatuoituquy247"
DB_USER="hoatuoituquy247"
DB_PASSWORD="hoatuoituquy247"  # Thay đổi mật khẩu nếu cần

# Kết nối vào MySQL
sudo mysql -u root -p -e "
DROP DATABASE IF EXISTS $DB_NAME;
CREATE DATABASE $DB_NAME;
CREATE USER IF NOT EXISTS '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';
FLUSH PRIVILEGES;"

# Nhập dữ liệu từ file SQL
sudo mysql -u $DB_USER -p$DB_PASSWORD $DB_NAME < /var/www/hoatuoituquy247.com/hoatuoituquy247.sql
