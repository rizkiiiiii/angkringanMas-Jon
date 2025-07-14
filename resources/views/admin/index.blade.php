@extends('layouts.dashboard')
@section( 'content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="row">
                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">jumlah_menu</h5>
                                        <p class="card-text">jumlah_menu = {{$jumlah_menu}}</p>
                                        <a href="{{ route('menu.index') }}" class="btn btn-primary">Menu</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Transaksi Proses</h5>
                                        <p class="card-text">Jumlah Transaksi Proses = {{$transaksi_proses}}</p>
                                        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Menu</a>
                                    </div>
                                </div>
                            </div>                        
                            <div class="row">
                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah transaksi berhasil</h5>
                                        <p class="card-text">Jumlah transaksi berhasil = {{$transaksi_berhasil}}</p>
                                        <a href="{{ route('transaksi.index') }}" class="btn btn-primary">Menu</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img src="" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Keseluruhan</h5>
                                        <p class="card-text">Total Keseluruhan = {{$total_keseluruhan}}</p>
                                        <a href="{{ route('pembayaran.index') }}" class="btn btn-primary">Pembayaran</a>
                                    </div>
                                </div>
                            </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection