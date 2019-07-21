<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\Group\GroupRepository;

class ContactController extends Controller
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
        $contacts = $this->contact->paginate(15);

        return view('vendor.adminlte.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $groups = $this->group->all();

        return view('vendor.adminlte.contacts.create', compact('groups'));
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
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $newContact = $this->contact->create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
            'group_id' => $request->group_id,
        ]);

        if($request->avatar)
        {
            $file = $request->avatar;
            $avatarName = time().$file->getClientOriginalName();
            $file->move('contact/avatars', $avatarName);
            $avatarUrl = '/contact/avatars/'.$avatarName;

            $newContact->avatar = $avatarUrl;
            $newContact->save();
        }

        return redirect()->back()->with('success', 'Successfully added new contact.');
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
        $contact = $this->contact->find($id);

        $groups = $this->group->all();

        return view('vendor.adminlte.contacts.edit', compact('contact', 'groups'));
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
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $contact = $this->contact->find($id);

        $contact->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
            'group_id' => $request->group_id,
        ]);

        if($request->avatar)
        {
            if($contact->avatar)
            {
                unlink(public_path().$contact->avatar);
            }
            $file = $request->avatar;
            $avatarName = time().$file->getClientOriginalName();
            $file->move('contact/avatars', $avatarName);
            $avatarUrl = '/contact/avatars/'.$avatarName;

            $contact->avatar = $avatarUrl;
            $contact->save();
        }

        return redirect()->route('contact.index')->with('success', 'Successfully updated contact '.$contact->name);
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
        $contact = $this->contact->find($id);

        $name = $contact->name;

        $this->contact->delete($id);

        return redirect()->back()->with('success', 'Successfully deleted contact '.$name);
    }
}
