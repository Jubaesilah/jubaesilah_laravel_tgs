<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin mahasiswa') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <a href="#" class="btn btn-success" onclick="ModalTambahMahasiswa();">+ Tambah Data</a>

                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">id_mahasiswa</th>
                          <th scope="col">nama_mahasiswa</th>
                          <th scope="col">prodi</th>
                          <th scope="col">kelas</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($mahasiswa as $get)
                        <tr>
                            <td>{{ $get->id_mahasiswa }}</td>
                            <td>{{ $get->nama_mahasiswa }}</td>
                            <td>{{ $get->prodi }}</td>
                            <td>{{ $get->kelas }}</td>
                            <td>
                              <a href="#" class="btn btn-outline-info me-2" onclick="ModalUpdateMahasiswa('{{ $get->id_mahasiswa }}', '{{ $get->nama_mahasiswa }}', '{{ $get->prodi }}', '{{ $get->kelas }}');">Update</a>
                              <a href="#" class="btn btn-outline-danger" onclick="ModalDeleteMahasiswa({{ $get->id_mahasiswa }});">Delete</a>
                            </td>
                        </tr>  
                        @endforeach
                      </tbody>
                    </table>

<form action="/mahasiswa/tambah" method="post">
  @csrf
  <div class="modal fade" id="ModalTambahMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Form Tambah</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                      <label class="form-label">Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="nama_mahasiswa" required>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Prodi</label>
                      <textarea name="prodi" class="form-control" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Kelas</label>
                      <textarea name="kelas" class="form-control" required></textarea>
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

<form action="/mahasiswa/update" method="post">
  @csrf
  <div class="modal fade" id="ModalUpdateMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Form Update</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="id_mahasiswa">
                  <div class="mb-3">
                      <label class="form-label">Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="nama_mahasiswa" required>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Prodi</label>
                      <textarea name="prodi" class="form-control" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Kelas</label>
                      <textarea name="kelas" class="form-control" required></textarea>
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

<form action="/mahasiswa/hapus" method="post">
  @csrf
  <div class="modal fade" id="ModalDeleteMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Form Hapus</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
              <div class="modal-footer">
                  <input type="hidden" name="id_mahasiswa">
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
function ModalTambahMahasiswa() {
  $('#ModalTambahMahasiswa').modal('show');
}

function ModalUpdateMahasiswa(id_mahasiswa, nama_mahasiswa, prodi, kelas) {
  $('[name="id_mahasiswa"]').val(id_mahasiswa);
  $('[name="nama_mahasiswa"]').val(nama_mahasiswa);
  $('[name="prodi"]').val(prodi);
  $('[name="kelas"]').val(kelas);
  $('#ModalUpdateMahasiswa').modal('show');
}

function ModalDeleteMahasiswa($id_mahasiswa) {
  $('[name="id_mahasiswa"]').val($id_mahasiswa);
  console.log($id_mahasiswa);
  $('#ModalDeleteMahasiswa').modal('show');
}


</script>
