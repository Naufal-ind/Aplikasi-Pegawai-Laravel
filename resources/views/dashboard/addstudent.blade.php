@extends('dashboard.index')
@section('judulhalaman')
Create Data
@endsection
@section('content')
<div class="row justify-content-center">
<div class="col-9">
<form action="{{ route('student.store') }}" method="POST" enctype="multipart/from-data">
    @csrf
<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" placeholder="Ketikkan Nama" required>
</div>

<div class="mb-3">
    <label for="#exampleFormControlTextarea1" class="form-label">Alamat</label>
    <textarea class="form-control" name="alamat" id="#exampleFormControlTextarea1"></textarea>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
</div>

<div class="mb-3">
    <label class="form-label">Tempat Lahir</label>
    <input type="text" name="tempatlahir" class="form-control" placeholder="Tempat Lahir">
</div>

<div class="mb-3">
    <label class="form-label">Tanggal Lahir</label>
    <input type="date" name="tanggallahir" class="form-control" >
</div>

<div class="mb-3">
    <label class="form-label">Nisn</label>
    <input type="text" name="nisn" class="form-control" placeholder="ex R.433..">
</div>

<button type="submit" class="btn btn-primary mb-5" data-bs-dismiss="modal">Save</button>

</form>
</div>
</div>
@endsection