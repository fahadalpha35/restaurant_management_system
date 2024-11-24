<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Model_stores extends Model
{
    // Specify the table name if it's different from the plural form of the class name.
    protected $table = 'stores';

    // Specify the fillable fields to allow mass assignment.
    protected $fillable = ['name', 'active'];

    /**
     * Get all stores or a single store by ID.
     * 
     * @param  int|null  $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getStoresData($id = null)
    {
        if ($id) {
            return $this->find($id); // Retrieve a single record by primary key
        }

        return $this->orderBy('id', 'desc')->get(); // Retrieve all records ordered by ID descending
    }

    /**
     * Create a new store record.
     * 
     * @param  array  $data
     * @return bool
     */
    public function createStore(array $data)
    {
        return $this->create($data) ? true : false;
    }

    /**
     * Update an existing store record.
     * 
     * @param  int  $id
     * @param  array  $data
     * @return bool
     */
    public function updateStore($id, array $data)
    {
        $store = $this->find($id);
        if ($store) {
            return $store->update($data);
        }
        return false;
    }

    /**
     * Remove a store record by ID.
     * 
     * @param  int  $id
     * @return bool
     */
    public function removeStore($id)
    {
        $store = $this->find($id);
        if ($store) {
            return $store->delete();
        }
        return false;
    }

    /**
     * Get all active stores.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActiveStores()
    {
        return $this->where('active', 1)->get();
    }

    /**
     * Count the total number of active stores.
     * 
     * @return int
     */
    public function countTotalStores()
    {
        return $this->where('active', 1)->count();
    }
}
