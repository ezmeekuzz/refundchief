<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CommissionReportController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Commission Report | Refund Chief',
            'currentpage' => 'commissionreport'
        ];
        return view('pages/admin/commissionreport', $data);
    }
}
