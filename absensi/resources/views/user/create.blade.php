@extends('main')
@section('title')
    User - Tambah
@endsection
@section('content')
    <h2>Tambah User</h2>

    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            {{($msg)}}
        </div>
    @endif
    @if ($msg = Session::get('error'))
        <div class="alert alert-danger">
            {{($msg)}}
        </div>
    @endif

    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-grup">
            <label for="">NIM</label>
            <input type="number" name="nim" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Card Id</label>
            <input type="number" name="card_id" id="card_id" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">No Telphone</label>
            <input type="number" name="telp" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" id="">
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-grup">
            <label for="">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>
        <div class="form-grup">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <button class="btn btn-success" type="sumbit">Sumbit</button>
    </form>
@endsection
@section('js')
    <script>
        setInterval(function ()
        {
            $.get("http://absensi.test/api/tmprfid.get", function(data){
                $("#card_id").val(data.card_id);
            });
        }, 1000);
        </script>
@endsection