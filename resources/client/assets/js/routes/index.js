import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import SalesInvoicesIndex from '../components/cruds/SalesInvoices/Index.vue'
import SalesInvoicesCreate from '../components/cruds/SalesInvoices/Create.vue'
import SalesInvoicesShow from '../components/cruds/SalesInvoices/Show.vue'
import SalesInvoicesEdit from '../components/cruds/SalesInvoices/Edit.vue'
import PurchaseInvoicesIndex from '../components/cruds/PurchaseInvoices/Index.vue'
import PurchaseInvoicesCreate from '../components/cruds/PurchaseInvoices/Create.vue'
import PurchaseInvoicesShow from '../components/cruds/PurchaseInvoices/Show.vue'
import PurchaseInvoicesEdit from '../components/cruds/PurchaseInvoices/Edit.vue'
import CustomersIndex from '../components/cruds/Customers/Index.vue'
import CustomersCreate from '../components/cruds/Customers/Create.vue'
import CustomersShow from '../components/cruds/Customers/Show.vue'
import CustomersEdit from '../components/cruds/Customers/Edit.vue'
import SuppliersIndex from '../components/cruds/Suppliers/Index.vue'
import SuppliersCreate from '../components/cruds/Suppliers/Create.vue'
import SuppliersShow from '../components/cruds/Suppliers/Show.vue'
import SuppliersEdit from '../components/cruds/Suppliers/Edit.vue'
import CreateCompaniesIndex from '../components/cruds/CreateCompanies/Index.vue'
import CreateCompaniesCreate from '../components/cruds/CreateCompanies/Create.vue'
import CreateCompaniesShow from '../components/cruds/CreateCompanies/Show.vue'
import CreateCompaniesEdit from '../components/cruds/CreateCompanies/Edit.vue'
import CrmStatusesIndex from '../components/cruds/CrmStatuses/Index.vue'
import CrmStatusesCreate from '../components/cruds/CrmStatuses/Create.vue'
import CrmStatusesShow from '../components/cruds/CrmStatuses/Show.vue'
import CrmStatusesEdit from '../components/cruds/CrmStatuses/Edit.vue'
import CrmCustomersIndex from '../components/cruds/CrmCustomers/Index.vue'
import CrmCustomersCreate from '../components/cruds/CrmCustomers/Create.vue'
import CrmCustomersShow from '../components/cruds/CrmCustomers/Show.vue'
import CrmCustomersEdit from '../components/cruds/CrmCustomers/Edit.vue'
import CrmNotesIndex from '../components/cruds/CrmNotes/Index.vue'
import CrmNotesCreate from '../components/cruds/CrmNotes/Create.vue'
import CrmNotesShow from '../components/cruds/CrmNotes/Show.vue'
import CrmNotesEdit from '../components/cruds/CrmNotes/Edit.vue'
import CrmDocumentsIndex from '../components/cruds/CrmDocuments/Index.vue'
import CrmDocumentsCreate from '../components/cruds/CrmDocuments/Create.vue'
import CrmDocumentsShow from '../components/cruds/CrmDocuments/Show.vue'
import CrmDocumentsEdit from '../components/cruds/CrmDocuments/Edit.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import TeamsIndex from '../components/cruds/Teams/Index.vue'
import TeamsCreate from '../components/cruds/Teams/Create.vue'
import TeamsShow from '../components/cruds/Teams/Show.vue'
import TeamsEdit from '../components/cruds/Teams/Edit.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/sales-invoices', component: SalesInvoicesIndex, name: 'sales_invoices.index' },
    { path: '/sales-invoices/create', component: SalesInvoicesCreate, name: 'sales_invoices.create' },
    { path: '/sales-invoices/:id', component: SalesInvoicesShow, name: 'sales_invoices.show' },
    { path: '/sales-invoices/:id/edit', component: SalesInvoicesEdit, name: 'sales_invoices.edit' },
    { path: '/purchase-invoices', component: PurchaseInvoicesIndex, name: 'purchase_invoices.index' },
    { path: '/purchase-invoices/create', component: PurchaseInvoicesCreate, name: 'purchase_invoices.create' },
    { path: '/purchase-invoices/:id', component: PurchaseInvoicesShow, name: 'purchase_invoices.show' },
    { path: '/purchase-invoices/:id/edit', component: PurchaseInvoicesEdit, name: 'purchase_invoices.edit' },
    { path: '/customers', component: CustomersIndex, name: 'customers.index' },
    { path: '/customers/create', component: CustomersCreate, name: 'customers.create' },
    { path: '/customers/:id', component: CustomersShow, name: 'customers.show' },
    { path: '/customers/:id/edit', component: CustomersEdit, name: 'customers.edit' },
    { path: '/suppliers', component: SuppliersIndex, name: 'suppliers.index' },
    { path: '/suppliers/create', component: SuppliersCreate, name: 'suppliers.create' },
    { path: '/suppliers/:id', component: SuppliersShow, name: 'suppliers.show' },
    { path: '/suppliers/:id/edit', component: SuppliersEdit, name: 'suppliers.edit' },
    { path: '/create-companies', component: CreateCompaniesIndex, name: 'create_companies.index' },
    { path: '/create-companies/create', component: CreateCompaniesCreate, name: 'create_companies.create' },
    { path: '/create-companies/:id', component: CreateCompaniesShow, name: 'create_companies.show' },
    { path: '/create-companies/:id/edit', component: CreateCompaniesEdit, name: 'create_companies.edit' },
    { path: '/crm-statuses', component: CrmStatusesIndex, name: 'crm_statuses.index' },
    { path: '/crm-statuses/create', component: CrmStatusesCreate, name: 'crm_statuses.create' },
    { path: '/crm-statuses/:id', component: CrmStatusesShow, name: 'crm_statuses.show' },
    { path: '/crm-statuses/:id/edit', component: CrmStatusesEdit, name: 'crm_statuses.edit' },
    { path: '/crm-customers', component: CrmCustomersIndex, name: 'crm_customers.index' },
    { path: '/crm-customers/create', component: CrmCustomersCreate, name: 'crm_customers.create' },
    { path: '/crm-customers/:id', component: CrmCustomersShow, name: 'crm_customers.show' },
    { path: '/crm-customers/:id/edit', component: CrmCustomersEdit, name: 'crm_customers.edit' },
    { path: '/crm-notes', component: CrmNotesIndex, name: 'crm_notes.index' },
    { path: '/crm-notes/create', component: CrmNotesCreate, name: 'crm_notes.create' },
    { path: '/crm-notes/:id', component: CrmNotesShow, name: 'crm_notes.show' },
    { path: '/crm-notes/:id/edit', component: CrmNotesEdit, name: 'crm_notes.edit' },
    { path: '/crm-documents', component: CrmDocumentsIndex, name: 'crm_documents.index' },
    { path: '/crm-documents/create', component: CrmDocumentsCreate, name: 'crm_documents.create' },
    { path: '/crm-documents/:id', component: CrmDocumentsShow, name: 'crm_documents.show' },
    { path: '/crm-documents/:id/edit', component: CrmDocumentsEdit, name: 'crm_documents.edit' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/teams', component: TeamsIndex, name: 'teams.index' },
    { path: '/teams/create', component: TeamsCreate, name: 'teams.create' },
    { path: '/teams/:id', component: TeamsShow, name: 'teams.show' },
    { path: '/teams/:id/edit', component: TeamsEdit, name: 'teams.edit' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
