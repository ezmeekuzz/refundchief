<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\UsersModel;

class AddUserController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Add User | Refund Chief',
            'currentpage' => 'adduser'
        ];
        return view('pages/admin/adduser', $data);
    }
    public function insert()
    {
        $usersModel = new UsersModel();
        $fullname = $this->request->getPost('fullname');
        $emailaddress = $this->request->getPost('emailaddress');
        $usertype = $this->request->getPost('usertype');
        $is_audit_dashboard_view = ($this->request->getPost('is_audit_dashboard_view') == "Yes") ? "Yes" : "No";
        $is_audit_dashboard_update = ($this->request->getPost('is_audit_dashboard_update') == "Yes") ? "Yes" : "No";
        $is_admin_log_history = ($this->request->getPost('is_admin_log_history') == "Yes") ? "Yes" : "No";
        $password = $this->request->getPost('password');
        $data = [
            'fullname' => $fullname,
            'emailaddress' => $emailaddress,
            'usertype' => $usertype,
            'is_audit_dashboard_view' => $is_audit_dashboard_view,
            'is_audit_dashboard_update' => $is_audit_dashboard_update,
            'is_admin_log_history' => $is_admin_log_history,
            'password' => $password,
            'encrypted_pass' => password_hash($password, PASSWORD_BCRYPT),
        ];
        $userList = $usersModel->where('emailaddress', $emailaddress)->first();
        if($userList) {
            $response = [
                'success' => false,
                'message' => 'Email address is not available',
            ];
        }
        else {
            $userId = $usersModel->insert($data);
    
            if ($userId) {
                $response = [
                    'success' => 'success',
                    'message' => 'User added successfully!',
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to add user.',
                ];
            }
        }

        return $this->response->setJSON($response);
    }
}
