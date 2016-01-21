# elastic-heart
This module is going to be the heart of various online/offline events.

The project is based on the laravel web framework for PHP.

## Installing Composer
Run these commands to globally install composer on your system:

`curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer`

Note: If the above fails due to permissions, run the mv line again with sudo.
A quick copy-paste version including sudo:

`curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`

Note: On some versions of OSX the /usr directory does not exist by default. If you receive the error `"/usr/local/bin/composer: No such file or directory" then you must create the directory manually before proceeding: mkdir -p /usr/local/bin.`

Note: For information on changing your PATH, please read the Wikipedia article and/or use Google.

Now just run composer in order to run Composer 

## Setting Up The Project
After composer has been installed you can just run `composer install` in the projects root directory.

This will install all the dependencies of the project and you are ready to go.
