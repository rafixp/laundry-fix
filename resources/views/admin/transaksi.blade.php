@extends('admin.navbar')

@section('content')
    <div class="card w-75 mt-5 p-2 bg-white shadow mx-auto">
        <div class="card-body">
            <h3 class="mx-2">Transaksi</h3>
            <button type="button" class="btn btn-sm btn-primary mb-4 mx-2" data-toggle="modal" data-target="#tambahModal">
                Tambah Outlet
            </button>
            <table class="table table-bordered responsive" id="datatable">
                <thead>
                    <th>No.</th>
                    <th>Kode Invoice</th>
                    <th>Nama Member</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th>Dibayar</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($get as $a)
                    <tr>
                        <td><?= $i++?>.</td>
                        <td>{{$a->kode_invoice}}</td>
                        <td>{{$a->pelanggan}}</td>
                        <td>{{$a->tgl}}</td>
                        <td>{{$a->status}}</td>
                        <td>{{$a->dibayar}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#editModal">
                                <span class="fas fa-sync"></span>
                            </button>
                            <a href="/admin/transaksi/hapus" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><span class="fas fa-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/admin/transaksi/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Kode Invoice</label>
                        <input type="text" name="kode_invoice" class="form-control" value="LND{{$tgl}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Outlet</label>
                        <select name="id_outlet" class="form-control" required>
                            <option>Pilih Outlet</option>
                            @foreach ($out as $a)
                            <option value="{{$a->id}}">{{$a->nama}}</option>                               
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Member</label>
                        <select name="id_member" class="form-control" required>
                            <option>Pilih Member</option>
                            @foreach ($mem as $a)
                            <option value="{{$a->id}}">{{$a->nama}}</option>                               
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tgl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Batas Waktu</label>
                        <input type="date" name="batas_waktu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Biaya Tambahan</label>
                        <input type="number" name="biaya_tambahan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" name="diskon" class="form-control">
                    </div><div class="form-group">
                        <label>Pajak</label>
                        <input type="number" name="pajak" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
                </div>
            </div>
            </div>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/admin/transaksi/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Kode Invoice</label>
                        <input type="text" name="kode_invoice" class="form-control" value="LND{{$tgl}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Outlet</label>
                        <select name="id_outlet" class="form-control" required>
                            <option>Pilih Outlet</option>
                            @foreach ($out as $a)
                            <option value="{{$a->id}}">{{$a->nama}}</option>                               
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Member</label>
                        <select name="id_member" class="form-control" required>
                            <option>Pilih Member</option>
                            @foreach ($mem as $a)
                            <option value="{{$a->id}}">{{$a->nama}}</option>                               
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" name="tgl" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Batas Waktu</label>
                        <input type="date" name="batas_waktu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Biaya Tambahan</label>
                        <input type="number" name="biaya_tambahan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" name="diskon" class="form-control">
                    </div><div class="form-group">
                        <label>Pajak</label>
                        <input type="number" name="pajak" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection