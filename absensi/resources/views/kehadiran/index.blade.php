@extends('main')
@section('title')
    Kehadiran - List
@endsection
@section('content')
<a href="{{url('kehadiran/create')}} " class="btn btn-success mt-3 mb-3">Tambah Kehadiran</a>
    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            {{$msg}}
        </div>
    @endif
    @if ($msg = Session::get('error'))
        <div class="alert alert-danger">
            {{$msg}}
        </div>
    @endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">Waktu Kehadiran</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kehadiran as $item)
      <tr>
        <td>{{$item->user->nama_lengkap}}</td>
        <th scope="row">{{$item->waktu_kehadiran}}</th>
        <td>
            <a href="{{route('kehadiran.edit', $item->id)}} " class="btn btn-info btn-xs">Ubah</a>
            <form action="{{route('kehadiran.destroy', $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="sumbit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin menghapus data ini ?')">Delete</button>
            </form>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection