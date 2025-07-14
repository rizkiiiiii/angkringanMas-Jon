@extends('layouts.dashboard')
@section( 'content')
    <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-header justify-content-between">
                <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary">
                    Tambah Data
                </a>
            </div>
            <div class="card-header">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Menu</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_menu as $key => $menu)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$menu->nama_menu}}</td> 
                                <td>{{$menu->deskripsi}}</td> 
                                <td>{{$menu->harga}}</td>
                                <td>{{$menu->kategori}}</td>
                                <td>
                                    <a href="{{ route('menu.edit', $menu->id) }}"
                                        class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                    <a href="{{ route('menu.show', $menu->id) }}"
                                        class="btn btn-sm btn-warning mx-1">
                                        Show
                                    </a>
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection