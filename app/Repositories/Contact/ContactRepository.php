<?php

namespace App\Repositories\Contact;

use App\Models\Contact;

interface ContactRepository
{
    /**
     * Get all contacts.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all contacts into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find contact by id.
     *
     * @param $id Contact Id
     * @return Contact|null
     */
    public function find($id);

    /**
     * Find contact by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new contact.
     *
     * @param array $data
     * @return Contact
     */
    public function create(array $data);

    /**
     * Update specified contact.
     *
     * @param $id Contact Id
     * @param array $data
     * @return Contact
     */
    public function update($id, array $data);

    /**
     * Remove contact from repository.
     *
     * @param $id Contact Id
     * @return bool
     */
    public function delete($id);

    public function where($where);

    public function paginate($paginate);

}
