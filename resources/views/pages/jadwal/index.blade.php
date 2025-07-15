@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>JADWAL UAS</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active">Jadwal</li>
      </ol>
    </div>
  </div>

@endsection


@section('content')
     <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-header d-flex justify-content-end">
                 <a href="/jadwal/create" class="btn btn-outline-primary">
                     Tambah
                </a>
              </div>
               <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Ruangan</th>
                        <th>Mata Kuliah</th>
                        <th>Sudah/Belum</th>
                        <th>AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($jadwal as $index => $item)
                      <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->hari }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->ruangan }}</td>
                        <td>{{ $item->mata_kuliah }}</td>
                        <td>{{ $item->status_ujian }}</td>
                        <td class="d-flex gap-1">
                          <a href="/jadwal/edit/{{ $item->id }}" class="btn btn-outline-primary btn-sm mr-1">
                              <i class="fas fa-edit"></i> Edit
                          </a>
                      
                          <form action="/jadwal/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger btn-sm">
                                  <i class="fas fa-trash-alt"></i> Hapus
                              </button>
                          </form>
                      </td>                      
                      </tr>
                      @endforeach
                    </tbody>                          
                  </table>
               </div>
            </div>
        </div>
     </div>
@endsection