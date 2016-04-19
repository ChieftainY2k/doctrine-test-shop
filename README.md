**Instalaltion**

* vagrant plugin install vagrant-hostmanager
* cd vagrant/lamp-phpmyadmin
* vagrant up
* vagrant ssh
* cd /var/www/mysite
* composer install
* create scheme: 
  vendor/bin/doctrine orm:schema-tool:create --force
* clear cache: 
  vendor/bin/doctrine orm:clear-cache:metadata && vendor/bin/doctrine orm:clear-cache:result && vendor/bin/doctrine orm:clear-cache:query


**VM local website**

* http://www.shop.dev:8000/
* http://phpmyadmin.shop.dev:8000/
