@extends('layout.template')
@section('title', 'Add Korean Drama')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-gray">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data KDrama</h3>
            </div>
                <form action="{{url('update-kdrama/'.$kdrama->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="box-body">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i>{{ session('status') }}</h4>
                        </div>
                        @endif
                        <div class="form-group mb-3">
                            <label for="">Judul</label>
                            <input type="text" name="judul" value="{{$kdrama->judul}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Pengarang</label>
                            <input type="text" name="pengarang" value="{{$kdrama->pengarang}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Penerbit</label>
                            <input type="text" name="penerbit" value="{{$kdrama->penerbit}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            <img src="{{ asset('uploads/kdramas/'.$kdrama->gambar) }}" width="160px" height="200px" alt="Image">
                        </div>
                    </div>
              <div class="box-footer">
              <a href="{{ url('kdramas') }}" class="btn btn-primary tbn-sm float-end">Kembali</a>
              <button type="submit" class="btn bg-purple margin">Update</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection