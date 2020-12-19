@extends('main')
@section('title')
    Kehadiran - Tambah
@endsection
@section('content')
    <h2>Tambah Kehadiran</h2>
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
    <form action="{{route('kehadiran.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-grup">
            <label for="">User / Nama Lengkap</label>
            <select name="user_id" class="form-control" id="">
                @foreach ($user as $item)
                <option value="{{$item->id}}">{{$item->nama_lengkap}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-grup">
            <label for="">Waktu Kehadiran</label>
            <input type="datetime-local" name="waktu_kehadiran" class="form-control">
        </div>
        <button class="btn btn-success" type="sumbit">Sumbit</button>
    </form>
@endsection