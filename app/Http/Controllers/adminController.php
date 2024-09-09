<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request as r;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Outlet;
use App\Models\detailTransaksi;
use App\Models\Transaksi;
use App\Models\User;

class adminController extends Controller
{
    public function home(){ 
        return view('admin.home');
    }

    public function paket(){
        $get = Paket::latest()->get();
        $outlet = Outlet::all();
        return view('admin.paket',compact('get','outlet'));
    }

    public function member(){
        $get = Member::all();
        return view('admin.member',compact('get'));
    }

    public function outlet(){
        $get = Outlet::all();
        return view('admin.outlet', compact('get'));
    }

    public function pengguna(){
        return view('admin.pengguna');
    }

    public function tambahPaket(r $r){
        $data = $r->all();
        if(Paket::create($data)){
            return redirect('/admin/paket');
        }
    }

    public function showPaket($id){
        $get = Paket::findOrFail($id);
        return response()->json($get);
    }

    public function editPaket(r $r, $id){
        $data = $r->all();
        $cek = Paket::findOrFail($id);
        if($cek->update($data)){
            return redirect('/admin/paket');
        }
    }

    public function tambahOutlet(r $r){
        $data = $r->all();
        if(Outlet::create($data)){
            return redirect('/admin/outlet');
        }
    }
    public function showOutlet($id){
        $get = Outlet::findOrFail($id);
        return response()->json($get);
    }

    public function editOutlet(r $r, $id){
        $get = Outlet::findOrFail($id);
        $data = $r->all();
        if($get->update($data)){
            return redirect('/admin/outlet');
        }
    }

    public function tambahMember(r $r){
        $data = $r->all();
        if(Member::create($data)){
            return redirect('/admin/member');
        }
    }

    public function showMember($id){
        $get = Member::findOrFail($id);
        return response()->json($get);
    }

    public function editMember(r $r, $id){
        $cek = Member::findOrFail($id);
        $data = $r->all();

        if($cek->update($data)){
            return redirect('/admin/member');
        }
    }

    public function hapusMember($id){
        $get = Member::findOrFail($id);
        if($get->delete()){
            return redirect('/admin/member');
        }
    }
}
