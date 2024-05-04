<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\UsersModel;

class EditUserController extends BaseController
{
    public function index($id)
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $userModel = new UsersModel();
        $userDetails = $userModel->find($id);
        $data = [
            'title' => 'Edit User | Refund Chief',
            'currentpage' => 'usermasterlist',
            'userDetails' => $userDetails
        ];
        return view('pages/admin/edituser', $data);
    }
    public function update()
    {
        $usersModel = new UsersModel();
        $userId = $this->request->getPost('user_id');
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
    
        // Check if the provided username is already in use
        $userList = $usersModel->where('emailaddress', $emailaddress)->where('user_id !=', $userId)->first();
        if ($userList) {
            $response = [
                'success' => false,
                'message' => 'Email address is not available',
            ];
        } else {
            // Update the user data
            $updated = $usersModel->update($userId, $data);
    
            if ($updated) {
                $response = [
                    'success' => true,
                    'message' => 'User updated successfully!',
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Failed to update user.',
                ];
            }
        }
    
        return $this->response->setJSON($response);
    }    
}
