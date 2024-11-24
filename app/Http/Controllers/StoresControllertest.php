<?php

namespace App\Http\Controllers;

use App\Models\Model_stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    protected $modelStores;

    public function __construct(Model_stores $modelStores)
    {
        $this->modelStores = $modelStores;
    }

    public function index()
    {
        // Assuming permissions are handled differently in Laravel. You might use middleware.
        $stores = $this->modelStores->getStoresData();
        return view('stores.index', ['stores' => $stores]);
    }

    public function fetchCategoryData()
    {
        $data = $this->modelStores->getStoresData();
        $result = ['data' => []];

        foreach ($data as $key => $value) {
            $buttons = '';

            // Assuming permissions are checked in your middleware or similar
            $buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value->id.')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
            $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value->id.')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';

            $status = ($value->active == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

            $result['data'][$key] = [
                $value->name,
                $status,
                $buttons
            ];
        }

        return response()->json($result);
    }

    public function create(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string',
            'active' => 'required|boolean',
        ]);

        $data = [
            'name' => $request->input('store_name'),
            'active' => $request->input('active'),
        ];

        $create = $this->modelStores->createStore($data);

        if ($create) {
            return response()->json(['success' => true, 'messages' => 'Successfully created']);
        } else {
            return response()->json(['success' => false, 'messages' => 'Error in the database while creating the store information']);
        }
    }

    public function fetchStoresDataById($id)
    {
        $store = $this->modelStores->getStoresData($id);

        if ($store) {
            return response()->json($store);
        } else {
            return response()->json(['success' => false, 'messages' => 'Store not found']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_store_name' => 'required|string',
            'edit_active' => 'required|boolean',
        ]);

        $data = [
            'name' => $request->input('edit_store_name'),
            'active' => $request->input('edit_active'),
        ];

        $update = $this->modelStores->updateStore($id, $data);

        if ($update) {
            return response()->json(['success' => true, 'messages' => 'Successfully updated']);
        } else {
            return response()->json(['success' => false, 'messages' => 'Error in the database while updating the store information']);
        }
    }

    public function remove(Request $request)
    {
        $store_id = $request->input('store_id');

        if ($store_id) {
            $delete = $this->modelStores->removeStore($store_id);

            if ($delete) {
                return response()->json(['success' => true, 'messages' => 'Successfully removed']);
            } else {
                return response()->json(['success' => false, 'messages' => 'Error in the database while removing the store information']);
            }
        } else {
            return response()->json(['success' => false, 'messages' => 'Please refresh the page and try again']);
        }
    }
}
