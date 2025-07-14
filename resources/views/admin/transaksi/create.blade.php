@extends('layouts.dashboard')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <!-- Optional: Add header content here -->
                    @if ($errors->count())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama pelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
                        </div>
                        <div id="menu-list">
                            <div class="mb-3 row menu-item">
                                <div class="col-6">
                                    <label for="menu_id" class="form-label">Menu</label>
                                    <select name="menu_id[]" class="form-control" id="menu_id">
                                        @foreach($list_menu as $m)
                                            <option value="{{ $m->id }}">{{ $m->nama_menu }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah[]" class="form-control @error('jumlah') is-invalid @enderror" autocomplete="off" placeholder="Jumlah" value="{{ old('jumlah.0') }}">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" id="add-menu">Tambah menu</button>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="Berhasil">Berhasil</option>
                                <option value="Proses">Proses</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                        </div>
                        <div class="d-flex justify-content-end px-2">
                            <a href="{{ route('transaksi.index') }}" class="btn btn-danger mr-3" type="submit">Batal</a>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('personalscript')
<script>
    document.getElementById('add-menu').addEventListener('click', function() {
            console.log('test')

        const menuList = document.getElementById('menu-list');
        const menuItemCount = menuList.getElementsByClassName('menu-item').length;
        const newMenuItem = document.createElement('div');
        newMenuItem.className = 'mb-3 row menu-item';
        newMenuItem.innerHTML = `
            <div class="col-6">
                <label for="menu_id_${menuItemCount}" class="form-label">Menu</label>
                <select name="menu_id[]" class="form-control" id="menu_id_${menuItemCount}">
                    @foreach($list_menu as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="jumlah_${menuItemCount}" class="form-label">Jumlah</label>
                <input type="number" name="jumlah[]" id="jumlah_${menuItemCount}" class="form-control @error('jumlah') is-invalid @enderror" autocomplete="off" placeholder="Jumlah" >
            </div>
        `;
        menuList.appendChild(newMenuItem);
    });
</script>
@endsection
