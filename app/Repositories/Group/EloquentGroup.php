<?php

namespace App\Repositories\Group;

use App\Models\Group;
use DB;

class EloquentGroup implements GroupRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Group::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Group::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $group = Group::create($data);

        return $group;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $group = $this->find($id);

        $group->update($data);

        return $group;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $group = $this->find($id);

        return $group->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Group::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Group::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $group = Group::where($where);
        
        return $group;
    }
    
    /**
     * {@inheritdoc}
     */
    public function paginate($paginate)
    {
        $group = Group::paginate($paginate);
        
        return $group;
    }

}
