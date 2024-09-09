@extends('admin.navbar')

@section('content')
    <div class="card w-75 mt-5 p-2 bg-white shadow mx-auto">
        <div class="card-body">
            <h3 class="mx-2">Data Pengguna</h3>
            <table class="table table-bordered" id="datatable">
                <thead>
                    <th>No.</th>
                    <th>Nama Outlet</th>
                    <th>Nama Paket</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection