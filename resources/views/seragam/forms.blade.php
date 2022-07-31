<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('/seragam/store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Seragam</label>
                            <select name="nama_barang" required class="form-select">
                                <option value="">-- Pilih Seragam --</option>
                                <option value="Pramuka">Pramuka</option>
                                <option value="Batik">Batik</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Olahraga">Olahraga</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Harga</label>
                            <input type="text" name="harga" required class="form-control"
                                placeholder="Masukkan Harga">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="">Ukuran</label>
                            <select name="ukuran" id="" required class="form-select">
                                <option value="">-- Pilih Ukuran --</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                <option value="XXXL">XXXL</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($data as $d)
    <div class="modal fade" id="edit{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/seragam/update/' . $d->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="">Seragam</label>
                                <input type="text" name="nama_barang" required class="form-control"
                                    placeholder="Masukkan Nama Seragam" value="{{ $d->nama_barang }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="">Harga</label>
                                <input type="text" name="harga" required class="form-control"
                                    placeholder="Masukkan Harga" value="{{ $d->harga }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="">Ukuran</label>
                                <select name="ukuran" id="" required class="form-select">
                                    <option value="">-- Pilih Ukuran --</option>
                                    <option value="S" {{ $d->ukuran == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ $d->ukuran == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ $d->ukuran == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ $d->ukuran == 'XL' ? 'selected' : '' }}>XL</option>
                                    <option value="XXL" {{ $d->ukuran == 'XXL' ? 'selected' : '' }}>XXL</option>
                                    <option value="XXXL" {{ $d->ukuran == 'XXXL' ? 'selected' : '' }}>XXXL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@foreach ($data as $d)
    <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/seragam/delete/' . $d->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        APAKAH KAMU YAKIN INGIN MENGHAPUS INI?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach




<div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Seragam</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                @csrf
                <input type="hidden" name="sortBy" value="{{ $seragam->sortBy }}">
                <input type="hidden" name="sortType" value="{{ $seragam->sortType }}">
                <input type="hidden" name="search" value="{{ $seragam->search }}">
                <div class="modal-body">
                    <select class="form-select" name="ukuran">
                        <option value="All" selected>All</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>

                    <select class="form-select" name="nama_barang">
                        <option value="All" selected>All</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Batik">Batik</option>
                        <option value="Pramuka">Pramuka</option>
                        <option value="Muslim">Muslim</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" formaction="{{ url('/seragam') }}">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
