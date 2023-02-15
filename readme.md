

## Roman Numeral Task

This is code for the Roman Numeral Task for Swift Dental.

- Converts large Numbers < 100,000
- React frontend
- Laravel backend.
- Commandline and Webapp



## Requirements

The Following are required to install this application.

- A POSIX system (Linux or Mac)
- PHP 7.1+ (going to Test it on PHP 8 before I submit)
- NodeJS v18.14.0
- composer
- Laravel 6+ 

#### Installing 
To install: 

Downlaod Composer and make it an executable.


````
curl https://getcomposer.org/download/2.2.20/composer.phar -o composer.phar

sudo chmod +x composer.phar
````


Download this repository and change directory to it.
````
git clone https://github.com/UchuuJ/roman-numerals-test
cd roman-numerals-test
````

Run composer install
```
php ../composer.phar install
```

Run npm install
```
npm install
```

Build assets 
```
npm run dev
```

and then the app should be ready for use.

## Using the commandline

#### To convert Integers to Roman numerals,

Run 
```
php artisan roman-numerals:convert-to $INTEGER-TO-CONVERT
```
and the app should out put your converted integer 

```
php artisan roman-numerals:convert-to 2
2 converted to Roman Numeral is: II
```

#### To convert Roman Numerals to Integers

Run
```
php artisan roman-numerals:convert-from $NUMERALS-TO-CONVERT
```
and the app should out put your converted Numeral

```
php artisan roman-numerals:convert-from XVI

Roman Numeral XVI converted to Number is: 16
```

## Using the webapp

To use the webapp run
```
php artisan serve
``` 
PHP will then create a [server](http://127.0.0.1:8000) usually 
```
http://127.0.0.1:8000
```

and then just fill in the form with the value you want to convert
 
select the mode you want to use 

and click convert! 


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
