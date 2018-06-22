<?php

namespace App\Http\Controllers\Admin;

use App\ContactCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactCompaniesRequest;
use App\Http\Requests\Admin\UpdateContactCompaniesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ContactCompaniesController extends Controller
{
    /**
     * Display a listing of ContactCompany.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('ContactCompany.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('ContactCompany.filter', 'my');
            }
        }

                $contact_companies = ContactCompany::all();

        return view('admin.contact_companies.index', compact('contact_companies'));
    }

    /**
     * Show the form for creating new ContactCompany.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.contact_companies.create', compact('created_bies', 'created_by_teams'));
    }

    /**
     * Store a newly created ContactCompany in storage.
     *
     * @param  \App\Http\Requests\StoreContactCompaniesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactCompaniesRequest $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        $contact_company = ContactCompany::create($request->all());



        return redirect()->route('admin.contact_companies.index');
    }


    /**
     * Show the form for editing ContactCompany.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $contact_company = ContactCompany::findOrFail($id);

        return view('admin.contact_companies.edit', compact('contact_company', 'created_bies', 'created_by_teams'));
    }

    /**
     * Update ContactCompany in storage.
     *
     * @param  \App\Http\Requests\UpdateContactCompaniesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactCompaniesRequest $request, $id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $contact_company = ContactCompany::findOrFail($id);
        $contact_company->update($request->all());



        return redirect()->route('admin.contact_companies.index');
    }


    /**
     * Display ContactCompany.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $contact_company = ContactCompany::findOrFail($id);

        return view('admin.contact_companies.show', compact('contact_company'));
    }


    /**
     * Remove ContactCompany from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $contact_company = ContactCompany::findOrFail($id);
        $contact_company->delete();

        return redirect()->route('admin.contact_companies.index');
    }

    /**
     * Delete all selected ContactCompany at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ContactCompany::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
