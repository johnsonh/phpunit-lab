<?php
/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 3/25/14
 * Time: 5:24 PM
 */

/*
 * TO RUN THE TESTS
 * php phpunit.phar tests/______.php
 */

require_once __DIR__ . '/../Classes/BookSearch.php';

class BookSearchTest extends PHPUnit_Framework_TestCase
{
    protected $data;

    public function setUp()
    {
        //arranged
        $this->data = [
            [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
            [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
            [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
            [ 'title' => 'Head First Java', 'pages' => 200 ]
        ];

    }

    public function test_find_javascript()
    {
        //arranged
        $search = new BookSearch($this->data);

        //act
        $results = $search->find('javascript', false);

        //assert
        var_dump($results);
        $verify = [
            [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
            [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
        ];
        $this->assertEquals($results, $verify);
    }

    public function test_find_exact()
    {
        //arranged
        $search = new BookSearch($this->data);

        //act
        $results = $search->find('javascript web applications', true);

        //assert
        var_dump($results);
        $verify = [
            [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
        ];
        $this->assertEquals($results, $verify);
    }

    public function test_find_nonexistent()
    {
        //arranged
        $search = new BookSearch($this->data);

        //act
        $results = $search->find('The Definitive Guide to Symfony', true);

        //assert
        $this->assertFalse($results);
    }








} 