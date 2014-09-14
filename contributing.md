## Contributing

Bug Reports and Pull Requests are encouraged. The primary agency needs will always be a factor.

Please branch off ```dev``` branch into your own feature/bugfix brances and issues Pull Requests against ```dev```.

### Getting Started

* Clone this repo
* Add ```192.168.9.9    svpercrm.dev``` to your hosts file
* Run ```vagrant up``` in this folder
* Run ```vagrant ssh```
* Run ```cd svpercrm```
* Run ```composer install```
* Run ```bower install```
* Run ```artisan migrate```
* Run ```artisan db:seed```
* Browse to http://svpercrm.dev
* Admin log in: admin@admin.com / sentryadmin
* User log in: user@user.com / sentryuser