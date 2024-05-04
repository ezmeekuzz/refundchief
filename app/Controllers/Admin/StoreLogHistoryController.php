<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StoreLogHistoryController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Store Log History | Refund Chief',
            'currentpage' => 'storeloghistory'
        ];
        return view('pages/admin/storeloghistory', $data);
    }
}
