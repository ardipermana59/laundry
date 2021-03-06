<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::paginate(10);
        return view('main.outlet.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.outlet.add-outlet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->outletValidation($request);
        Outlet::create([
            'name' => $request->name,
            'address' => $request->address,
            'tlp' => $request->tlp,
        ]);

        return redirect()->route('outlet.index')->with('success', 'Berhasil menambahkan data outlet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlet = Outlet::where('id', $id)->first();
        return view('main.outlet.edit', compact('outlet'));
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
        $this->outletValidation($request);
        Outlet::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'tlp' => $request->tlp,
        ]);
        return redirect()->route('outlet.index')->with('update', 'Data berhasil diperbarui');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Outlet::destroy($id);
        return redirect()->route('outlet.index');
    }

    private function outletValidation($request)
    {
        $validation = $request->validate([
            'name' => ['required', 'max:100'],
            'address' => ['required','string'],
            'tlp' => ['required','digits_between:11,13'],
        ]);  
    }

    public function trash()
    {
        $outlets = Outlet::onlyTrashed()->paginate(10);
        return view('main.outlet.trash', compact('outlets'));
    }

    public function forceDelete($id)
    {
        $outlet = Outlet::withTrashed()->where('id', $id);
        $outlet->forceDelete();
        return redirect()->route('outlet.trash');
    }
    public function forceDeleteAll()
    {
        $outlets = Outlet::onlyTrashed()->get();
        if (!$outlets->first->id) {
            return redirect()->route('outlet.trash')->with('error', 'Tidak ada data dalam sampah');
        }
        foreach ($outlets as $outlet) {
            $outlet->where('id', $outlet->id)->forceDelete();
        }
        return redirect()->route('outlet.trash');
    }

    public function restore($id)
    {
        Outlet::withTrashed()->where('id', $id)->restore();
        return redirect()->route('outlet.trash')->with('restore', 'Data berhasil dipulihkan');
    }
}
