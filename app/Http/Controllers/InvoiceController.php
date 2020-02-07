<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Buyer;

use App\Models\Project;

class InvoiceController extends Controller
{
    //


    public function index($customer,$booking,$confirmation,$allocation,$agent ){
        // $get_member = 
        // $get_members = Project.members::find($project);
        // $pro  = Project::with("members")->whereHasRelationIds($project)->get();
        // $memeber = $project->members->contains($project);
    //    $id = $project;
    //     $pro = Project::whereHas('members', function($q){
    //         $q->where('id', '=', 1);
    //     })->get();
    $total_commission = $booking + $confirmation +$allocation;

        // dd($total_commission);

                $client = new Party([
            'name'          => $customer,
            'phone'         => '(520) 318-9486',
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $customer = new Party([
            'name'          => $agent,
            'address'       => 'The Green Street 12',
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => '> 654321 <',
            ],
        ]);

        $items = [
            
           
            (new InvoiceItem())->title('Booking comission')->pricePerUnit($booking),
            (new InvoiceItem())->title('Allocation Comission')->pricePerUnit($allocation),
            (new InvoiceItem())->title('confirmation Comission')->pricePerUnit($confirmation),
            // (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            // (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            // (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
            
        ];

        $notes = [
            'this invoice',
            'belongs to',
            'emirates marketing',
        ];
        $notes = implode("<br>", $notes);

        $invoice = Invoice::make('receipt')
            ->series('BIG')
            ->sequence(667)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date(now())
            ->dateFormat('m/d/Y')
            
            ->currencySymbol('Rs')
            ->currencyCode('PKR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->notes($notes)
            ->logo(public_path('argon/img/brand/emirates.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');
            
        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view

  
} 
}