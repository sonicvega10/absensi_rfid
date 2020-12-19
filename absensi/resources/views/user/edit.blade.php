@extends('main')
@section('title')
    User - Ubah
@endsection
@section('content')
    <h2>Ubah User</h2>
    <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-grup">
            <label for="">NIM</label>
            <input type="number" value="{{$user->nim}}" name="nim" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Nama Lengkap</label>
            <input type="text" value="{{$user->nama_lengkap}}" name="nama_lengkap" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Email</label>
            <input type="email" value="{{$user->email}}" name="email" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">No Telphone</label>
            <input type="number" value="{{$user->telp}}" name="telp" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="">
                <option value="L" {{($user->jenis_kelamin == 'L') ? 'selected' : null}}>Laki-laki </option>
                <option value="P" {{($user->jenis_kelamin == 'P') ? 'selected' : null}}>Perempuan </option>
            </select>
        </div>
        <div class="form-grup">
            <label for="">Tempat Lahir</label>
            <input type="text" value="{{$user->tempat_lahir}}" name="tempat_lahir" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Tanggal Lahir</label>
            <input type="date" value="{{$user->tanggal_lahir}}" name="tanggal_lahir" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button class="btn btn-success" type="sumbit">Sumbit</button>
    </form>
@endsection