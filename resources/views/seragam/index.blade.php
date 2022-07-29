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
                </div>
                <div class="col-3">
                    <form class="d-flex" action="{{url('seragam/search')}}" role="search" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </form>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <form action="{{url('seragam/sortir')}}" method="GET">
                        <div class="row mt-2">
                            <div class="col-1">
                                <select name="sortir" id="" class="form-select">
                                    <option value="ASC">ASC</option>
                                    <option value="DESC">DESC</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <select name="filter" id="" class="form-select">
                                    <option value="nama_barang">Seragam</option>
                                    <option value="harga">Harga</option>
                                    <option value="ukuran">Ukuran</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" type="submit">Sortir</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-4">
                    <form action="{{url('seragam/filter')}}" method="GET">
                        <div class="row mt-2">
                            <div class="col-8 ms-5">
                                <select name="filter_seragam" id="" class="form-select">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <option value="XXXL">XXXL</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <table class="table table-striped m">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Ukuran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() == 0 )
                    <td colspan="5" class="table-active text-center">Tidak ada Data</td>
                    @else
                    @foreach ($data as $d)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$d->nama_barang }}</td>
                        <td>{{$d->harga }}</td>
                        <td>{{$d->ukuran }}</td>
                        <td><a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$d->id}}"><i class="fas fa-edit"></i></a>
                        <a  class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#delete{{$d->id}}"><i class="fas fa-trash"></i></a>
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