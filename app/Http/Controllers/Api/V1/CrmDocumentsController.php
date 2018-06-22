<?php

namespace App\Http\Controllers\Api\V1;

use App\CrmDocument;
use App\Http\Controllers\Controller;
use App\Http\Resources\CrmDocument as CrmDocumentResource;
use App\Http\Requests\Admin\StoreCrmDocumentsRequest;
use App\Http\Requests\Admin\UpdateCrmDocumentsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class CrmDocumentsController extends Controller
{
    public function index()
    {
        

        return new CrmDocumentResource(CrmDocument::with(['customer', 'created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('crm_document_view')) {
            return abort(401);
        }

        $crm_document = CrmDocument::with(['customer', 'created_by', 'created_by_team'])->findOrFail($id);

        return new CrmDocumentResource($crm_document);
    }

    public function store(StoreCrmDocumentsRequest $request)
    {
        if (Gate::denies('crm_document_create')) {
            return abort(401);
        }

        $crm_document = CrmDocument::create($request->all());
        
        if ($request->hasFile('file')) {
            $crm_document->addMedia($request->file('file'))->toMediaCollection('file');
        }

        return (new CrmDocumentResource($crm_document))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCrmDocumentsRequest $request, $id)
    {
        if (Gate::denies('crm_document_edit')) {
            return abort(401);
        }

        $crm_document = CrmDocument::findOrFail($id);
        $crm_document->update($request->all());
        
        if (! $request->input('file') && $crm_document->getFirstMedia('file')) {
            $crm_document->getFirstMedia('file')->delete();
        }
        if ($request->hasFile('file')) {
            $crm_document->addMedia($request->file('file'))->toMediaCollection('file');
        }

        return (new CrmDocumentResource($crm_document))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('crm_document_delete')) {
            return abort(401);
        }

        $crm_document = CrmDocument::findOrFail($id);
        $crm_document->delete();

        return response(null, 204);
    }
}
