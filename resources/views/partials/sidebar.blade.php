@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>
            <li class="treeview" v-if="$can('sale_access')">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>@lang('quickadmin.sales.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('sales_invoice_access')">
                        <router-link :to="{ name: 'sales_invoices.index' }">
                        <i class="fa fa-arrow-right"></i>
                        <span>@lang('quickadmin.sales-invoices.title')</span>
                        </router-link>
                    </li>
                </li>
                <li class="" v-if="$can('sales_invoice_access')">
                    <a href="../report_inv">
                        <i class="fa fa-braille"></i>
                        <span>@lang('quickadmin.report_inv.title')</span>
                    </a>
                </li>
            </ul>
            
        </li>
        <li class="treeview" v-if="$can('purchase_access')">
            <a href="#">
                <i class="fa fa-dollar"></i>
                <span>@lang('quickadmin.purchase.title')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li v-if="$can('purchase_invoice_access')">
                    <router-link :to="{ name: 'purchase_invoices.index' }">
                    <i class="fa fa-arrow-left"></i>
                    <span>@lang('quickadmin.purchase-invoices.title')</span>
                    </router-link>
                </li>
                <li class="" v-if="$can('purchase_invoice_access')">
                    <a href="../report_pur">
                        <i class="fa fa-braille"></i>
                        <span>@lang('quickadmin.report_pur.title')</span>
                    </a>
                </li>
                
            </ul>
            
                 <li class="treeview" v-if="$can('company_access')">
                <a href="#">
                    <i class="fa fa-braille"></i>
                    <span>@lang('quickadmin.vat.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="" v-if="$can('sales_invoice_access')">
                    <a href="../vatreport1">
                        <i class="fa fa-braille"></i>
                        <span>@lang('quickadmin.vatreport1.title')</span>
                    </a>
                </li>
                </ul>
            </li>
            
            
            <li class="treeview" v-if="$can('customer_and_supplier_access')">
                <a href="#">
                    <i class="fa fa-address-card"></i>
                    <span>@lang('quickadmin.customer-and-supplier.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('customer_access')">
                        <router-link :to="{ name: 'customers.index' }">
                        <i class="fa fa-codiepie"></i>
                        <span>@lang('quickadmin.customers.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('supplier_access')">
                        <router-link :to="{ name: 'suppliers.index' }">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span>@lang('quickadmin.suppliers.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li class="treeview" v-if="$can('company_access')">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.company.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('create_company_access')">
                        <router-link :to="{ name: 'create_companies.index' }">
                        <i class="fa fa-anchor"></i>
                        <span>@lang('quickadmin.create-company.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>


       
            <li class="treeview" v-if="$can('basic_crm_access')">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>@lang('quickadmin.basic-crm.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('crm_status_access')">
                        <router-link :to="{ name: 'crm_statuses.index' }">
                        <i class="fa fa-folder"></i>
                        <span>@lang('quickadmin.crm-statuses.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('crm_customer_access')">
                        <router-link :to="{ name: 'crm_customers.index' }">
                        <i class="fa fa-user-plus"></i>
                        <span>@lang('quickadmin.crm-customers.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('crm_note_access')">
                        <router-link :to="{ name: 'crm_notes.index' }">
                        <i class="fa fa-building-o"></i>
                        <span>@lang('quickadmin.crm-notes.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('crm_document_access')">
                        <router-link :to="{ name: 'crm_documents.index' }">
                        <i class="fa fa-file"></i>
                        <span>@lang('quickadmin.crm-documents.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('user_management_access')">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('permission_access')">
                        <router-link :to="{ name: 'permissions.index' }">
                        <i class="fa fa-briefcase"></i>
                        <span>@lang('quickadmin.permissions.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('role_access')">
                        <router-link :to="{ name: 'roles.index' }">
                        <i class="fa fa-briefcase"></i>
                        <span>@lang('quickadmin.roles.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                        <i class="fa fa-user"></i>
                        <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('team_access')">
                        <router-link :to="{ name: 'teams.index' }">
                        <i class="fa fa-users"></i>
                        <span>@lang('quickadmin.teams.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                <i class="fa fa-key"></i>
                <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>