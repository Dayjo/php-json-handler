# PHP JSON Handler
Class to open, modify and write json objects in files.

## Installation 
Just include the `json.php` file.
```php
require 'src/json.php';
```

Alternatively, namespace and autoload it.

## Usage

Basic usage includes auto saving, so you just modify the data and it saves!

```php
<?php
$JSON = new JSON('config.json');
$config =& $JSON->data; // You could just do $config->data->name = ...

$config->name = 'dayjo';
$config->last_edited = time();
```

## Options

### Auto Save
The optional second parameter to the JSON class allows you to turn off auto save, and make it so you have to run the save function manually for instance;

```php
<?php
$JSON = new JSON('config.json', false);
$config =& $JSON->data;

$config->name = 'dayjo';

$JSON->save();
```
