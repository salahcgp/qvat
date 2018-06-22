<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if ($_GATES_$) {
            return abort(401);
        }


                $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id');

        $teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.users.create', compact('roles', 'teams'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        $user = User::create($request->all());
        $user->role()->sync(array_filter((array)$request->input('role')));



        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id');

        $teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles', 'teams'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->role()->sync(array_filter((array)$request->input('role')));



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id');

        $teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$crm_statuses = \App\CrmStatus::where('created_by_id', $id)->get();$crm_notes = \App\CrmNote::where('created_by_id', $id)->get();$crm_documents = \App\CrmDocument::where('created_by_id', $id)->get();$customers = \App\Customer::where('created_by_id', $id)->get();$suppliers = \App\Supplier::where('created_by_id', $id)->get();$create_companies = \App\CreateCompany::where('created_by_id', $id)->get();$crm_customers = \App\CrmCustomer::where('created_by_id', $id)->get();$purchase_invoices = \App\PurchaseInvoice::where('created_by_id', $id)->get();$sales_invoices = \App\SalesInvoice::where('created_by_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'crm_statuses', 'crm_notes', 'crm_documents', 'customers', 'suppliers', 'create_companies', 'crm_customers', 'purchase_invoices', 'sales_invoices'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
