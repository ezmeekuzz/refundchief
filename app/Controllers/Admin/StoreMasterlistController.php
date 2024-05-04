<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Admin\StoresModel;

class StoreMasterlistController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id') && session()->get('usertype') != 'Administrator') {
            return redirect()->to('/admin/login');
        }
        $data = [
            'title' => 'Store Masterlist | Refund Chief',
            'currentpage' => 'storemasterlist'
        ];
        return view('pages/admin/storemasterlist', $data);
    }
    public function getData()
    {
        // Load the model
        $sModel = new StoresModel();

        // Get the request parameters
        $draw = $this->request->getPost('draw');
        $length = intval($this->request->getPost('length'));
        $start = intval($this->request->getPost('start'));
        $search = $this->request->getPost('search')['value'];

        // Get the total number of records
        $totalRecords = $sModel->countAll();

        // Get filtered records
        $filteredRecords = $sModel
            ->select('stores.*, merchants.*') // select the columns you need
            ->join('merchants', 'merchants.merchant_primary_id = stores.merchant_primary_id') // join with the merchants table
            ->like('storename', $search)
            ->orLike('fullname', $search)
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
        $StoresModel = new StoresModel();
    
        // Find the stores by ID
        $stores = $StoresModel->find($id);
    
        if ($stores) {
    
            // Delete the record from the database
            $deleted = $StoresModel->delete($id);
    
            if ($deleted) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete the stores from the database']);
            }
        }
    
        return $this->response->setJSON(['status' => 'error', 'message' => 'stores not found']);
    } 
}
