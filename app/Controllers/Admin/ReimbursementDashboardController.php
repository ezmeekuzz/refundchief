<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReimbursementDashboardController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Reimbursement Dashboard | Refund Chief',
            'currentpage' => 'reimbursementdashboard'
        ];
        return view('pages/admin/reimbursementdashboard', $data);
    }
}
