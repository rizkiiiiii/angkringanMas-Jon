@extends('layouts.dashboard')
@section( 'content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header justify-content-between">
                <a href="/" class="btn btn-sm btn-primary">
                    Buat Laporan
                </a>
            </div>
                <div class="card-header">
                    
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Pelanggan</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_transaksi as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$order->nama_pelanggan}}</td> 
                                <td>{{$order->status}}</td>
                                <td>{{$order->total}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection