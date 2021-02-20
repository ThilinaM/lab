<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 24,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 25,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 26,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 27,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 28,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 29,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 30,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 31,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 32,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 33,
                'title' => 'asset_create',
            ],
            [
                'id'    => 34,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 35,
                'title' => 'asset_show',
            ],
            [
                'id'    => 36,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 37,
                'title' => 'asset_access',
            ],
            [
                'id'    => 38,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 39,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 40,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 41,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 42,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 43,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 45,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 46,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 47,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 48,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 49,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 50,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 51,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 52,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 53,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 54,
                'title' => 'task_create',
            ],
            [
                'id'    => 55,
                'title' => 'task_edit',
            ],
            [
                'id'    => 56,
                'title' => 'task_show',
            ],
            [
                'id'    => 57,
                'title' => 'task_delete',
            ],
            [
                'id'    => 58,
                'title' => 'task_access',
            ],
            [
                'id'    => 59,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 60,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 61,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 62,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 63,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 64,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 65,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 66,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 67,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 68,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 69,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 70,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 71,
                'title' => 'expense_create',
            ],
            [
                'id'    => 72,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 73,
                'title' => 'expense_show',
            ],
            [
                'id'    => 74,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 75,
                'title' => 'expense_access',
            ],
            [
                'id'    => 76,
                'title' => 'income_create',
            ],
            [
                'id'    => 77,
                'title' => 'income_edit',
            ],
            [
                'id'    => 78,
                'title' => 'income_show',
            ],
            [
                'id'    => 79,
                'title' => 'income_delete',
            ],
            [
                'id'    => 80,
                'title' => 'income_access',
            ],
            [
                'id'    => 81,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 82,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 83,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 84,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 85,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 86,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 87,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 88,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 89,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 90,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 91,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 92,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 93,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 94,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 95,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 96,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 97,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 98,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 99,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 100,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 101,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 102,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 103,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 104,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 105,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 106,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 107,
                'title' => 'setting_access',
            ],
            [
                'id'    => 108,
                'title' => 'invoice_type_create',
            ],
            [
                'id'    => 109,
                'title' => 'invoice_type_edit',
            ],
            [
                'id'    => 110,
                'title' => 'invoice_type_show',
            ],
            [
                'id'    => 111,
                'title' => 'invoice_type_delete',
            ],
            [
                'id'    => 112,
                'title' => 'invoice_type_access',
            ],
            [
                'id'    => 113,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 114,
                'title' => 'nic_type_create',
            ],
            [
                'id'    => 115,
                'title' => 'nic_type_edit',
            ],
            [
                'id'    => 116,
                'title' => 'nic_type_show',
            ],
            [
                'id'    => 117,
                'title' => 'nic_type_delete',
            ],
            [
                'id'    => 118,
                'title' => 'nic_type_access',
            ],
            [
                'id'    => 119,
                'title' => 'country_create',
            ],
            [
                'id'    => 120,
                'title' => 'country_edit',
            ],
            [
                'id'    => 121,
                'title' => 'country_show',
            ],
            [
                'id'    => 122,
                'title' => 'country_delete',
            ],
            [
                'id'    => 123,
                'title' => 'country_access',
            ],
            [
                'id'    => 124,
                'title' => 'district_create',
            ],
            [
                'id'    => 125,
                'title' => 'district_edit',
            ],
            [
                'id'    => 126,
                'title' => 'district_show',
            ],
            [
                'id'    => 127,
                'title' => 'district_delete',
            ],
            [
                'id'    => 128,
                'title' => 'district_access',
            ],
            [
                'id'    => 129,
                'title' => 'divisional_secretariat_create',
            ],
            [
                'id'    => 130,
                'title' => 'divisional_secretariat_edit',
            ],
            [
                'id'    => 131,
                'title' => 'divisional_secretariat_show',
            ],
            [
                'id'    => 132,
                'title' => 'divisional_secretariat_delete',
            ],
            [
                'id'    => 133,
                'title' => 'divisional_secretariat_access',
            ],
            [
                'id'    => 134,
                'title' => 'grama_niladari_division_create',
            ],
            [
                'id'    => 135,
                'title' => 'grama_niladari_division_edit',
            ],
            [
                'id'    => 136,
                'title' => 'grama_niladari_division_show',
            ],
            [
                'id'    => 137,
                'title' => 'grama_niladari_division_delete',
            ],
            [
                'id'    => 138,
                'title' => 'grama_niladari_division_access',
            ],
            [
                'id'    => 139,
                'title' => 'photo_size_create',
            ],
            [
                'id'    => 140,
                'title' => 'photo_size_edit',
            ],
            [
                'id'    => 141,
                'title' => 'photo_size_show',
            ],
            [
                'id'    => 142,
                'title' => 'photo_size_delete',
            ],
            [
                'id'    => 143,
                'title' => 'photo_size_access',
            ],
            [
                'id'    => 144,
                'title' => 'visa_background_color_create',
            ],
            [
                'id'    => 145,
                'title' => 'visa_background_color_edit',
            ],
            [
                'id'    => 146,
                'title' => 'visa_background_color_show',
            ],
            [
                'id'    => 147,
                'title' => 'visa_background_color_delete',
            ],
            [
                'id'    => 148,
                'title' => 'visa_background_color_access',
            ],
            [
                'id'    => 149,
                'title' => 'paper_type_create',
            ],
            [
                'id'    => 150,
                'title' => 'paper_type_edit',
            ],
            [
                'id'    => 151,
                'title' => 'paper_type_show',
            ],
            [
                'id'    => 152,
                'title' => 'paper_type_delete',
            ],
            [
                'id'    => 153,
                'title' => 'paper_type_access',
            ],
            [
                'id'    => 154,
                'title' => 'order_status_create',
            ],
            [
                'id'    => 155,
                'title' => 'order_status_edit',
            ],
            [
                'id'    => 156,
                'title' => 'order_status_show',
            ],
            [
                'id'    => 157,
                'title' => 'order_status_delete',
            ],
            [
                'id'    => 158,
                'title' => 'order_status_access',
            ],
            [
                'id'    => 159,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
