<?php
/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 3/4/14
 * Time: 5:55 PM
 */

require_once __DIR__ . '/../Classes/MonthlyBilling.php';

class MonthlyBillingTest extends PHPUnit_Framework_TestCase
{
    protected $data;

    public function setUp()
    {
        //arranged
        $this->data = [
            [ 'campaign' => 'C 1', 'spent' => 10 ],
            [ 'campaign' => 'C 2', 'spent' => 30 ],
            [ 'campaign' => 'C 3', 'spent' => 20 ]
        ];

    }

    public function tearDown()
    { }

    public function test_total_spent_with_commission_rate()
    {
        $cr = 0.1;

        //arranged
        $bill = new MonthlyBilling($this->data, $cr);

        //act
        $total = $bill->total();

        //assert
        $this->assertEquals(60 * $cr, $total);

    }

    public function test_total_spent_without_commission_rate()
    {
        //arranged
        $bill = new MonthlyBilling($this->data);

        //act
        $total = $bill->total();

        //assert
        $this->assertEquals(60 * 0.5, $total);  //0.5 is the default

    }

    public function test_get_invoice_items()
    {
        $bill = new MonthlyBilling($this->data);

        $items = $bill->getInvoiceItems();

        $expected = [
            [ 'campaign' => 'C 1', 'total' => 10 * 0.5 ],
            [ 'campaign' => 'C 2', 'total' => 30 * 0.5 ],
            [ 'campaign' => 'C 3', 'total' => 20 * 0.5 ]
        ];

        $this->assertEquals($expected, $items);

    }










}