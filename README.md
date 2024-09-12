### Fast Site Development Framework 

### CorePhp With Route


### Feature

### web.php

```php
<?php

Route::page('/', function(){
	redirect( route('hello', false) );
}, 'home');


Route::page( 'hello', function(){
	return view('hello.php');
}, 'hello' );


Route::notFound(function () {
	return view('not_found.php');
}, 'not_found');


```

### hello.php

```php

<h3>
	Hello From View File
</h3>

```