<?php

namespace App\Http\Controllers\Api\V1;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Customer as CustomerResource;
use App\Http\Requests\Admin\StoreCustomersRequest;
use App\Http\Requests\Admin\UpdateCustomersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class CustomersController extends Controller
{
    public function index()
    {
        

        return new CustomerResource(Customer::with(['created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('customer_view')) {
            return abort(401);
        }

        $customer = Customer::with(['created_by', 'created_by_team'])->findOrFail($id);

        return new CustomerResource($customer);
    }

    public function store(StoreCustomersRequest $request)
    {
        if (Gate::denies('customer_create')) {
            return abort(401);
        }

        $customer = Customer::create($request->all());
        
        

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCustomersRequest $request, $id)
    {
        if (Gate::denies('customer_edit')) {
            return abort(401);
        }

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        
        
        

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('customer_delete')) {
            return abort(401);
        }

        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response(null, 204);
    }
}
