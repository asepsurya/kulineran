<div class="modal fade" id="ubahPhoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Photo Profile</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
          <form action="/profile/ubahPhoto" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{ auth()->user()->gambar}}" name="oldImage" hidden>
            <input type="text" value="{{ auth()->user()->id }}" name="idUser" hidden>
            <input type="file" name="gambar" id="gambar" class="form-control">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>