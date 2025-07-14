@extends('layouts.dashboard')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <form action="{{route ('menu.update',$list_menu->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_menu" class="form-label">Nama Menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" class="form-control  @error('nama_menu') is-invalid @enderror" autocomplete="off" placeholder="Masukkan nama_menu" value="{{ old('nama_menu') }}">
                            @error('nama_menu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror" autocomplete="off" placeholder="Masukkan deskripsi" value="{{ old('deskripsi') }}">
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control  @error('harga') is-invalid @enderror" autocomplete="off" placeholder="Masukkan harga" value="{{ old('harga') }}">
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control"  @error('kategori')
                            is-invalid @enderror>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection