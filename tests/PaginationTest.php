<?php

/*
 * This file is part of the Pagination package.
 *
 * (c) Anekdotes Communication inc. <info@anekdotes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests;

use Anekdotes\Pagination\Pagination;
use PHPUnit_Framework_TestCase;

class PaginationTest extends PHPUnit_Framework_TestCase
{
    //Tests the instantion of the Mailer
    public function testInstantiatePagination()
    {
        $pagination = new Pagination();
        $this->assertInstanceOf(Pagination::class, $pagination);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager1()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(0, 1, 6);
        $this->assertFalse($result);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager2()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(20, 1, 0);
        $this->assertFalse($result);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager3()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(5, 1);
        $this->assertFalse(false);
        $expected = [1, 2, 3, 4, 5];
        $this->assertEquals($result, $expected);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager4()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 1);
        $expected = [1, 2, 3, 4, 5, 6];
        $this->assertEquals($result, $expected);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager5()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 5);
        $expected = [2, 3, 4, 5, 6, 7, 8];
        $this->assertEquals($result, $expected);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager6()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 10);
        $expected = [4, 5, 6, 7, 8, 9, 10];
        $this->assertEquals($result, $expected);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager7()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 11);
        $expected = [4, 5, 6, 7, 8, 9, 10];
        $this->assertEquals($result, $expected);
    }

    //Tests the instantion of the Mailer
    public function testPaginationPager8()
    {
        $pagination = new Pagination();
        $result = $pagination->pager(10, 0);
        $expected = [1, 2, 3, 4, 5, 6];
        $this->assertEquals($result, $expected);
    }
}
