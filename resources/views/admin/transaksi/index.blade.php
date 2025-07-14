@extends('layouts.dashboard')
@section( 'content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header justify-content-between">
                <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary">
                    Tambah Data
                </a>
            </div>
                <div class="card-header">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Pelanggan</th>
                                <th>Status</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_transaksi as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$order->nama_pelanggan}}</td> 
                                <td>{{$order->status}}</td>
                                <td>{{$order->deskripsi}}</td> 
                                <td>
                                    <a href="{{ route('transaksi.edit', $order->id) }}"
                                        class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                    <a href="{{ route('transaksi.show', $order->id) }}"
                                        class="btn btn-sm btn-warning mx-1">
                                        Show
                                    </a>
                                    <form action="{{ route('transaksi.destroy', $order->id) }}" method="post" class="d-inline">
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