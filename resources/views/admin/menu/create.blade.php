@extends('layouts.dashboard')
@section( 'content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form action="{{ route('menu.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            
                            <label for="nama_menu" class="form-label">Nama menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" class="form-control  @error('nama_menu') is-invalid @enderror" autocomplete="off" placeholder="Masukkan nama menu..." value="{{ old('nama_menu') }}">
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
                        <div class="d-flex justify-content-end px-2">
                            <a href="{{ route('menu.index') }}" class="btn btn-danger mr-3" type="submit">Batal</a>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection