@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between d-flex justify-content-between align-items-center">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Admin Dashboard</h3>
            </div>
            <div class="nk-block-head-content">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><em class="ni ni-plus"></em>Tambah Jenis Tanaman</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"><em class="ni ni-plus"></em> Tambah Jenis Tanaman Baru</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('dashboard_tanaman_create') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label" for="full-name">Nama Jenis Tanaman</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="full-name" name="namaTanaman">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
    <div class="card card-bordered card-preview p-3">
        <table class="table datatable-init">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Nama Tanaman</th>
                    <th >Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tanaman as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->namaTanaman }}</td>
                    <td>
                        <form action="{{  route('dashboard_tanaman_destroy', $data->id)}}" class="d-inline" method="POST" onsubmit="return confirm('Apakah ingin menghapus data ?')">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit"><em class="ni ni-trash"></em> Hapus</button>
                        </form>
                        <a class='btn btn-warning btn-sm' type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}"><em class="ni ni-edit"></em> Edit</a>
                    </td>
                </tr>
                <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"><em class="ni ni-edit"></em> Edit Tanaman</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('dashboard_tanaman_update', $data->id) }}">
                              @csrf
                              @method('PUT')
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Nama Jenis Tanaman</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="full-name" name="namaTanaman" value="{{ $data->namaTanaman }}">
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
