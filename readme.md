# Anekdotes Pagination

[![Latest Stable Version](https://poser.pugx.org/anekdotes/pagination/v/stable)](https://packagist.org/packages/anekdotes/pagination)
[![Build Status](https://travis-ci.org/anekdotes/pagination.svg?branch=master)](https://travis-ci.org/anekdotes/pagination)
[![codecov.io](https://codecov.io/github/anekdotes/pagination/coverage.svg)](https://codecov.io/github/anekdotes/pagination?branch=master)
[![StyleCI](https://styleci.io/repos/62647499/shield?style=flat)](https://styleci.io/repos/62647499)
[![License](https://poser.pugx.org/anekdotes/pagination/license)](https://packagist.org/packages/anekdotes/pagination)
[![Total Downloads](https://poser.pugx.org/anekdotes/pagination/downloads)](https://packagist.org/packages/anekdotes/pagination)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/50134febcefe4cc78daf07ca45969728)](https://www.codacy.com/app/Grasseh/pagination?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=anekdotes/pagination&amp;utm_campaign=Badge_Grade)

Utility to generate an intelligent "range" of links based on the current page and total pages.

## Installation

Install via composer into your project:

    composer require anekdotes/pagination

## Basic Usage

Instantiate de class and use the pager method with a few parameters.

*  $pages: total number of pages

*  $current: current page

*  $length (optional): how many page to display

```
    use Anekdotes\Pagination\Pagination;

    $pagination = new Pagination();
    var_dump($pagination->pager(10, 1));
    /*
    array(6) {
      [0]=>
      int(1)
      [1]=>
      int(2)
      [2]=>
      int(3)
      [3]=>
      int(4)
      [4]=>
      int(5)
      [5]=>
      int(6)
    }
    */
```
