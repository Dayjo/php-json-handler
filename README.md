# PHP JSON Handler
Class to open, modify and write json objects in files.

## Installation 
Just include the `json.php` file.
```php
require 'json.php'; 
```

Alternatively, namespace and autoload it.

## Usage

```php
<?php
$config = new JSON('config.json');
$cf =& $config->data;

$cf->name = 'dayjo';
$cf->last_edited = time();
```

