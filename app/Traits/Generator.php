<?php

namespace App\Traits;

use App\Invoice;

/**
 * Keeps a record of methods to generate varous random strings.
 */
trait Generator
{
    /**
     * summary
     */
    public function randString($length = 32)
    {
           $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }

    public function invoiceNumber()
    {
       return Invoice::orderBy('id','desc')->first() ? Invoice::orderBy('id','desc')->first()->invoice_id + 1 :1000 ;
    }
}
