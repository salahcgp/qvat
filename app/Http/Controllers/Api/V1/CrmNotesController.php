<?php

namespace App\Http\Controllers\Api\V1;

use App\CrmNote;
use App\Http\Controllers\Controller;
use App\Http\Resources\CrmNote as CrmNoteResource;
use App\Http\Requests\Admin\StoreCrmNotesRequest;
use App\Http\Requests\Admin\UpdateCrmNotesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class CrmNotesController extends Controller
{
    public function index()
    {
        

        return new CrmNoteResource(CrmNote::with(['customer', 'created_by', 'created_by_team'])->get());
    }

    public function show($id)
    {
        if (Gate::denies('crm_note_view')) {
            return abort(401);
        }

        $crm_note = CrmNote::with(['customer', 'created_by', 'created_by_team'])->findOrFail($id);

        return new CrmNoteResource($crm_note);
    }

    public function store(StoreCrmNotesRequest $request)
    {
        if (Gate::denies('crm_note_create')) {
            return abort(401);
        }

        $crm_note = CrmNote::create($request->all());
        
        

        return (new CrmNoteResource($crm_note))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCrmNotesRequest $request, $id)
    {
        if (Gate::denies('crm_note_edit')) {
            return abort(401);
        }

        $crm_note = CrmNote::findOrFail($id);
        $crm_note->update($request->all());
        
        
        

        return (new CrmNoteResource($crm_note))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('crm_note_delete')) {
            return abort(401);
        }

        $crm_note = CrmNote::findOrFail($id);
        $crm_note->delete();

        return response(null, 204);
    }
}
