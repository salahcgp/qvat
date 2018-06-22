<?php

namespace App\Http\Controllers\Api\V1;

use App\CreateCompany;
use App\Http\Controllers\Controller;
use App\Http\Resources\CreateCompany as CreateCompanyResource;
use App\Http\Requests\Admin\StoreCreateCompaniesRequest;
use App\Http\Requests\Admin\UpdateCreateCompaniesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class CreateCompaniesController extends Controller
{
    public function index()
    {
        

        return new CreateCompanyResource(CreateCompany::with(['created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('create_company_view')) {
            return abort(401);
        }

        $create_company = CreateCompany::with(['created_by', 'created_by_team'])->findOrFail($id);

        return new CreateCompanyResource($create_company);
    }

    public function store(StoreCreateCompaniesRequest $request)
    {
        if (Gate::denies('create_company_create')) {
            return abort(401);
        }

        $create_company = CreateCompany::create($request->all());
        
        

        return (new CreateCompanyResource($create_company))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCreateCompaniesRequest $request, $id)
    {
        if (Gate::denies('create_company_edit')) {
            return abort(401);
        }

        $create_company = CreateCompany::findOrFail($id);
        $create_company->update($request->all());
        
        
        

        return (new CreateCompanyResource($create_company))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('create_company_delete')) {
            return abort(401);
        }

        $create_company = CreateCompany::findOrFail($id);
        $create_company->delete();

        return response(null, 204);
    }
}
