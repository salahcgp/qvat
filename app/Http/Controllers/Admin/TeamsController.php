<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTeamsRequest;
use App\Http\Requests\Admin\UpdateTeamsRequest;

class TeamsController extends Controller
{
    /**
     * Display a listing of Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {if ($_GATES_$) {
            return abort(401);
        }


                $teams = Team::all();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating new Team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {if ($_GATES_$) {
            return abort(401);
        }
        return view('admin.teams.create');
    }

    /**
     * Store a newly created Team in storage.
     *
     * @param  \App\Http\Requests\StoreTeamsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamsRequest $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        $team = Team::create($request->all());



        return redirect()->route('admin.teams.index');
    }


    /**
     * Show the form for editing Team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $team = Team::findOrFail($id);

        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update Team in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamsRequest $request, $id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $team = Team::findOrFail($id);
        $team->update($request->all());



        return redirect()->route('admin.teams.index');
    }


    /**
     * Display Team.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $crm_statuses = \App\CrmStatus::where('created_by_team_id', $id)->get();$crm_notes = \App\CrmNote::where('created_by_team_id', $id)->get();$crm_documents = \App\CrmDocument::where('created_by_team_id', $id)->get();$users = \App\User::where('team_id', $id)->get();$customers = \App\Customer::where('created_by_team_id', $id)->get();$suppliers = \App\Supplier::where('created_by_team_id', $id)->get();$create_companies = \App\CreateCompany::where('created_by_team_id', $id)->get();$crm_customers = \App\CrmCustomer::where('created_by_team_id', $id)->get();$purchase_invoices = \App\PurchaseInvoice::where('created_by_team_id', $id)->get();$sales_invoices = \App\SalesInvoice::where('created_by_team_id', $id)->get();

        $team = Team::findOrFail($id);

        return view('admin.teams.show', compact('team', 'crm_statuses', 'crm_notes', 'crm_documents', 'users', 'customers', 'suppliers', 'create_companies', 'crm_customers', 'purchase_invoices', 'sales_invoices'));
    }


    /**
     * Remove Team from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {if ($_GATES_$) {
            return abort(401);
        }
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('admin.teams.index');
    }

    /**
     * Delete all selected Team at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {if ($_GATES_$) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Team::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
