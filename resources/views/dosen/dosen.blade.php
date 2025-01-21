<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin dosen') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="#" class="btn btn-outline-dark" onclick="ModalTambahDosen();">+ Tambah Data</a>
  
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">id_dosen</th>
                            <th scope="col">nama_dosen</th>
                            <th scope="col">pengajar</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($dosen as $get)
                          <tr>
                              <td>{{ $get->id_dosen }}</td>
                              <td>{{ $get->nama_dosen }}</td>
                              <td>{{ $get->pengajar }}</td>
                            
                              <td>
                                <a href="#" class="btn btn-outline-info me-2" onclick="ModalUpdateDosen('{{ $get->id_dosen }}', '{{ $get->nama_dosen }}', '{{ $get->pengajar }}');">Update</a>
                                <a href="#" class="btn btn-outline-danger" onclick="ModalDeleteDosen({{ $get->id_dosen }});">Delete</a>
                              </td>
                          </tr>  
                          @endforeach
                        </tbody>
                      </table>
  
  <form action="/dosen/tambah" method="post">
    @csrf
    <div class="modal fade" id="ModalTambahDosen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama_dosen" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pengajar</label>
                        <textarea name="pengajar" class="form-control" required></textarea>
                    </div>
        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </div>
    </div>
  </form>
  
  <form action="/dosen/update" method="post">
    @csrf
    <div class="modal fade" id="ModalUpdateDosen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_dosen">
                    <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <input type="text" class="form-control" name="nama_dosen" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pengajar</label>
                        <textarea name="pengajar" class="form-control" required></textarea>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
            </div>
        </div>
    </div>
  </form>
  
  <form action="/dosen/hapus" method="post">
    @csrf
    <div class="modal fade" id="ModalDeleteDosen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <input type="hidden" name="id_dosen">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Hapus">
                </div>
            </div>
        </div>
    </div>
  </form>
  
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
  
  <script>
  function ModalTambahDosen() {
    $('#ModalTambahDosen').modal('show');
  }
  
  function ModalUpdateDosen(id_dosen, nama_dosen, pengajar) {
    $('[name="id_dosen"]').val(id_dosen);
    $('[name="nama_dosen"]').val(nama_dosen);
    $('[name="pengajar"]').val(pengajar);
    $('#ModalUpdateDosen').modal('show');
  }
  
  function ModalDeleteDosen($id_dosen) {
    $('[name="id_dosen"]').val($id_dosen);
    console.log($id_dosen);
    $('#ModalDeleteDosen').modal('show');
  }
  
  
  </script>
  