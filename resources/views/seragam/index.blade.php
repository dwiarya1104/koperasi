@extends('layouts.master')

@section('main')


    <div class="container-fluid mt-5">
        <h2>Data Seragam</h2>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="fas fa-add"></i>Tambah
                        </button>
                        <button type="button" class="btn btn-warning float-right" data-bs-toggle="modal"
                            data-bs-target="#filter">
                            <i class="fas fa-add"></i>Filter
                        </button>
                    </div>
                    <div class="col-3">
                        <form class="d-flex" action="{{ url('/seragam') }}" role="search" method="POST">
                            @csrf
                            <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                            <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                            <input type="hidden" name="sortBy" value="{{ $seragam->sortBy }}">
                            <input type="hidden" name="sortType" value="{{ $seragam->sortType }}">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                name="search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>


                <table class="table table-striped m">
                    <thead>
                        <tr>
                            <th>
                                <span>
                                    No
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="created_at">
                                        <input type="hidden" name="sortType" value="asc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-down"></i></button>
                                    </form>
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="created_at">
                                        <input type="hidden" name="sortType" value="desc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-up"></i></button>
                                    </form>
                                </span>
                            </th>
                            <th>
                                <span>
                                    Nama Barang
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="nama_barang">
                                        <input type="hidden" name="sortType" value="asc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-down"></i></button>
                                    </form>
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="nama_barang">
                                        <input type="hidden" name="sortType" value="desc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-up"></i></button>
                                    </form>
                                </span>
                            </th>
                            <th>
                                <span>
                                    Harga
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="harga">
                                        <input type="hidden" name="sortType" value="asc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-down"></i></button>
                                    </form>
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="harga">
                                        <input type="hidden" name="sortType" value="desc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-up"></i></button>
                                    </form>
                                </span>
                            </th>
                            <th>
                                <span>
                                    Ukuran
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="ukuran">
                                        <input type="hidden" name="sortType" value="asc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-down"></i></button>
                                    </form>
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="ukuran">
                                        <input type="hidden" name="sortType" value="desc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-up"></i></button>
                                    </form>
                                </span>
                            </th>
                            <th>
                                <span>
                                    Aksi
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="created_at">
                                        <input type="hidden" name="sortType" value="asc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-down"></i></button>
                                    </form>
                                    <form method="POST">
                                        @csrf
                                        <input type="hidden" name="ukuran" value="{{ $seragam->ukuran }}">
                                        <input type="hidden" name="nama_barang" value="{{ $seragam->nama_barang }}">
                                        <input type="hidden" name="sortBy" value="created_at">
                                        <input type="hidden" name="sortType" value="desc">
                                        <input type="hidden" name="search" value="{{ $seragam->search }}">
                                        <button formaction="{{ url('/seragam') }}" class="text-dark"><i
                                                class="fa-solid fa-arrow-up"></i></button>
                                    </form>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->count() == 0)
                            <td colspan="5" class="table-active text-center">Tidak ada Data</td>
                        @else
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->nama_barang }}</td>
                                    <td>{{ $d->harga }}</td>
                                    <td>{{ $d->ukuran }}</td>
                                    <td><a class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $d->id }}"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $d->id }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @include('seragam.forms')
    </div>

@endsection
