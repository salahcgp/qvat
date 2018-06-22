<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Gate;

use App\CreateCompany;
use Carbon;


class VatReportController extends Controller
{
	

public function index()
	{
              if (Gate::denies('purchase_invoice_view')) {
                    return abort(401);
                }





			$salesdata = DB::table('sales_invoices')
						->select(DB::raw('create_companies.company_name, "Sales: " as title, sum(amount_before_vat) as amount_before_vat , sum(vat) as vat, sum(transaction_total) as transaction_total'))
						->join('create_companies', 'sales_invoices.company_id', '=', 'create_companies.id')
						->groupBy('create_companies.company_name');


			$union_data = DB::table('purchase_invoices')
						->select(DB::raw('create_companies.company_name, "Purchase: " as title, sum(amount_before_vat) as amount_before_vat , sum(vat) as vat, sum(transaction_total) as transaction_total'))
						->join('create_companies', 'purchase_invoices.company_id', '=', 'create_companies.id')
						->groupBy('create_companies.company_name')
						->union($salesdata)
						->get();



           

            $company_name  = 'Please select a company';

            $company_list =  CreateCompany::with(['created_by', 'created_by_team'])->get();


            return view('vatreport', compact('union_data', 'company_name', 'company_list'));
	}



    


public function search_vat(Request $request) {



        $company = $request->input('company');
        $start_date = $request->input('start_date');
        $end_date =  $request->input('end_date');

        if ($start_date==="" or $end_date==="") {
            return abort(401);
        }


		$format = 'd/m/Y';

		$start_date = Carbon\Carbon::createFromFormat($format, $start_date)->toDateString();
		$end_date = Carbon\Carbon::createFromFormat($format, $end_date)->toDateString();



			$salesdata = DB::table('sales_invoices')
						->select(DB::raw('create_companies.company_name, "Sales: " as title, sum(amount_before_vat) as amount_before_vat , sum(vat) as vat, sum(transaction_total) as transaction_total'))
						->join('create_companies', 'sales_invoices.company_id', '=', 'create_companies.id')
						->where('sales_invoices.company_id', '=', $company)
						->whereBetween('invoice_date', array($start_date, $end_date))
						->groupBy('create_companies.company_name');


			$union_data = DB::table('purchase_invoices')
						->select(DB::raw('create_companies.company_name, "Purchase: " as title, sum(amount_before_vat) as amount_before_vat , sum(vat) as vat, sum(transaction_total) as transaction_total'))
						->join('create_companies', 'purchase_invoices.company_id', '=', 'create_companies.id')
						->where('purchase_invoices.company_id', '=', $company)
						->whereBetween('invoice_date', array($start_date, $end_date))
						->groupBy('create_companies.company_name')
						->union($salesdata)
						->get();


		$com = DB::table('create_companies')
					->where('id', '=', $company)
					->select('create_companies.*')
					->get();

		$company_name = $com[0]->company_name .' TRN:'. $com[0]->trn;

		$company_list =  CreateCompany::with(['created_by', 'created_by_team'])->get();


        return view('vatreport', compact('union_data', 'company_name', 'company_list'));
	}

}