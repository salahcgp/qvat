<?php

namespace App\Http\Controllers\Api\V1;

use App\SalesInvoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalesInvoice as SalesInvoiceResource;
use App\Http\Requests\Admin\StoreSalesInvoicesRequest;
use App\Http\Requests\Admin\UpdateSalesInvoicesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class SalesInvoicesController extends Controller
{
    public function index()
    {
        

        return new SalesInvoiceResource(SalesInvoice::with(['company', 'customer', 'created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('sales_invoice_view')) {
            return abort(401);
        }

        $sales_invoice = SalesInvoice::with(['company', 'customer', 'created_by', 'created_by_team'])->findOrFail($id);

        return new SalesInvoiceResource($sales_invoice);
    }

    public function store(StoreSalesInvoicesRequest $request)
    {
        if (Gate::denies('sales_invoice_create')) {
            return abort(401);
        }

        $sales_invoice = SalesInvoice::create($request->all());
        
        

        return (new SalesInvoiceResource($sales_invoice))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSalesInvoicesRequest $request, $id)
    {
        if (Gate::denies('sales_invoice_edit')) {
            return abort(401);
        }

        $sales_invoice = SalesInvoice::findOrFail($id);
        $sales_invoice->update($request->all());
        
        
        

        return (new SalesInvoiceResource($sales_invoice))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('sales_invoice_delete')) {
            return abort(401);
        }

        $sales_invoice = SalesInvoice::findOrFail($id);
        $sales_invoice->delete();

        return response(null, 204);
    }
}
