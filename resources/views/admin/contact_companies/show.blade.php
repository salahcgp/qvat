@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contact-companies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.name')</th>
                            <td field-key='name'>{{ $contact_company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.address')</th>
                            <td field-key='address'>{{ $contact_company->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.website')</th>
                            <td field-key='website'>{{ $contact_company->website }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.email')</th>
                            <td field-key='email'>{{ $contact_company->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.created-by')</th>
                            <td field-key='created_by'>{{ $contact_company->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contact-companies.fields.created-by-team')</th>
                            <td field-key='created_by_team'>{{ $contact_company->created_by_team->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contact_companies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
