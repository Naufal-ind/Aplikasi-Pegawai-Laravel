@extends('dashboard.index')
@section('judulhalaman')
Edit Data
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-9">
        <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="mb-4">
    <label class="form-label">NAMA</label>
    <input type="text" name="nama" class="form-control" value="{{ $student->nama }}">
</div>

<div class="mb-4">
    <label for="#exampleFormControlTextarea1" class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" id="#exampleFormControlTextarea1">{{ $student->alamat }}</textarea>
</div>
<div class="mb-4">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
</div>

<div class="mb-4">
    <label class="form-label">Tempat Lahir</label>
    <input type="text" name="tempatlahir" class="form-control" value="{{ $student->tempatlahir }}">
</div>

<div class="mb-4">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" name="tanggallahir" class="form-control" value="{{ $student->tanggallahir }}">
</div>

<div class="mb-4">
    <label class="form-label">NISN</label>
    <input type="text" name="nisn" class="form-control" value="{{ $student->nisn->nisn  }}">
</div>

<button type="submit" class="btn btn-primary mb-5" data-bs-dismiss="modal">Update</button>
</form>
    </div>
</div>
@endsection