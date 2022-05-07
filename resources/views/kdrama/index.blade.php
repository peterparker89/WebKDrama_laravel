@extends('layout.template')
@section('title', 'Data Korean Drama')

@section('content')

<div class="box">
            <div class="box-header">
                <a href="{{ url('add-kdrama') }}" class="btn bg-purple margin">Add Kdrama</a>
                <a href="{{ url('kdramas') }}" class="btn bg-purple margin">Refresh</a>
                <div class="box-tools">
                <form action="{{ url('kdramas') }}" method="GET">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="search" name="search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div> 
                </form> 
                </div>
            </div>
            <div class="box-body">
              @if (session('status'))
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('status') }}</h4>
                  </div>
                @endif
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul</th>
                  <th>Pengarang</th>
                  <th>Penerbit</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($kdrama as $item)
                  <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>
                      <img src="{{ asset('uploads/kdramas/'.$item->gambar) }}" width="140px" height="180px" alt="Image">
                    </td>
                    <td><a href="{{ url('edit-kdrama/'.$item->id) }}" class="btn bg-purple margin btn-sm">Edit</a>
                    <a href="{{ url('delete-kdrama/'.$item->id) }}" class="btn bg-red margin btn-sm">Delete</a>
                  </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection