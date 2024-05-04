<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\MerchantsModel;

class AddMerchantController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Add Merchant | Refund Chief',
            'currentpage' => 'addmerchant'
        ];
        return view('pages/admin/addmerchant', $data);
    }
    public function insert()
    {
        $merchantsModel = new MerchantsModel();
        $merchant_id = $this->request->getPost('merchant_id');
        $fullname = $this->request->getPost('fullname');
        $emailaddress = $this->request->getPost('emailaddress');
        $contactnumber = $this->request->getPost('contactnumber');
        $cardnumber = $this->request->getPost('cardnumber');
        $fee = $this->request->getPost('fee');
    
        // Check if merchant ID already exists
        $existingMerchant = $merchantsModel->where('merchant_id', $merchant_id)->first();
        if ($existingMerchant) {
            $response = [
                'success' => false,
                'message' => 'Merchant ID already exists',
            ];
            return $this->response->setJSON($response);
        }
    
        $data = [
            'merchant_id' => $merchant_id,
            'fullname' => $fullname,
            'emailaddress' => $emailaddress,
            'contactnumber' => $contactnumber,
            'cardnumber' => $cardnumber,
            'fee' => $fee,
        ];
    
        // Check if email address already exists
        $existingEmail = $merchantsModel->where('emailaddress', $emailaddress)->first();
        if ($existingEmail) {
            $response = [
                'success' => false,
                'message' => 'Email address is already in use',
            ];
            return $this->response->setJSON($response);
        }
    
        $result = $merchantsModel->insert($data);
    
        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Merchant added successfully!',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to add merchant.',
            ];
        }
    
        return $this->response->setJSON($response);
    }    
}
