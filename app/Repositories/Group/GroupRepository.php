<?php

namespace App\Repositories\Group;

use App\Models\Group;

interface GroupRepository
{
    /**
     * Get all groups.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all groups into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find group by id.
     *
     * @param $id Group Id
     * @return Group|null
     */
    public function find($id);

    /**
     * Find group by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new grou[].
     *
     * @param array $data
     * @return Group
     */
    public function create(array $data);

    /**
     * Update specified group.
     *
     * @param $id Group Id
     * @param array $data
     * @return Group
     */
    public function update($id, array $data);

    /**
     * Remove group from repository.
     *
     * @param $id Group Id
     * @return bool
     */
    public function delete($id);

    public function where($where);

    public function paginate($paginate);

}
