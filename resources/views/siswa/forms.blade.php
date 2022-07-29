
<!-- Modal Add -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action={{url('siswa/store')}} method="post">
        @csrf
        <div class="modal-body">
            <div class="row mb-3">
                <div class="col">
                    <label for="">Nama</label>
                    <input type="text" name="nama" required class="form-control" placeholder="Masukkan Nama Anda">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="">NIS</label>
                    <input type="text" class="form-control" placeholder="Masukkan NIS Anda" name="nis" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="">Kelas</label>
                    <select  id="" class="form-select" name="kelas" required> 
                        <option value="">-- Pilih Kelas --</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="">Jurusan</label>
                    <select id="" class="form-select" name="jurusan" required> 
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="RPL">RPL</option>
                        <option value="BDP1">BDP1</option>
                        <option value="BDP2">BDP2</option>
                        <option value="OTKP1">OTKP1</option>
                        <option value="OTKP2">OTKP2</option>
                        <option value="AKL1">AKL1</option>
                        <option value="AKL2">AKL2</option>
                        
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



<!-- Modal Update -->
@foreach ($data as $d)
<div class="modal fade" id="edit{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action={{url('siswa/update/' . $d->id)}} method="post">
            @csrf
            @method('put')
            <div class="modal-body">
              <div class="row mb-3">
                  <div class="col">
                      <label for="">Nama</label>
                      <input type="text" name="nama" required class="form-control" placeholder="Masukkan Nama Anda" value="{{$d->nama}}">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <label for="">NIS</label>
                        <input type="text" class="form-control" placeholder="Masukkan NIS Anda" name="nis" required value="{{$d->nis}}">
                    </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col">
                      <label for="">Kelas</label>
                      <select  id="" class="form-select" name="kelas" required> 
                          <option value="">-- Pilih Kelas --</option>
                          <option value="10"  {{$d->kelas == 10 ? 'selected' : ''}}>10</option>
                          <option value="11" {{$d->kelas == 11 ? 'selected' : ''}}>11</option>
                          <option value="12" {{$d->kelas == 12 ? 'selected' : ''}}>12</option>
                        </select>
                  </div>
                </div>
                
              <div class="row mb-3">
                  <div class="col">
                      <label for="">Jurusan</label>
                      <select id="" class="form-select" name="jurusan" required> 
                          <option value="">-- Pilih Jurusan --</option>
                          <option value="RPL" {{$d->jurusan == "RPL" ? 'selected' : ''}}>RPL</option>
                          <option value="BDP1" {{$d->jurusan == "BDP1" ? 'selected' : ''}}>BDP1</option>
                          <option value="BDP2" {{$d->jurusan == "BDP2" ? 'selected' : ''}}>BDP2</option>
                          <option value="OTKP1" {{$d->jurusan == "OTKP1" ? 'selected' : ''}}>OTKP1</option>
                          <option value="OTKP2" {{$d->jurusan == "OTKP2" ? 'selected' : ''}}>OTKP2</option>
                          <option value="AKL1" {{$d->jurusan == "AKL1" ? 'selected' : ''}}>AKL1</option>
                          <option value="AKL2" {{$d->jurusan == "AKL2" ? 'selected' : ''}}>AKL2</option>
                          
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
    
<div class="modal fade" id="delete{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/siswa/delete/' . $d->id)}}" method="post">
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