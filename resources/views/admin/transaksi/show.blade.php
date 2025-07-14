@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <span class="d-block rounded bg-secondary" style="height: 2px;"></span>
                    <table class="table table-borderless">
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>:</td>
                            <td class="text-dark">{{$order->nama_pelanggan}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td class="text-dark">{{$order->status}}</td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td class="text-dark">{{$order->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td>:</td>
                            <td class="text-dark">{{$order->total}}</td>
                        </tr>
                    </table>
                    <br>
                    <hr>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Nama Menu</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_item as $detail)
                                <tr>
                                    <td>{{$detail->menu->nama_menu}}</td>
                                    <td>{{$detail->jumlah}}</td>
                                    <td>{{$detail->menu->harga}}</td>
                                    <td>{{$detail->subtotal}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('transaksi.index') }}" class="btn btn-warning mr-3" type="submit">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection 