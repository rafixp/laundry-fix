@extends('admin.navbar')

@section('content')
    <div class="card w-75 mt-5 p-2 bg-white shadow mx-auto">
        <div class="card-body">
            <h3 class="mx-2">Data Member</h3>
            <button type="button" class="btn btn-sm btn-primary mb-4 mx-2" data-toggle="modal" data-target="#tambahModal">
                Tambah Member
            </button>
            
            <table class="table table-bordered" id="datatable">
                <thead>
                    <th>No.</th>
                    <th>Nama Member</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($get as $a)
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>{{$a->nama}}</td>
                            <td>{{$a->alamat}}</td>
                            <td>{{$a->tlp}}</td>
                            <td>{{$a->jenis_kelamin}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" onclick="edit({{$a->id}})">
                                    <span class="fas fa-edit"></span>
                                </button>
                                <a href="/admin/member/hapus/{{$a->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Outlet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/admin/member/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama Member</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="tlp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" cols="30" rows="5" class="form-control"></textarea>
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
                        <label>Nama Member</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="tlp" class="form-control" id="tlp">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" cols="30" rows="5" class="form-control" id="alamat"></textarea>
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
            xhr.open('GET',`/admin/member/show/${id}`,false);
            xhr.send();
            var a = JSON.parse(xhr.responseText);
            document.getElementById('nama').value = a.nama;
            document.getElementById('tlp').value = a.tlp;
            document.getElementById('alamat').value = a.alamat;
            document.getElementById('edit').action = `/admin/member/edit/${id}`;
        }
    </script>
@endsection