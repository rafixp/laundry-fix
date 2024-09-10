@extends('admin.navbar')

@section('content')
<div class="card w-75 mt-5 p-2 bg-white shadow mx-auto">
        <div class="card-body">
            <h3 class="mx-2">Data User</h3>
            <button type="button" class="btn btn-sm btn-primary mb-4 mx-2" data-toggle="modal" data-target="#tambahModal">
                Tambah User
            </button>
            
            <table class="table table-bordered" id="datatable">
                <thead>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($get as $a)
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>{{$a->name}}</td>
                            <td>{{$a->email}}</td>
                            <td>{{$a->role}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal" onclick="edit({{$a->id}})">
                                    <span class="fas fa-edit"></span>
                                </button>
                                <a href="/admin/user/hapus/{{$a->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/admin/user/tambah" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Outlet</label>
                        <select name="id_outlet" class="form-control">
                            <option value="">Pilih Outlet</option>
                            @foreach ($out as $b)
                                <option value="{{$b->id}}">{{$b->nama}}</option>
                            @endforeach
                        </select>
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
                        <label>Nama User</label>
                        <input type="text" name="name" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control">
                            <option>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label>Password (optional)</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Outlet</label>
                        <select name="id_outlet" class="form-control">
                            <option value="">Pilih Outlet</option>
                            @foreach ($out as $b)
                                <option value="{{$b->id}}">{{$b->nama}}</option>
                            @endforeach
                        </select>
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
            xhr.open('GET',`/admin/user/show/${id}`,false);
            xhr.send();
            var a = JSON.parse(xhr.responseText);
            document.getElementById('nama').value = a.name;
            document.getElementById('email').value = a.email;
            document.getElementById('edit').action = `/admin/user/edit/${id}`;
        }
    </script>
@endsection