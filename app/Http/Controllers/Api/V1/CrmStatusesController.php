<?php

namespace App\Http\Controllers\Api\V1;

use App\CrmStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\CrmStatus as CrmStatusResource;
use App\Http\Requests\Admin\StoreCrmStatusesRequest;
use App\Http\Requests\Admin\UpdateCrmStatusesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class CrmStatusesController extends Controller
{
    public function index()
    {
        

        return new CrmStatusResource(CrmStatus::with(['created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('crm_status_view')) {
            return abort(401);
        }

        $crm_status = CrmStatus::with(['created_by', 'created_by_team'])->findOrFail($id);

        return new CrmStatusResource($crm_status);
    }

    public function store(StoreCrmStatusesRequest $request)
    {
        if (Gate::denies('crm_status_create')) {
            return abort(401);
        }

        $crm_status = CrmStatus::create($request->all());
        
        

        return (new CrmStatusResource($crm_status))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCrmStatusesRequest $request, $id)
    {
        if (Gate::denies('crm_status_edit')) {
            return abort(401);
        }

        $crm_status = CrmStatus::findOrFail($id);
        $crm_status->update($request->all());
        
        
        

        return (new CrmStatusResource($crm_status))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('crm_status_delete')) {
            return abort(401);
        }

        $crm_status = CrmStatus::findOrFail($id);
        $crm_status->delete();

        return response(null, 204);
    }
}
