<!-- Update -->
<div class="modal fade" id="modal-update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frm_updt" method="post" action="{{route('update')}}">
      @csrf
      @method('PUT')
        <div class="row mb-3">
            <label for="#" class="col-sm-3 col-form-label">Judul Buku</label>
            <div class="col-sm-9">
                <input type="hidden" class="form-control" name="id" id="id">
                <input type="text" class="form-control" name="judul_buku_updt" id="judul_buku_updt">
            </div>
        </div>
        <div class="row mb-3">
            <label for="#" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="penerbit_buku_updt" id="penerbit_buku_updt">
            </div>
        </div>
        <div class="row mb-3">
            <label for="#" class="col-sm-3 col-form-label">Harga</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="harga_buku_updt" id="harga_buku_updt">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>