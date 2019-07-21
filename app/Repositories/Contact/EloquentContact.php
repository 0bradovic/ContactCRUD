<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use DB;

class EloquentContact implements ContactRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Contact::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Contact::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $contact = Contact::create($data);

        return $contact;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $contact = $this->find($id);

        $contact->update($data);

        return $contact;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $contact = $this->find($id);

        return $contact->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Contact::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Contact::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $contact = Contact::where($where);
        
        return $contact;
    }

    /**
     * {@inheritdoc}
     */
    public function paginate($paginate)
    {
        $contact = Contact::paginate($paginate);
        
        return $contact;
    }

}
