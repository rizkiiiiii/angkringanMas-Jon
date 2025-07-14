@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">

                </div>
                <span class="d-block rounded bg-secondary" style="height: 2px;"></span>
                <table class="table table-borderless">
                    <tr>
                        <td>Nama Menu</td>
                        <td>:</td>
                        <td class="text-dark">{{$list_menu->nama_menu}}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td class="text-dark">{{$list_menu->deskripsi}}</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td class="text-dark">{{$list_menu->harga}}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td class="text-dark">{{$list_menu->kategori}}</td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('menu.index') }}" class="btn btn-warning mr-3" type="submit">Kembali</a></td>
                    </tr>
                </table>
                <br>
                

            </div>
        </div>
    </div>


@endsection