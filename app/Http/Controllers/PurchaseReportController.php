<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Gate;

use App\CreateCompany;
use Carbon;


class PurchaseReportController extends Controller
{
	

public function index()
	{
              if (Gate::denies('purchase_invoice_view')) {
                    return abort(401);
                }


            $purchase_data = DB::table('purchase_invoices')
                        ->join('suppliers', 'purchase_invoices.customer_id', '=', 'suppliers.id')
                        ->select('purchase_invoices.*', 'suppliers.*')
                        ->get();

            $company_name  = 'Please select a company';

            $company_list =  CreateCompany::with(['created_by', 'created_by_team'])->get();


            return view('purchase_report', compact('purchase_data', 'company_name', 'company_list'));
	}



    


public function search_pur(Request $request) {



        $company = $request->input('company');
        $start_date = $request->input('start_date');
        $end_date =  $request->input('end_date');

        if ($start_date==="" or $end_date==="") {
            return abort(401);
        }


		$format = 'd/m/Y';

		$start_date = Carbon\Carbon::createFromFormat($format, $start_date)->toDateString();
		$end_date = Carbon\Carbon::createFromFormat($format, $end_date)->toDateString();




        $purchase_data = DB::table('purchase_invoices')
        		->join('suppliers', 'purchase_invoices.customer_id', '=', 'suppliers.id')
				->select('purchase_invoices.*', 'suppliers.*')
            	->where('purchase_invoices.company_id', '=', $company)
				->whereBetween('invoice_date', array($start_date, $end_date))
				->get();



		$com = DB::table('create_companies')
					->where('id', '=', $company)
					->select('create_companies.*')
					->get();

		$company_name = $com[0]->company_name .' TRN:'. $com[0]->trn;

		$company_list =  CreateCompany::with(['created_by', 'created_by_team'])->get();


        return view('purchase_report', compact('purchase_data', 'company_name', 'company_list'));
	}

}