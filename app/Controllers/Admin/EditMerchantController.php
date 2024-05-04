<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\MerchantsModel;

class EditMerchantController extends BaseController
{
    public function index($id)
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $merchantsModel = new MerchantsModel();
        $merchantDetails = $merchantsModel->find($id);
        $data = [
            'title' => 'Edit Merchant | Refund Chief',
            'currentpage' => 'merchantmasterlist',
            'merchantDetails' => $merchantDetails
        ];
        return view('pages/admin/editmerchant', $data);
    }
    public function update()
    {
        $merchantsModel = new MerchantsModel();
        $merchant_primary_id = $this->request->getPost('merchant_primary_id');
        $merchant_id = $this->request->getPost('merchant_id');
        $fullname = $this->request->getPost('fullname');
        $emailaddress = $this->request->getPost('emailaddress');
        $contactnumber = $this->request->getPost('contactnumber');
        $cardnumber = $this->request->getPost('cardnumber');
        $fee = $this->request->getPost('fee');
    
        // Check if merchant ID already exists
        $existingMerchant = $merchantsModel->where('merchant_id', $merchant_id)->where('merchant_primary_id !=', $merchant_primary_id)->first();
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
        $existingEmail = $merchantsModel->where('emailaddress', $emailaddress)->where('merchant_primary_id !=', $merchant_primary_id)->first();
        if ($existingEmail) {
            $response = [
                'success' => false,
                'message' => 'Email address is already in use',
            ];
            return $this->response->setJSON($response);
        }
    
        $result = $merchantsModel->update($merchant_primary_id, $data);
    
        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Merchant updated successfully!',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to update merchant.',
            ];
        }
    
        return $this->response->setJSON($response);
    }    
}
