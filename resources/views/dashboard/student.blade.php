@extends('dashboard.index')
@section('judulhalaman')
Data Siswa
@endsection
@section('content')
<form action="" method="GET" role="search">
<div class="input-group mb-3">
<input type="text" name="search" class="form-control" placeholder="Ketikkan Pencarian">
<button class="btn btn-info" type="submit" id="button-addon2">Search</button>
</div>
</form>

<a href="{{ route('student.create')}}" class="btn btn-primary mb-4" data-bs-target="#exampleModal"> + Add Student </a>
<table class="table table-striped">
<tr>
  <thead>
    <th>NO</th>
    <th>NAMA</th>
    <th>ALAMAT</th>
    <th>EMAIL</th>
    <th>TEMPAT LAHIR</th>
    <th>TANGGAL LAHIR</th>
    <th>NISN</th>
    <th class="text-center">AKSI</th>
</thead>
</tr>
<tr>
  <tbody>
    @forelse($student as $p)
    <td>{{ $loop->iteration }}</td>
    <td>{{ $p->nama }}</td>
    <td>{{ $p->alamat }}</td>
    <td>{{ $p->email }}</td>
    <td>{{ $p->tempatlahir }}</td>
    <td>{{ $p->tanggallahir }}</td>
    <td>{{ $p->nisn->nisn }}</td>
    <td class="text-center">
<a href="{{ route('student.edit', $p->id)}}" class="btn btn-sm btn-primary">EDIT</a>
<form onsubmit="return confirm('Apakah Anda Yakin?!');" method="POST" action="{{ route('student.destroy', $p->id) }}">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger" type="submit">HAPUS</button>
</form>
</td>
</tr>
@empty
<div class="alert alert-danger" role="alert">
  Data Belum tersedia
</div>
</tbody>
@endforelse
</table>


{{ $student->links() }}
@endsection