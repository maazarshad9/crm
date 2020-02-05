<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Buyer;
class InvoiceController extends Controller
{
    //

    public function index(){
        $customer = new Buyer([
            'name'          => 'John Doe',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);
        
        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);
        
        $invoice = Invoice::make()
            ->buyer($customer)
            ->addItem($item);
        
        return $invoice->stream();
    }
} 
