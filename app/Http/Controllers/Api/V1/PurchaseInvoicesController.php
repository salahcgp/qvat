<?php

namespace App\Http\Controllers\Api\V1;

use App\PurchaseInvoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\PurchaseInvoice as PurchaseInvoiceResource;
use App\Http\Requests\Admin\StorePurchaseInvoicesRequest;
use App\Http\Requests\Admin\UpdatePurchaseInvoicesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;



class PurchaseInvoicesController extends Controller
{

    


    public function index()
    {
        

        return new PurchaseInvoiceResource(PurchaseInvoice::with(['company', 'customer', 'created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('purchase_invoice_view')) {
            return abort(401);
        }

        $purchase_invoice = PurchaseInvoice::with(['company', 'customer', 'created_by', 'created_by_team'])->findOrFail($id);

        return new PurchaseInvoiceResource($purchase_invoice);
    }

    public function store(StorePurchaseInvoicesRequest $request)
    {
        if (Gate::denies('purchase_invoice_create')) {
            return abort(401);
        }

        $purchase_invoice = PurchaseInvoice::create($request->all());
        
        

        return (new PurchaseInvoiceResource($purchase_invoice))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePurchaseInvoicesRequest $request, $id)
    {
        if (Gate::denies('purchase_invoice_edit')) {
            return abort(401);
        }

        $purchase_invoice = PurchaseInvoice::findOrFail($id);
        $purchase_invoice->update($request->all());
        
        
        

        return (new PurchaseInvoiceResource($purchase_invoice))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('purchase_invoice_delete')) {
            return abort(401);
        }

        $purchase_invoice = PurchaseInvoice::findOrFail($id);
        $purchase_invoice->delete();

        return response(null, 204);
    }
}
