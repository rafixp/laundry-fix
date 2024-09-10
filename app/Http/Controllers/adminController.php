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
use Illuminate\Support\Facades\Hash;

date_default_timezone_set('Asia/Jakarta');

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

    public function user(){
        $get = User::all();
        $out = Outlet::all();
        return view('admin.user', compact('get','out'));
    }

    public function transaksi(){
        $get = Transaksi::latest()->get();
        $tgl = date('Ymdhis');
        $mem = Member::all();
        $out = Outlet::all();
        $pak = Paket::all();
        return view('admin.transaksi', compact('get','tgl','mem','out','pak'));
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

    public function hapusPaket($id){
        $get = Paket::find($id);
        if($get->delete()){
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

    public function hapusOutlet($id){
        $get = Outlet::find($id);
        if($get->delete()){
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

    public function showUser($id){
        $get = User::find($id);
        return response()->json($get);
    }

    public function editUser(r $r, $id){
        $get = User::find($id);
        $data = [
            "name" => $r->name,
            "email" => $r->email,
            "password" => $r->password ? Hash::make($r->password) : $get->password,
            "role" => $r->role,
            "id_outlet" => $r->id_outlet,
        ];

        if($get->update($data)){
            return redirect('/admin/user');
        }
    }

    public function tambahUser(r $r){
        $data = $r->all();
        if(User::create($data)){
            return redirect('/admin/user');
        }
    }

    public function hapusUser($id){
        $get = User::find($id);
        if($get->delete()){
            return redirect('/admin/user');
        }
    }

    public function tambahTransaksi(r $r){
        $data = [
            "kode_invoice" => $r->kode_invoice,
            "id_outlet" => $r->id_outlet,
            "id_member" => $r->id_member,
            "tgl" => date('Y-m-d'),
            "batas_waktu" => $r->batas_waktu,
            "biaya_tambahan" => $r->biaya_tambahan,
            "diskon" => $r->diskon,
            "pajak" => $r->pajak,
        ];
        if(Transaksi::create($data)){
            return redirect('/admin/transaksi');
        }
    }

    public function hapusTransaksi($id){
        $get = Transaksi::find($id);
        if($get->delete()){
            return redirect('/admin/transaksi');
        }
    }

    public function showTransaksi($id){
        $get = Transaksi::findOrFail($id);
        return response()->json(["transaksi" => $get, "pelanggan" => $get->pelanggan]);
    }
     
    public function konfirmasiTransaksi(r $r, $id){
        $data = [
            "id_paket" => $r->id_paket,
            "qty" => $r->qty,
            "keterangan" => $r->keterangan,
        ];

        $cek = detailTransaksi::create($data);
        if($cek){
            return redirect('/admin/transaksi');
        }
    }
}
