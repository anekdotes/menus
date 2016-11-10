# Anekdotes Menus

[![Latest Stable Version](https://poser.pugx.org/anekdotes/menus/v/stable)](https://packagist.org/packages/anekdotes/menus)
[![Build Status](https://travis-ci.org/anekdotes/menus.svg?branch=master)](https://travis-ci.org/anekdotes/menus)
[![codecov.io](https://codecov.io/github/anekdotes/menus/coverage.svg)](https://codecov.io/github/anekdotes/menus?branch=master)
[![StyleCI](https://styleci.io/repos/65294364/shield?style=flat)](https://styleci.io/repos/65294364)
[![License](https://poser.pugx.org/anekdotes/menus/license)](https://packagist.org/packages/anekdotes/menus)
[![Total Downloads](https://poser.pugx.org/anekdotes/menus/downloads)](https://packagist.org/packages/anekdotes/menus)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/50134febcefe4cc78daf07ca45969728)](https://www.codacy.com/app/Grasseh/menus?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=anekdotes/menus&amp;utm_campaign=Badge_Grade)

---

Utility to generate an intelligent "range" of links based on the current page and total pages.

## Installation

Install via composer in your project :

    composer require anekdotes/menus

## Basic usage

Load the class

```php
  use Anekdotes\Menus\Menus;
```

Add menu using the class' method

```php
  Menus::addItem('test 1', '/test1', 'fa-potato');
```

You can also specify the level and position

```php
  Menus::addItem('test 1', '/test1', 'fa-potato', 1, 1);
```

You can also add a namespace

```php
  Menus::addItem('test 1', '/test1', 'fa-potato', 1, 1, 'potato');
```

Fetch all main menus

```php
  $items = Menus::main();
```

Or get all menus from a desired level and namespace

```php
  $items = Menus::get('potato', 1);
```

## Advanced

#### addItem

Method to add an item to the menu's array

```php
  Menus::addItem($title, $url, $icon, $level, $position, $namespace);
  //$title the link title/name/text
  //$url the link url
  //$icon the link icon (font-awesome, ex: fa-times)
  //$level the link level (default: 1)
  //$position the link position (default: 0)
  //$namespace the link namespace (default: "")
```

#### removeItem

Method to remove an item from the menu's array

```php
  Menus::removeItem($level, $position);
  //$level link level
  //$position the link position
```

#### find

Method to find a specific item from the menu's array

```php
  Menus::find($level, $position);
  //$level link level
  //$position the link position
```

#### main

Method to get all level 1 item

```php
  Menus::main($sort);
  //$sort sorting either SORT_ASC or SORT_DESC (default: SORT_ASC)
```

#### clear

Method to clear all items from menu's array

```php
  Menus::clear();
```

#### get

Method to get all item from desired level and namespace

```php
  Menus::get($namespace, $level);
  //$namespace the link namespace (default: "")
  //$level the link level (default: 1)
```
