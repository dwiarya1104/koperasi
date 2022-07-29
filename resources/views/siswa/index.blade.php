@extends('layouts.master')

@section('main')


<div class="container-fluid mt-5">
    <h2>Data Siswa</h2>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fas fa-add"></i>Tambah
                      </button>
                </div>
                <div class="col-3">
                    <form class="d-flex" action="{{url('siswa/search')}}" role="search" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </form>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <form action="{{url('siswa/sortir')}}" method="GET">
                        <div class="row mt-2">
                            <div class="col-1">
                                <select name="sortir" id="" class="form-select">
                                    <option value="ASC">ASC</option>
                                    <option value="DESC">DESC</option>
                                </select>
                            </div>
                            <div class="col-1">
                                <select name="filter" id="" class="form-select">
                                    <option value="nama">Nama</option>
                                    <option value="nis">NIS</option>
                                    <option value="kelas">Kelas</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" type="submit">Sortir</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-4">
                    <form action="{{url('siswa/filter')}}" method="GET">
                        <div class="row mt-2">
                            <div class="col-8 ms-5">
                                <select id="" class="form-select" name="filter_siswa">
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
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
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
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
                        <td>{{$d->nama }}</td>
                        <td>{{$d->nis }}</td>
                        <td>{{$d->kelas}} {{$d->jurusan}}</td>
                        <td><a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$d->id}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$d->id}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
      </div>
      @include('siswa.forms')
</div>
    
@endsection