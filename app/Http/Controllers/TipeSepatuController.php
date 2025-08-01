<?php

namespace App\Http\Controllers;

use App\Models\TipeSepatu;
use Illuminate\Http\Request;

class TipeSepatuController extends Controller
{
    public function viewTipeSepatu()
    {
        $data = TipeSepatu::paginate(3);
        return view('admin.tipesepatu.tipeSepatu', compact('data'));
    }

    public function addTipeSepatu(Request $request)
    {
        $data = new TipeSepatu([
            'tipe_sepatu' => $request->input('tipe_sepatu'),
            'harga' => $request->input('harga')
        ]);
        $data->save();
        return redirect('/admin/tipe-sepatu')->with('success', 'Berhasil menambahkan tipe sepatu');
    }

    public function detailTipeSepatu($id){
        $data = TipeSepatu::find($id);
        return view('admin.tipesepatu.detailTipeSepatu', compact('data'));
    }

    public function viewEditTipeSepatu($id){
        $data = TipeSepatu::findorfail($id);
        return view('admin.tipesepatu.editTipeSepatu', compact('data'));
    }
    public function editTipeSepatu(Request $request, $id)
    {
        TipeSepatu::findorfail($id)->update([
            'tipe_sepatu' => $request->input('tipe_sepatu'),
            'harga' => $request->input('harga')
        ]);
        return redirect('/admin/tipe-sepatu')->with('success', 'Berhasil update tipe sepatu');
    }

    public function deleteTipeSepatu($id)
    {
        $data = TipeSepatu::findorfail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Berhasil delete sepatu');
    }
}
