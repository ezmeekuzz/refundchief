<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuditDashboardController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Audit Dashboard | Refund Chief',
            'currentpage' => 'auditdashboard'
        ];
        return view('pages/admin/auditdashboard', $data);
    }
}
