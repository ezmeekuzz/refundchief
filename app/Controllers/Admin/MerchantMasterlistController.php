<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\MerchantsModel;

class MerchantMasterlistController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Merchant Masterlist | Refund Chief',
            'currentpage' => 'merchantmasterlist'
        ];
        return view('pages/admin/merchantmasterlist', $data);
    }
    public function getData()
    {
        // Load the model
        $dModel = new MerchantsModel();

        // Get the request parameters
        $draw = $this->request->getPost('draw');
        $length = intval($this->request->getPost('length'));
        $start = intval($this->request->getPost('start'));
        $search = $this->request->getPost('search')['value'];

        // Get the total number of records
        $totalRecords = $dModel->countAll();

        // Get filtered records
        $filteredRecords = $dModel
            ->like('fullname', $search)
            ->orLike('emailaddress', $search)
            // Add more columns for searching as needed
            ->limit($length, $start)
            ->findAll();

        // Prepare data for DataTables
        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => count($filteredRecords),
            'data' => $filteredRecords,
        ];

        // Return JSON response
        return $this->response->setJSON($data);
    }
    public function delete($id)
    {
        $MerchantsModel = new MerchantsModel();
    
        // Find the merchants by ID
        $merchants = $MerchantsModel->find($id);
    
        if ($merchants) {
    
            // Delete the record from the database
            $deleted = $MerchantsModel->delete($id);
    
            if ($deleted) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete the merchant from the database']);
            }
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'merchants not found']);
    } 
}
