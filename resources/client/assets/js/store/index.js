import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import SalesInvoicesIndex from './modules/SalesInvoices'
import SalesInvoicesSingle from './modules/SalesInvoices/single'
import PurchaseInvoicesIndex from './modules/PurchaseInvoices'
import PurchaseInvoicesSingle from './modules/PurchaseInvoices/single'
import CustomersIndex from './modules/Customers'
import CustomersSingle from './modules/Customers/single'
import SuppliersIndex from './modules/Suppliers'
import SuppliersSingle from './modules/Suppliers/single'
import CreateCompaniesIndex from './modules/CreateCompanies'
import CreateCompaniesSingle from './modules/CreateCompanies/single'
import CrmStatusesIndex from './modules/CrmStatuses'
import CrmStatusesSingle from './modules/CrmStatuses/single'
import CrmCustomersIndex from './modules/CrmCustomers'
import CrmCustomersSingle from './modules/CrmCustomers/single'
import CrmNotesIndex from './modules/CrmNotes'
import CrmNotesSingle from './modules/CrmNotes/single'
import CrmDocumentsIndex from './modules/CrmDocuments'
import CrmDocumentsSingle from './modules/CrmDocuments/single'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import TeamsIndex from './modules/Teams'
import TeamsSingle from './modules/Teams/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        SalesInvoicesIndex,
        SalesInvoicesSingle,
        PurchaseInvoicesIndex,
        PurchaseInvoicesSingle,
        CustomersIndex,
        CustomersSingle,
        SuppliersIndex,
        SuppliersSingle,
        CreateCompaniesIndex,
        CreateCompaniesSingle,
        CrmStatusesIndex,
        CrmStatusesSingle,
        CrmCustomersIndex,
        CrmCustomersSingle,
        CrmNotesIndex,
        CrmNotesSingle,
        CrmDocumentsIndex,
        CrmDocumentsSingle,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        TeamsIndex,
        TeamsSingle,
    },
    strict: debug,
})
