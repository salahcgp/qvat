<?php

namespace App\Http\Controllers\Api\V1;

use App\CrmCustomer;
use App\Http\Controllers\Controller;
use App\Http\Resources\CrmCustomer as CrmCustomerResource;
use App\Http\Requests\Admin\StoreCrmCustomersRequest;
use App\Http\Requests\Admin\UpdateCrmCustomersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class CrmCustomersController extends Controller
{
    public function index()
    {
        

        return new CrmCustomerResource(CrmCustomer::with(['crm_status', 'created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('crm_customer_view')) {
            return abort(401);
        }

        $crm_customer = CrmCustomer::with(['crm_status', 'created_by', 'created_by_team'])->findOrFail($id);

        return new CrmCustomerResource($crm_customer);
    }

    public function store(StoreCrmCustomersRequest $request)
    {
        if (Gate::denies('crm_customer_create')) {
            return abort(401);
        }

        $crm_customer = CrmCustomer::create($request->all());
        
        

        return (new CrmCustomerResource($crm_customer))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCrmCustomersRequest $request, $id)
    {
        if (Gate::denies('crm_customer_edit')) {
            return abort(401);
        }

        $crm_customer = CrmCustomer::findOrFail($id);
        $crm_customer->update($request->all());
        
        
        

        return (new CrmCustomerResource($crm_customer))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('crm_customer_delete')) {
            return abort(401);
        }

        $crm_customer = CrmCustomer::findOrFail($id);
        $crm_customer->delete();

        return response(null, 204);
    }
}
