<?php

/*
 * This file is part of the Menus package.
 *
 * (c) Anekdotes Communication inc. <info@anekdotes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

use Anekdotes\Menus\Menus;
use PHPUnit_Framework_TestCase;

class MenusTest extends PHPUnit_Framework_TestCase
{
    public function testMenus1()
    {
        try {
            Menus::addItem();
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testMenus2()
    {
        try {
            Menus::addItem('');
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testMenus3()
    {
        try {
            Menus::addItem('', '');
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testMenus4()
    {
        try {
            Menus::addItem('test 1', '/test1', 'fa-patate');
            $items = Menus::get();
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testMenus5()
    {
        try {
            Menus::addItem('test 1', '/test1', 'fa-patate');
            $items = Menus::get('');
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testMenus6()
    {
        Menus::clear();
        Menus::addItem('test 1', '/test1', 'fa-patate');
        $items = Menus::get('', 1);
        $this->assertEquals(count($items), 1);
    }

    public function testMenus7()
    {
        Menus::clear();
        Menus::addItem('test 1', '/test1', 'fa-potato');
        Menus::addItem('test 2', '/test2', 'fa-tomato');
        $items = Menus::get('', 1);
        $this->assertEquals(count($items), 2);
    }

    public function testMenus8()
    {
        Menus::clear();
        Menus::addItem('test 1', '/test1', 'fa-potato');
        Menus::addItem('test 2', '/test2', 'fa-tomato');
        $items = Menus::main();
        $this->assertEquals(count($items), 2);
    }

    public function testMenus9()
    {
        Menus::clear();
        Menus::addItem('test 1', '/test1', 'fa-potato', 1, 2);
        Menus::addItem('test 2', '/test2', 'fa-tomato', 1, 1);
        $items = Menus::main();
        $this->assertEquals($items[0]['title'], 'test 2');
    }

    public function testMenus10()
    {
        Menus::clear();
        Menus::addItem('test 1', '/test1', 'fa-potato', 1, 2);
        Menus::addItem('test 2', '/test2', 'fa-tomato', 1, 1);
        $items = Menus::main(SORT_DESC);
        $this->assertEquals($items[0]['title'], 'test 1');
    }

    public function testMenus11()
    {
        Menus::clear();
        Menus::addItem('test 1', '/test1', 'fa-potato', 1, 2);
        Menus::addItem('test 2', '/test2', 'fa-tomato', 1, 1);
        Menus::removeItem(1, 2);
        $items = Menus::main();
        $this->assertEquals(count($items), 1);
    }
}
