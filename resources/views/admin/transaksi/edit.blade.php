@extends('layouts.dashboard')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{route ('transaksi.update',$order->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control  @error('nama_pelanggan') is-invalid @enderror" autocomplete="off" placeholder="Masukkan nama_pelanggan" value="{{ $order->nama_pelanggan }}">
                            @error('nama_pelanggan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Berhasil">Berhasil</option>
                            <option value="Proses">Proses</option>
                        </select>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label" >Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection