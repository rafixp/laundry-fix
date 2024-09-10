@extends('admin.navbar')

@section('content')
    <div class="card w-75 mt-5 p-2 bg-white shadow mx-auto">
        <div class="card-body">
            <h3 class="mx-2">Data Paket</h3>
            <button type="button" class="btn btn-sm btn-primary mb-4 mx-2" data-toggle="modal" data-target="#tambahModal">
                Tambah Paket
            </button>
            
            <table class="table table-bordered" id="datatable">
                <thead>
                    <th>No.</th>
                    <th>Nama Paket</th>
                    <th>Outlet</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($get as $a)
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>{{$a->nama_paket}}</td>
                            <td>{{$a->outlet->nama}}</td>
                            <td>{{$a->jenis}}</td>
                            <td>{{$a->harga}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" onclick="edit({{$a->id}})">
                                    <span class="fas fa-edit"></span>
                                </button>
                                <a href="/admin/paket/hapus/{{$a->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">
                                    <span class="fas fa-trash"></span>
                                </a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/admin/paket/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Outlet</label>
                        <select name="id_outlet" class="form-control">
                            <option>Pilih Outlet</option>
                            @foreach ($outlet as $a)
                                <option value="{{$a->id}}">{{$a->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Cucian</label>
                        <select name="jenis" class="form-control">
                            <option>Pilih Jenis Cucian</option>
                            <option value="kiloan">Kiloan</option>
                            <option value="bed cover">Bed Cover</option>
                            <option value="selimut">Selimut</option>
                            <option value="kaos">Kaos</option>
                            <option value="lain">Lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form method="post" id="edit">
                    @csrf
                    <div class="form-group">
                        <label>Outlet</label>
                        <select name="id_outlet" class="form-control">
                            <option>Pilih Outlet</option>
                            @foreach ($outlet as $a)
                                <option value="{{$a->id}}">{{$a->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" id="nama" value="">
                    </div>
                    <div class="form-group">
                        <label>Jenis Cucian</label>
                        <select name="jenis" class="form-control">
                            <option>Pilih Jenis Cucian</option>
                            <option value="kiloan">Kiloan</option>
                            <option value="bed cover">Bed Cover</option>
                            <option value="selimut">Selimut</option>
                            <option value="kaos">Kaos</option>
                            <option value="lain">Lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" value="" id="harga">
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
    <script>
        function edit(id){
            const xhr = new XMLHttpRequest();
            xhr.open('GET',`/admin/paket/show/${id}`,false);
            xhr.send();
            var a = JSON.parse(xhr.responseText);
            document.getElementById('nama').value = a.nama_paket;
            document.getElementById('harga').value = a.harga;
            document.getElementById('edit').action = `/admin/paket/edit/${id}`;
        }
    </script>
@endsection