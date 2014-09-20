#!/bin/sh
service nginx restart
cp /vagrant/files/20-xdebug.ini /etc/php5/fpm/conf.d/20-xdebug.ini
service nginx restart
/usr/local/bin/composer self-update
echo "" >> /home/vagrant/.bashrc
echo "PATH=$PATH:/home/vagrant/svpercrm/vendor/bin" >> /home/vagrant/.bashrc
echo "export PATH" >> /home/vagrant/.bashrc
mysql -u homestead -psecret -e "GRANT ALL PRIVILEGES ON homestead.* TO 'travis'@'%' IDENTIFIED BY ''"