<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class LogoutController extends BaseController
{
    public function index()
    {
        session()->remove([
            'user_id', 'fullname', 'emailaddress', 'usertype', 'is_audit_dashboard_view', 'is_audit_dashboard_update', 'is_admin_log_history'
        ]);
        return redirect()->to('/admin');
    }
}
