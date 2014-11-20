# Category

[![Build Status](https://travis-ci.org/tsmsogn/Category.svg)](https://travis-ci.org/tsmsogn/Category)

Simple category plugin for CakePHP.

## Requirements

- CakePHP 2.5.x or later

## Features

- Admin CRUD, sorting order

## Installation

Put your app plugin directory as `Category`.

### Enable plugin

In 2.0 you need to enable the plugin your app/Config/bootstrap.php file:

```php
<?php
CakePlugin::load('Category', array('bootstrap' => false, 'routes' => true));
?>
```

### Update schema

In your app directory type:

```shell
Console/cake schema update -p Category
```

## Usage

### CategoryHelper

- Example of creating nested link in view:

```php
<?php
echo $this->Category->nestedCategories($categories, array(
	'link' => true,
	'tag' => 'ul',
	'tagAttributes' => null,
	'plugin' => 'Category',
	'controller' => 'categories',
	'action' = 'view',
));
?>
```

`$categories` is assigned with `$this->Category->find('threaded', array('order' => array('Category.lft' => 'ASC')));`

## License

The MIT License (MIT)