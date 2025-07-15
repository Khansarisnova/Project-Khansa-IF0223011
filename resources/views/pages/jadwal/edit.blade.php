@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1><i class="fas fa-calendar-edit"></i> Edit Jadwal</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Edit Jadwal</li>
        </ol>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ada masalah dengan inputmu:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/jadwal/{{ $jadwal->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card card-warning">
                <div class="card-body">
                    <div class="row">
                        <!-- NO -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no">NO</label>
                                <input type="number" name="no" id="no" class="form-control" required value="{{ old('no', $jadwal->no) }}">
                            </div>
                        </div>
                        <!-- Tanggal -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required value="{{ old('tanggal', $jadwal->tanggal) }}">
                            </div>
                        </div>
                        <!-- Hari -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select name="hari" id="hari" class="form-control" required>
                                    <option value="">-- Pilih Hari --</option>
                                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                                        <option value="{{ $hari }}" {{ old('hari', $jadwal->hari) == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Jam -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam">Jam</label>
                                <input type="time" name="jam" id="jam" class="form-control" required value="{{ old('jam', $jadwal->jam) }}">
                            </div>
                        </div>
                        <!-- Ruangan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ruangan">Ruangan</label>
                                <select name="ruangan" id="ruangan" class="form-control" required>
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach(['L1.R1','L1.R2','L1.R3','L1.R4','L1.R5','L2.R1','L2.R2','L2.R3'] as $ruangan)
                                        <option value="{{ $ruangan }}" {{ old('ruangan', $jadwal->ruangan) == $ruangan ? 'selected' : '' }}>{{ $ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Mata Kuliah -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mata_kuliah">Mata Kuliah</label>
                                <select name="mata_kuliah" id="mata_kuliah" class="form-control" required>
                                    <option value="">-- Pilih Mata Kuliah --</option>
                                    @foreach([
                                        'Interaksi manusia dan komputer',
                                        'islam dan ilmu pengetahuan',
                                        'kewarganegaraan',
                                        'pengenalan pola',
                                        'teknologi basis data',
                                        'praktikum teknologi basis data',
                                        'metode penulisan karya ilmiyah',
                                        'pemograman web',
                                        'praktikum pemograman web',
                                        'cloud computing',
                                        'information retrival'
                                    ] as $mk)
                                        <option value="{{ $mk }}" {{ old('mata_kuliah', $jadwal->mata_kuliah) == $mk ? 'selected' : '' }}>{{ $mk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Clear -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_ujian">Sudah/Belum</label>
                                <select name="status_ujian" id="status_ujian" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="Sudah" {{ old('status_ujian', $jadwal->status_ujian) == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                    <option value="Belum" {{ old('status_ujian', $jadwal->status_ujian) == 'Belum' ? 'selected' : '' }}>Belum</option>
                                </select>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <!-- Footer Button -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
                    <a href="/jadwal" class="btn btn-secondary"><i class="fas fa-undo"></i> Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
