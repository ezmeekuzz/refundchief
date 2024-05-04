<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\MerchantsModel;
use App\Models\Admin\StoresModel;

class EditStoreController extends BaseController
{
    public function index($id)
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $merchantsModel = new MerchantsModel();
        $storesModel = new StoresModel();
        $merchantList = $merchantsModel->findAll();
        $storeDetails = $storesModel
        ->select('stores.*, merchants.*') // Select columns from both tables
        ->join('merchants', 'merchants.merchant_primary_id = stores.merchant_primary_id', 'left') // Join with the merchants table
        ->where('stores.store_id', $id) // Condition to find the specific store by ID
        ->get()
        ->getRowArray(); // Fetch the row as an array
        $data = [
            'title' => 'Edit Store | Refund Chief',
            'currentpage' => 'storemasterlist',
            'merchantList' => $merchantList,
            'storeDetails' => $storeDetails
        ];
        return view('pages/admin/editstore', $data);
    }
    public function update()
    {
        $storesModel = new StoresModel();
        $store_id = $this->request->getPost('store_id');
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

        $result = $storesModel->update($store_id, $data);
    
        if ($result) {
            $response = [
                'success' => true,
                'message' => 'Store updated successfully!',
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Failed to update store.',
            ];
        }
    
        return $this->response->setJSON($response);
    }   
}
