@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td field-key='role'>
                                @foreach ($user->role as $singleRole)
                                    <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.team')</th>
                            <td field-key='team'>{{ $user->team->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#crm_statuses" aria-controls="crm_statuses" role="tab" data-toggle="tab">Statuses</a></li>
<li role="presentation" class=""><a href="#crm_notes" aria-controls="crm_notes" role="tab" data-toggle="tab">Notes</a></li>
<li role="presentation" class=""><a href="#crm_documents" aria-controls="crm_documents" role="tab" data-toggle="tab">Documents</a></li>
<li role="presentation" class=""><a href="#customers" aria-controls="customers" role="tab" data-toggle="tab">Customers</a></li>
<li role="presentation" class=""><a href="#suppliers" aria-controls="suppliers" role="tab" data-toggle="tab">Suppliers</a></li>
<li role="presentation" class=""><a href="#create_company" aria-controls="create_company" role="tab" data-toggle="tab">Create company</a></li>
<li role="presentation" class=""><a href="#crm_customers" aria-controls="crm_customers" role="tab" data-toggle="tab">Customers</a></li>
<li role="presentation" class=""><a href="#purchase_invoices" aria-controls="purchase_invoices" role="tab" data-toggle="tab">Purchase invoices</a></li>
<li role="presentation" class=""><a href="#sales_invoices" aria-controls="sales_invoices" role="tab" data-toggle="tab">Sales invoices</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="crm_statuses">
<table class="table table-bordered table-striped {{ count($crm_statuses) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.crm-statuses.fields.title')</th>
                        <th>@lang('quickadmin.crm-statuses.fields.created-by')</th>
                        <th>@lang('quickadmin.crm-statuses.fields.created-by-team')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($crm_statuses) > 0)
            @foreach ($crm_statuses as $crm_status)
                <tr data-entry-id="{{ $crm_status->id }}">
                    <td field-key='title'>{{ $crm_status->title }}</td>
                                <td field-key='created_by'>{{ $crm_status->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $crm_status->created_by_team->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('crm_statuses.show',[$crm_status->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('crm_statuses.edit',[$crm_status->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['crm_statuses.destroy', $crm_status->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="crm_notes">
<table class="table table-bordered table-striped {{ count($crm_notes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.crm-notes.fields.customer')</th>
                        <th>@lang('quickadmin.crm-notes.fields.note')</th>
                        <th>@lang('quickadmin.crm-notes.fields.created-by')</th>
                        <th>@lang('quickadmin.crm-notes.fields.created-by-team')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($crm_notes) > 0)
            @foreach ($crm_notes as $crm_note)
                <tr data-entry-id="{{ $crm_note->id }}">
                    <td field-key='customer'>{{ $crm_note->customer->first_name or '' }}</td>
                                <td field-key='note'>{!! $crm_note->note !!}</td>
                                <td field-key='created_by'>{{ $crm_note->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $crm_note->created_by_team->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('crm_notes.show',[$crm_note->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('crm_notes.edit',[$crm_note->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['crm_notes.destroy', $crm_note->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="crm_documents">
<table class="table table-bordered table-striped {{ count($crm_documents) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.crm-documents.fields.customer')</th>
                        <th>@lang('quickadmin.crm-documents.fields.name')</th>
                        <th>@lang('quickadmin.crm-documents.fields.description')</th>
                        <th>@lang('quickadmin.crm-documents.fields.file')</th>
                        <th>@lang('quickadmin.crm-documents.fields.created-by')</th>
                        <th>@lang('quickadmin.crm-documents.fields.created-by-team')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($crm_documents) > 0)
            @foreach ($crm_documents as $crm_document)
                <tr data-entry-id="{{ $crm_document->id }}">
                    <td field-key='customer'>{{ $crm_document->customer->first_name or '' }}</td>
                                <td field-key='name'>{{ $crm_document->name }}</td>
                                <td field-key='description'>{!! $crm_document->description !!}</td>
                                <td field-key='file'>@if($crm_document->file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $crm_document->file) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='created_by'>{{ $crm_document->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $crm_document->created_by_team->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('crm_documents.show',[$crm_document->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('crm_documents.edit',[$crm_document->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['crm_documents.destroy', $crm_document->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="customers">
<table class="table table-bordered table-striped {{ count($customers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.customers.fields.customer-name')</th>
                        <th>@lang('quickadmin.customers.fields.billing-address')</th>
                        <th>@lang('quickadmin.customers.fields.shipping-address')</th>
                        <th>@lang('quickadmin.customers.fields.mobile')</th>
                        <th>@lang('quickadmin.customers.fields.phone')</th>
                        <th>@lang('quickadmin.customers.fields.email')</th>
                        <th>@lang('quickadmin.customers.fields.trn')</th>
                        <th>@lang('quickadmin.customers.fields.created-by')</th>
                        <th>@lang('quickadmin.customers.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($customers) > 0)
            @foreach ($customers as $customer)
                <tr data-entry-id="{{ $customer->id }}">
                    <td field-key='customer_name'>{{ $customer->customer_name }}</td>
                                <td field-key='billing_address'>{!! $customer->billing_address !!}</td>
                                <td field-key='shipping_address'>{!! $customer->shipping_address !!}</td>
                                <td field-key='mobile'>{{ $customer->mobile }}</td>
                                <td field-key='phone'>{{ $customer->phone }}</td>
                                <td field-key='email'>{{ $customer->email }}</td>
                                <td field-key='trn'>{{ $customer->trn }}</td>
                                <td field-key='created_by'>{{ $customer->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $customer->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['customers.restore', $customer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['customers.perma_del', $customer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('customers.show',[$customer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('customers.edit',[$customer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['customers.destroy', $customer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="suppliers">
<table class="table table-bordered table-striped {{ count($suppliers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.suppliers.fields.supplier-name')</th>
                        <th>@lang('quickadmin.suppliers.fields.billing-address')</th>
                        <th>@lang('quickadmin.suppliers.fields.shipping-address')</th>
                        <th>@lang('quickadmin.suppliers.fields.mobile')</th>
                        <th>@lang('quickadmin.suppliers.fields.phone')</th>
                        <th>@lang('quickadmin.suppliers.fields.email')</th>
                        <th>@lang('quickadmin.suppliers.fields.trn')</th>
                        <th>@lang('quickadmin.suppliers.fields.created-by')</th>
                        <th>@lang('quickadmin.suppliers.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($suppliers) > 0)
            @foreach ($suppliers as $supplier)
                <tr data-entry-id="{{ $supplier->id }}">
                    <td field-key='supplier_name'>{{ $supplier->supplier_name }}</td>
                                <td field-key='billing_address'>{!! $supplier->billing_address !!}</td>
                                <td field-key='shipping_address'>{!! $supplier->shipping_address !!}</td>
                                <td field-key='mobile'>{{ $supplier->mobile }}</td>
                                <td field-key='phone'>{{ $supplier->phone }}</td>
                                <td field-key='email'>{{ $supplier->email }}</td>
                                <td field-key='trn'>{{ $supplier->trn }}</td>
                                <td field-key='created_by'>{{ $supplier->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $supplier->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['suppliers.restore', $supplier->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['suppliers.perma_del', $supplier->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('suppliers.show',[$supplier->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('suppliers.edit',[$supplier->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['suppliers.destroy', $supplier->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="create_company">
<table class="table table-bordered table-striped {{ count($create_companies) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.create-company.fields.company-name')</th>
                        <th>@lang('quickadmin.create-company.fields.billing-address')</th>
                        <th>@lang('quickadmin.create-company.fields.shipping-address')</th>
                        <th>@lang('quickadmin.create-company.fields.mobile')</th>
                        <th>@lang('quickadmin.create-company.fields.phone')</th>
                        <th>@lang('quickadmin.create-company.fields.email')</th>
                        <th>@lang('quickadmin.create-company.fields.trn')</th>
                        <th>@lang('quickadmin.create-company.fields.created-by')</th>
                        <th>@lang('quickadmin.create-company.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($create_companies) > 0)
            @foreach ($create_companies as $create_company)
                <tr data-entry-id="{{ $create_company->id }}">
                    <td field-key='company_name'>{{ $create_company->company_name }}</td>
                                <td field-key='billing_address'>{!! $create_company->billing_address !!}</td>
                                <td field-key='shipping_address'>{!! $create_company->shipping_address !!}</td>
                                <td field-key='mobile'>{{ $create_company->mobile }}</td>
                                <td field-key='phone'>{{ $create_company->phone }}</td>
                                <td field-key='email'>{{ $create_company->email }}</td>
                                <td field-key='trn'>{{ $create_company->trn }}</td>
                                <td field-key='created_by'>{{ $create_company->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $create_company->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['create_companies.restore', $create_company->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['create_companies.perma_del', $create_company->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('create_companies.show',[$create_company->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('create_companies.edit',[$create_company->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['create_companies.destroy', $create_company->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="crm_customers">
<table class="table table-bordered table-striped {{ count($crm_customers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.crm-customers.fields.first-name')</th>
                        <th>@lang('quickadmin.crm-customers.fields.last-name')</th>
                        <th>@lang('quickadmin.crm-customers.fields.crm-status')</th>
                        <th>@lang('quickadmin.crm-customers.fields.email')</th>
                        <th>@lang('quickadmin.crm-customers.fields.phone')</th>
                        <th>@lang('quickadmin.crm-customers.fields.address')</th>
                        <th>@lang('quickadmin.crm-customers.fields.skype')</th>
                        <th>@lang('quickadmin.crm-customers.fields.website')</th>
                        <th>@lang('quickadmin.crm-customers.fields.description')</th>
                        <th>@lang('quickadmin.crm-customers.fields.created-by')</th>
                        <th>@lang('quickadmin.crm-customers.fields.created-by-team')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($crm_customers) > 0)
            @foreach ($crm_customers as $crm_customer)
                <tr data-entry-id="{{ $crm_customer->id }}">
                    <td field-key='first_name'>{{ $crm_customer->first_name }}</td>
                                <td field-key='last_name'>{{ $crm_customer->last_name }}</td>
                                <td field-key='crm_status'>{{ $crm_customer->crm_status->title or '' }}</td>
                                <td field-key='email'>{{ $crm_customer->email }}</td>
                                <td field-key='phone'>{{ $crm_customer->phone }}</td>
                                <td field-key='address'>{{ $crm_customer->address }}</td>
                                <td field-key='skype'>{{ $crm_customer->skype }}</td>
                                <td field-key='website'>{{ $crm_customer->website }}</td>
                                <td field-key='description'>{!! $crm_customer->description !!}</td>
                                <td field-key='created_by'>{{ $crm_customer->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $crm_customer->created_by_team->name or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('crm_customers.show',[$crm_customer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('crm_customers.edit',[$crm_customer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['crm_customers.destroy', $crm_customer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="16">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="purchase_invoices">
<table class="table table-bordered table-striped {{ count($purchase_invoices) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.purchase-invoices.fields.company')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.invoice-no')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.invoice-date')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.customer')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.quantity')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.price')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.vat')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.discount')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.amount-before-vat')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.transaction-total')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.created-by')</th>
                        <th>@lang('quickadmin.purchase-invoices.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($purchase_invoices) > 0)
            @foreach ($purchase_invoices as $purchase_invoice)
                <tr data-entry-id="{{ $purchase_invoice->id }}">
                    <td field-key='company'>{{ $purchase_invoice->company->company_name or '' }}</td>
                                <td field-key='invoice_no'>{{ $purchase_invoice->invoice_no }}</td>
                                <td field-key='invoice_date'>{{ $purchase_invoice->invoice_date }}</td>
                                <td field-key='customer'>{{ $purchase_invoice->customer->supplier_name or '' }}</td>
                                <td field-key='quantity'>{{ $purchase_invoice->quantity }}</td>
                                <td field-key='price'>{{ $purchase_invoice->price }}</td>
                                <td field-key='vat'>{{ $purchase_invoice->vat }}</td>
                                <td field-key='discount'>{{ $purchase_invoice->discount }}</td>
                                <td field-key='amount_before_vat'>{{ $purchase_invoice->amount_before_vat }}</td>
                                <td field-key='transaction_total'>{{ $purchase_invoice->transaction_total }}</td>
                                <td field-key='created_by'>{{ $purchase_invoice->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $purchase_invoice->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['purchase_invoices.restore', $purchase_invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['purchase_invoices.perma_del', $purchase_invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('purchase_invoices.show',[$purchase_invoice->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('purchase_invoices.edit',[$purchase_invoice->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['purchase_invoices.destroy', $purchase_invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="sales_invoices">
<table class="table table-bordered table-striped {{ count($sales_invoices) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.sales-invoices.fields.company')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.invoice-no')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.invoice-date')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.customer')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.quantity')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.price')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.vat')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.discount')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.amount-before-vat')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.transaction-total')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.created-by')</th>
                        <th>@lang('quickadmin.sales-invoices.fields.created-by-team')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($sales_invoices) > 0)
            @foreach ($sales_invoices as $sales_invoice)
                <tr data-entry-id="{{ $sales_invoice->id }}">
                    <td field-key='company'>{{ $sales_invoice->company->company_name or '' }}</td>
                                <td field-key='invoice_no'>{{ $sales_invoice->invoice_no }}</td>
                                <td field-key='invoice_date'>{{ $sales_invoice->invoice_date }}</td>
                                <td field-key='customer'>{{ $sales_invoice->customer->customer_name or '' }}</td>
                                <td field-key='quantity'>{{ $sales_invoice->quantity }}</td>
                                <td field-key='price'>{{ $sales_invoice->price }}</td>
                                <td field-key='vat'>{{ $sales_invoice->vat }}</td>
                                <td field-key='discount'>{{ $sales_invoice->discount }}</td>
                                <td field-key='amount_before_vat'>{{ $sales_invoice->amount_before_vat }}</td>
                                <td field-key='transaction_total'>{{ $sales_invoice->transaction_total }}</td>
                                <td field-key='created_by'>{{ $sales_invoice->created_by->name or '' }}</td>
                                <td field-key='created_by_team'>{{ $sales_invoice->created_by_team->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['sales_invoices.restore', $sales_invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['sales_invoices.perma_del', $sales_invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('sales_invoices.show',[$sales_invoice->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('sales_invoices.edit',[$sales_invoice->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['sales_invoices.destroy', $sales_invoice->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
