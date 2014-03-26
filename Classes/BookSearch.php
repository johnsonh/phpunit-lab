<?php
/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 3/25/14
 * Time: 5:23 PM
 */

class BookSearch
{
    protected $books;

    public function __construct($b)
    {
        $this->books = $b;
    }

    public function find($term, $exactMatch)
    {
        $arr = array();

        $term = strtolower($term);
        echo PHP_EOL . $term . PHP_EOL;

        foreach ($this->books as $book)
        {
            $bookTitle = strtolower($book['title']);

            if ($exactMatch)
            {
                if ($bookTitle == $term)
                {
                    array_push($arr, $book);
                }
            }
            else
            {
                if (strstr($bookTitle, $term))
                {
                    //found
                    array_push($arr, $book);
                }
            }

        }

        if ($arr)
        {
            return $arr;
        }
        else
        {
            return false;
        }
    }


} 