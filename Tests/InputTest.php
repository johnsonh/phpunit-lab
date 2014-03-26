<?php
/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 3/25/14
 * Time: 9:42 PM
 */

require_once __DIR__ . '/../Classes/Input.php';

class InputTest extends PHPUnit_Framework_TestCase
{
    public function tearDown1()
    {
        unset($_GET['email']);
    }

    public function tearDown2()
    {
        unset($_GET['email']);
    }

    public function test_get_input()
    {
        $_GET['email'] = 'dtang@usc.edu';

        $results = Input::get('email'); // 'dtang@usc.edu';

        $this->assertEquals($results, 'dtang@usc.edu');

        $this->tearDown1();
    }

    public function test_null_and_default()
    {
        $result1 = Input::get('email'); // null, see assertNull()

        $this->assertNull($result1);

        $result2 = Input::get('plan', 'standard');

        $this->assertEquals($result2, 'standard');
    }



} 