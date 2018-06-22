<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'team_access',],
            ['id' => 18, 'title' => 'team_create',],
            ['id' => 19, 'title' => 'team_edit',],
            ['id' => 20, 'title' => 'team_view',],
            ['id' => 21, 'title' => 'team_delete',],
            ['id' => 22, 'title' => 'sale_access',],
            ['id' => 23, 'title' => 'purchase_access',],
            ['id' => 24, 'title' => 'report_access',],
            ['id' => 25, 'title' => 'company_access',],
            ['id' => 26, 'title' => 'create_company_access',],
            ['id' => 27, 'title' => 'create_company_create',],
            ['id' => 28, 'title' => 'create_company_edit',],
            ['id' => 29, 'title' => 'create_company_view',],
            ['id' => 30, 'title' => 'create_company_delete',],
            ['id' => 31, 'title' => 'basic_crm_access',],
            ['id' => 32, 'title' => 'basic_crm_create',],
            ['id' => 33, 'title' => 'basic_crm_edit',],
            ['id' => 34, 'title' => 'basic_crm_view',],
            ['id' => 35, 'title' => 'basic_crm_delete',],
            ['id' => 36, 'title' => 'crm_status_access',],
            ['id' => 37, 'title' => 'crm_status_create',],
            ['id' => 38, 'title' => 'crm_status_edit',],
            ['id' => 39, 'title' => 'crm_status_view',],
            ['id' => 40, 'title' => 'crm_status_delete',],
            ['id' => 41, 'title' => 'crm_customer_access',],
            ['id' => 42, 'title' => 'crm_customer_create',],
            ['id' => 43, 'title' => 'crm_customer_edit',],
            ['id' => 44, 'title' => 'crm_customer_view',],
            ['id' => 45, 'title' => 'crm_customer_delete',],
            ['id' => 46, 'title' => 'crm_note_access',],
            ['id' => 47, 'title' => 'crm_note_create',],
            ['id' => 48, 'title' => 'crm_note_edit',],
            ['id' => 49, 'title' => 'crm_note_view',],
            ['id' => 50, 'title' => 'crm_note_delete',],
            ['id' => 51, 'title' => 'crm_document_access',],
            ['id' => 52, 'title' => 'crm_document_create',],
            ['id' => 53, 'title' => 'crm_document_edit',],
            ['id' => 54, 'title' => 'crm_document_view',],
            ['id' => 55, 'title' => 'crm_document_delete',],
            ['id' => 57, 'title' => 'contact_management_create',],
            ['id' => 58, 'title' => 'contact_management_edit',],
            ['id' => 59, 'title' => 'contact_management_view',],
            ['id' => 60, 'title' => 'contact_management_delete',],
            ['id' => 71, 'title' => 'sales_invoice_access',],
            ['id' => 72, 'title' => 'sales_invoice_create',],
            ['id' => 73, 'title' => 'sales_invoice_edit',],
            ['id' => 74, 'title' => 'sales_invoice_view',],
            ['id' => 75, 'title' => 'sales_invoice_delete',],
            ['id' => 76, 'title' => 'customer_access',],
            ['id' => 77, 'title' => 'customer_create',],
            ['id' => 78, 'title' => 'customer_edit',],
            ['id' => 79, 'title' => 'customer_view',],
            ['id' => 80, 'title' => 'customer_delete',],
            ['id' => 81, 'title' => 'customer_and_supplier_access',],
            ['id' => 82, 'title' => 'supplier_access',],
            ['id' => 83, 'title' => 'supplier_create',],
            ['id' => 84, 'title' => 'supplier_edit',],
            ['id' => 85, 'title' => 'supplier_view',],
            ['id' => 86, 'title' => 'supplier_delete',],
            ['id' => 87, 'title' => 'purchase_invoice_access',],
            ['id' => 88, 'title' => 'purchase_invoice_create',],
            ['id' => 89, 'title' => 'purchase_invoice_edit',],
            ['id' => 90, 'title' => 'purchase_invoice_view',],
            ['id' => 91, 'title' => 'purchase_invoice_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
