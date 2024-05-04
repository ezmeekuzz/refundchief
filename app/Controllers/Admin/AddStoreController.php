<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\MerchantsModel;
use App\Models\Admin\StoresModel;

class AddStoreController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $merchantsModel = new MerchantsModel();
        $merchantList = $merchantsModel->findAll();
        $data = [
            'title' => 'Add Store | Refund Chief',
            'currentpage' => 'addstore',
            'merchantList' => $merchantList
        ];
        return view('pages/admin/addstore', $data);
    }
    public function insert()
    {
        $storesModel = new StoresModel();
        $merchant_primary_id = $this->request->getPost('merchant_primary_id');
        $storename = $this->request->getPost('storename');
        $sellertype = $this->request->getPost('sellertype');
        $grossmerchandisevalue = $this->request->getPost('grossmerchandisevalue');
        $marketplace = $this->request->getPost('marketplace');
    
        $data = [
            'merchant_primary_id' => $merchant_primary_id,
            'storename' => $storename,
            'sellertype' => $sellertype,
            'grossmerchandisevalue' => $grossmerchandisevalue,
            'marketplace' => $marketplace,
        ];

        $result = $storesModel->insert($data);
    
        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Store added successfully!',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to add store.',
            ];
        }
    
        return $this->response->setJSON($response);
    }   
}
