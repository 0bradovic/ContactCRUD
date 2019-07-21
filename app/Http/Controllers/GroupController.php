<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Group\GroupRepository;

class GroupController extends Controller
{
    //
    /**
     * @var EloquentContact
     * @var EloquentGroup
     */
    private $contact;
    private $group;

    /**
     * Main constructor.
     * @param ContactRepository $contact
     * @param GroupRepository $group
     */
    public function __construct(ContactRepository $contact, GroupRepository $group)
    {
        $this->contact = $contact;
        $this->group = $group;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = $this->group->paginate(15);

        return view('vendor.adminlte.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendor.adminlte.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);

        $this->group->create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Successfully added new group.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $group = $this->group->find($id);

        return view('vendor.adminlte.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name' => 'required'
        ]);

        $group = $this->group->find($id);

        $group->update([
            'name' => $request->name,
        ]);

        return redirect()->route('group.index')->with('success', 'Successfully updated group '.$group->name);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $group = $this->group->find($id);

        $name = $group->name;

        $this->group->delete($id);

        return redirect()->back()->with('success', 'Successfully deleted group '.$name);
    }
}
