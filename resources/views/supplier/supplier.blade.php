<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('gambar/download.png') }}">

    <title>SipFood | Supplier</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- dataTables -->
    <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/bootstrap/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

    <!-- custom styles -->
    <link href="{{ asset('assets/bootstrap/css/navbar-fixed-top.css') }}" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button><a class="navbar-brand" href="#">SIP FOOD</a>
        </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="{{url ('/home') }}">Halaman Utama</a></li>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Produk<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{url ('/makanan') }}">Makanan</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{url ('/minuman') }}">Minuman</a></li>
            </ul>
              </li>
              <li><a href="{{url ('/customer') }}">Customer</a></li>
              <li><a href="{{url ('/transaksi') }}">Transaksi Pesanan</a></li>
            </ul>
      
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->name }} <span class="caret"></span>
              </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display: block;"> {{ __('Logout') }}
                </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                  </form>
              </li>
            </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container"><br>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3> Daftar Supplier
                <a onclick="tambah()" class="btn btn-primary pull-right" style="margin-top: -8px">Tambah Data</a>
              </h3>
            </div>
              <div class="panel-body">
                <table id="supplier-table" class="table table-striped">
                  <thead>
                    <tr>
                      <th width="30">No</th>
                      <th>Nama Supplier</th>
                      <th>Alamat Lengkap</th>
                      <th>Nomor Telepon</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                    <tbody></tbody>
                </table>
                @include('supplier.formsupplier')  
              </div>
          </div>
        </div>
      </div>
    </div>

<!-- Script JQuery -->
<script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Script Datatables -->
<script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

<!-- Script Validator -->
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>

<script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

<script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>

  <script type="text/javascript">
    var table = $('#supplier-table').DataTable({
      processing : true,
      serverSide : true,
      ajax: "{{route ('api.supplier') }}",
      columns: [
        {data: 'id', name: 'id'},
        {data: 'nama_supplier', name: 'nama'},
        {data: 'alamat_supplier', name: 'alamat'},
        {data: 'no_telpon', name: 'no_telpon'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    });

    function tambah() {
      save_method = "add";
      $('input[name=_method]').val('POST');
      $('#supplier').modal('show');
      $('#supplier form')[0].reset();
      $('#supplier').appendTo("body").modal('show');
      $('.modal-title').text('Masukan Data Supplier');
    }

    function edit(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#supplier').appendTo("body").modal('show');
        $('#supplier form')[0].reset();
        $.ajax({
          url: "{{ url('supplier') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#supplier').modal('show');
            $('.modal-title').text('Ubah Data');

            $('#id').val(data.id);
            $('#nama_supplier').val(data.nama_supplier);
            $('#alamat_supplier').val(data.alamat_supplier);
            $('#no_telpon').val(data.no_telpon);
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      function hapus(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: 'Apa Anda Yakin?',
            text: "Anda Tidak Dapat Mengembalikannya Kembali!!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then(function () {
            $.ajax({
                url : "{{ url('supplier') }}" + '/' + id,
                type : "POST",
                data : {'_method' : 'DELETE', '_token' : csrf_token},
                success : function(data) {
                    table.ajax.reload();
                    swal({
                        title: 'Sukses!',
                        text: data.message,
                        type: 'success',
                        timer: '1500'
                    })
                },
                error : function () {
                    swal({
                        title: 'Oops...',
                        text: data.message,
                        type: 'error',
                        timer: '1500'
                    })
                }
            });
        });
      }

    $(function(){
            $('#supplier form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('supplier') }}";
                    else url = "{{ url('supplier') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        //data : $('#supplier form').serialize(),
                        data: new FormData($("#supplier form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#supplier').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Sukses!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                        }
                    });
                    return false;
                }
            });
        });

  </script>

  </body>
</html>