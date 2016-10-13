phpenv global 5.6
sudo rm -f /var/run/mysqld/mysqld.pid
sudo mysqld_safe &
cd /home/travis/brewblogger
sleep 10
mysql -e 'create database brewblogger'
mysql -u root -e "CREATE USER 'brewblogger'@'localhost' IDENTIFIED BY 'brewblogger'"
mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'brewblogger'@'localhost' WITH GRANT OPTION;"
mysql -u root -e "FLUSH PRIVILEGES;"
mysql -u root brewblogger < sql/3.0.0_new_install.sql
mysql -u root brewblogger -e 'UPDATE preferences SET mode=2;'
composer self-update
composer install --dev --no-interaction
#sed -i "s/display_errors = On/display_errors = Off/" /home/travis/.phpenv/versions/5.6.5/etc/php.ini
php -S 0.0.0.0:8000 -t web/
