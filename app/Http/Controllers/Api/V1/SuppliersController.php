<?php

namespace App\Http\Controllers\Api\V1;

use App\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Resources\Supplier as SupplierResource;
use App\Http\Requests\Admin\StoreSuppliersRequest;
use App\Http\Requests\Admin\UpdateSuppliersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class SuppliersController extends Controller
{
    public function index()
    {
        

        return new SupplierResource(Supplier::with(['created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('supplier_view')) {
            return abort(401);
        }

        $supplier = Supplier::with(['created_by', 'created_by_team'])->findOrFail($id);

        return new SupplierResource($supplier);
    }

    public function store(StoreSuppliersRequest $request)
    {
        if (Gate::denies('supplier_create')) {
            return abort(401);
        }

        $supplier = Supplier::create($request->all());
        
        

        return (new SupplierResource($supplier))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateSuppliersRequest $request, $id)
    {
        if (Gate::denies('supplier_edit')) {
            return abort(401);
        }

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        
        
        

        return (new SupplierResource($supplier))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('supplier_delete')) {
            return abort(401);
        }

        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response(null, 204);
    }
}
