<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:admin,kasir');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::paginate(10);
        return view('main.member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.member.add-member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->memberValidation($request);
        Member::create([
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'tlp' => $request->tlp,
        ]);
        
        return redirect()->route('member.index')->with('success', 'Member baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::where('id', $id)->first();
        return view('main.member.edit', compact('member'));
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
        $this->memberValidation($request);
        Member::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'tlp' => $request->tlp,
        ]);
        return redirect()->route('member.index')->with('update', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->route('member.index');
    }

    private function memberValidation($request)
    {
        $validation = $request->validate([
            'name' => ['required', 'max:100'],
            'address' => ['required','string'],
            'gender' => ['required','size:1'],
            'tlp' => ['required','digits_between:11,13'],
        ]);
    }

    public function trash()
    {
        $members = Member::onlyTrashed()->paginate(10);
        return view('main.member.trash', compact('members'));
    }

    public function forceDelete($id)
    {
        $member = Member::withTrashed()->where('id', $id);

        $member->forceDelete();
        return redirect()->route('member.trash');
    }
    public function forceDeleteAll()
    {
        $members = Member::onlyTrashed()->get();
        if (!$members->first->id) {
            return redirect()->route('member.trash')->with('error', 'Tidak ada data dalam sampah');
        }
        foreach ($members as $member) {
            $member->where('id', $member->id)->forceDelete();
        }
        return redirect()->route('member.trash');
    }

    public function restore($id)
    {
        Member::withTrashed()->where('id', $id)->restore();
        return redirect()->route('member.trash')->with('restore', 'Data berhasil dipulihkan');
    }
}
