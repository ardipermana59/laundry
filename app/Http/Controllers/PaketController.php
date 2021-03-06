<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packet;
use App\Models\Outlet;

class PaketController extends Controller
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
        $pakets = Packet::paginate(10);
        return view('main.paket.index',compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlets = Outlet::all();
        return view('main.paket.add-paket', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->paketValidation($request);
        Packet::create([
            'outlet_id' => (int) $request->outlet_id,
            'type' => $request->type,
            'packet_name' => $request->packet_name,
            'cost' => $request->cost,
        ]);
        
        return redirect()->route('paket.index')->with('success', 'Paket baru berhasil ditambahkan');
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
        $paket = Packet::find($id);
        $outlets = Outlet::all();
        return view('main.paket.edit', compact('paket','outlets'));
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
        $this->paketValidation($request);
        Packet::where('id',$id)->update([
            'outlet_id' => (int) $request->outlet_id,
            'type' => $request->type,
            'packet_name' => $request->packet_name,
            'cost' => $request->cost,
        ]);

        return redirect()->route('paket.index')->with('update', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packet::destroy($id);
        return redirect()->route('paket.index');
    }

    private function paketValidation($request)
    {
        $validation = $request->validate([
            'outlet_id' => ['required','integer'],
            'type' => ['required','string'],
            'packet_name' => ['required','string'],
            'cost' => ['required'],
        ]);
    }

        public function trash()
    {
        $pakets = Packet::onlyTrashed()->paginate(10);
        return view('main.paket.trash', compact('pakets'));
    }

    public function forceDelete($id)
    {
        $paket = Packet::withTrashed()->where('id', $id);
        $paket->forceDelete();
        return redirect()->route('paket.trash')->with('success', 'Data berhasil dihapus secara permanent');
    }
    public function forceDeleteAll()
    {
        $pakets = Packet::onlyTrashed()->get();
        if (!$pakets->first->id) {
            return redirect()->route('paket.trash')->with('error', 'Tidak ada data dalam sampah');
        }
        foreach ($pakets as $paket) {
            $paket->where('id', $paket->id)->forceDelete();
        }
        return redirect()->route('paket.trash')->with('success', 'Seluruh data sampah berhasil dibersihkan');
    }

    public function restore($id)
    {
        Packet::withTrashed()->where('id', $id)->restore();
        return redirect()->route('paket.trash')->with('restore', 'Data berhasil dipulihkan');
    }
}
