<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" rel="stylesheet"  integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous"/>    

    <title>SKPI - Toko Buku</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <!-- 
        bg-light   : abu-abu
        bg-success : hijau
        bg-primary : biru
        bg-warning : kuning
        bg-danger  : merah
        bg-info    : biru muda
       -->
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Toko Buku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
      <h3>Data Buku</h3>
      <hr>
      <button type="button" class="btn btn-primary btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#modal-create">+ Tambah Data</button>
      <a href="{{ route('cetak_pdf') }}" target="_blank" class="btn btn-secondary btn-sm mt-1"><i class="fas fa-print me-2"></i>Cetak ke PDF</a>
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <table class="table table-bordered mt-4">
        <thead>
          <tr class="text-center">
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @php
          $no = 1
        @endphp
        @foreach ($buku as $key => $value)
          <tr class="text-center">
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $value->judul }}</td>
            <td>{{ $value->penerbit }}</td>
            <td>{{ $value->harga }}</td>
            <td>
              <form action="{{ route('destroy', $value->id) }}" method="POST">
                <button type="button" class="btn btn-success btn-sm" title="Update Data" data-bs-toggle="modal" data-bs-target="#modal-update"
                  data-id="{{ $value->id }}"
                  data-judul="{{ $value->judul }}"
                  data-penerbit="{{ $value->penerbit }}"
                  data-harga="{{ $value->harga }}">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Data"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

    @include('modal/modal-create')
    @include('modal/modal-update')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- JQuery JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#modal-update').on('show.bs.modal', function (event) {
          var div = $(event.relatedTarget)
          var modal = $(this)
        
          modal.find('#id').attr("value", div.data('id'));
          modal.find('#judul_buku_updt').attr("value", div.data('judul'));
          modal.find('#penerbit_buku_updt').attr("value", div.data('penerbit'));
          modal.find('#harga_buku_updt').attr("value", div.data('harga'));

        });

        window.setTimeout(function() 
	        {
	            $(".alert").fadeTo(500, 0).slideUp(500, function(){
	            	$(this).remove(); 
	        	});
	         }, 4000);
      });
    </script>

  </body>
</html>