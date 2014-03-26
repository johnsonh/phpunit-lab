<?php
/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 3/4/14
 * Time: 5:54 PM
 */

class MonthlyBilling
{
    protected $cr;
    protected $campaigns;

    public function __construct($b, $a = 0.5)
    {
        $this->cr = $a;
        $this->campaigns = $b;


    }

    public function total()
    {
        $total = 0;

        foreach ($this->campaigns as $campaign)
        {
            $total = $total + $campaign['spent'];

        }

        return $total * $this->cr;

    }

    public function getInvoiceItems()
    {
        $billItems = [];

        Foreach ($this->campaigns as $campaign)
        {
            $billItems[] = [
                'campaign' => $campaign['campaign'],
                'total' => $campaign['spent'] * $this->cr
            ];
        }

        return $billItems;
    }





} 