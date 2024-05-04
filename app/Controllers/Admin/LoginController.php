<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\UsersModel;

class LoginController extends BaseController
{
    public function index()
    {
        // Check if the user is logged in
        if (session()->has('user_id') && session()->get('usertype') == 'Administrator') {
            return redirect()->to('/admin/dashboard');
        }
        $data = [
            'title' => 'Login | Refund Chief',
        ];
        return view('pages/admin/login', $data);
    }
    public function authenticate()
    {
        $userModel = new UsersModel();
    
        $emailaddress = $this->request->getPost('emailaddress');
        $password = $this->request->getPost('password');
    
        $result = $userModel
        ->where('emailaddress', $emailaddress)
        ->where('usertype', 'Administrator')
        ->first();
    
        if ($result && password_verify($password, $result['encrypted_pass'])) {
            // Set session data
            session()->set('user_id', $result['user_id']);
            session()->set('fullname', $result['fullname']);
            session()->set('emailaddress', $result['emailaddress']);
            session()->set('usertype', $result['usertype']);
            session()->set('is_audit_dashboard_view', $result['is_audit_dashboard_view']);
            session()->set('is_audit_dashboard_update', $result['is_audit_dashboard_update']);
            session()->set('is_admin_log_history', $result['is_admin_log_history']);
    
            // Prepare response
            $response = [
                'success' => true,
                'redirect' => '/admin/dashboard', // Redirect URL upon successful login
                'message' => 'Login successful'
            ];
        } else {
            // Prepare response for invalid login
            $response = [
                'success' => false,
                'message' => 'Invalid login credentials'
            ];
        }
    
        // Return JSON response
        return $this->response->setJSON($response);
    }    
}