<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\CreateCompany;

use Carbon;


class SalesReportController extends Controller
{
	public function getIndex()
	{
	return view('welcome');
	}

	public function anyData()
	{
    	return Datatables::of(DB::table('sales_invoices')->get())->make(true);
	}


public function index()
{
	$salesdata = DB::table('sales_invoices')
				->join('customers', 'sales_invoices.customer_id', '=', 'customers.id')
				->select('sales_invoices.*', 'customers.*')
				->get();

	$company_name  = 'Please select a company';
	$company_list =  CreateCompany::with(['created_by', 'created_by_team'])->get();

	return view('welcome', compact('salesdata', 'company_name', 'company_list'));
}

    


public function search_inv(Request $request) {



        $company = $request->input('company');
        $start_date = $request->input('start_date');
        $end_date =  $request->input('end_date');

		$format = 'd/m/Y';

		$start_date = Carbon\Carbon::createFromFormat($format, $start_date)->toDateString();
		$end_date = Carbon\Carbon::createFromFormat($format, $end_date)->toDateString();





        $salesdata = DB::table('sales_invoices')
        		->join('customers', 'sales_invoices.customer_id', '=', 'customers.id')
				->select('sales_invoices.*', 'customers.*')
            	->where('company_id', '=', $company)
				->whereBetween('invoice_date', array($start_date, $end_date))
				->get();


		$com = DB::table('create_companies')
					->where('id', '=', $company)
					->select('create_companies.*')
					->get();

		$company_name = $com[0]->company_name .' TRN:'. $com[0]->trn;
		$company_list =  CreateCompany::with(['created_by', 'created_by_team'])->get();

        return view('welcome', compact('salesdata', 'company_name', 'company_list'));
}

public function ajax()
{

	return view('salesinv');
}


}