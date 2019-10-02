<div class="modal fade" id="transaksi" tabindex="1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <form id="form-transaksi" method="post" data-toggle="validator">{{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                            <label for="id_customer" class="col-form-label">{{ __('Nama Customer') }}</label>
                                <select name="id_customer" id="id_customer" class="form-control" autofocus>
                                    <option>Pilih Customer</option>
                                    @foreach($customer as $value)
                                        <option value="{{$value->id}}">{{$value->nama_customer}}</option>
                                    @endforeach
                                </select>
                    </div>

                    <div class="form-group">
                            <label for="id_makanan" class="col-form-label">{{ __('Nama Makanan') }}</label>
                                <select name="id_makanan" id="id_makanan" class="form-control" autofocus>
                                    <option>Pilih Makanan</option>
                                    @foreach($makanan as $valu)
                                        <option value="{{$valu->id}}">{{$valu->nama_makanan}}</option>
                                    @endforeach
                                </select>
                    </div>


                    <div class="form-group">
                            <label for="id_minuman" class="col-form-label">{{ __('Nama Minuman') }}</label>
                                <select name="id_minuman" id="id_minuman" class="form-control" autofocus>
                                    <option>Pilih Minuman</option>
                                    @foreach($minuman as $val)
                                        <option value="{{$val->id}}">{{$val->nama_minuman}}</option>
                                    @endforeach
                                </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="jumlah_makanan" class="col-form-label">{{ __('Jumlah Makanan') }}</label>
                            <input name="jumlah_makanan" id="jumlah_makanan" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_minuman" class="col-form-label">{{ __('Jumlah Minuman') }}</label>
                            <input name="jumlah_minuman" id="jumlah_minuman" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                   <div class="form-group">
                        <label for="total_harga" class="col-form-label">{{ __('Total') }}</label>
                            <input name="total_harga" id="total_harga" type="text" class="form-control" required autocomplete="off" autofocus readonly>
                        </div>

                    <div class="form-group">
                        <label for="tgl_pesan" class="col-form-label">{{ __('Tanggal Pesan') }}</label>
                            <input id="tgl_pesan" name="tgl_pesan" type="text" class="form-control" required autocomplete="off" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tgl_kirim" class="col-form-label">{{ __('Tanggal Kirim') }}</label>
                            <input id="tgl_kirim" name="tgl_kirim" type="text" class="form-control" required autocomplete="off" readonly>
                    </div>

                    <div class="form-group">
                         <label for="alamat-tujuan" class="col-form-label">{{ __('Alamat Tujuan') }}</label>
                             <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control" required autocomplete="off"></textarea> 
                     </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit!</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/datepicker/js/bootstrap-datepicker.min.js') }}"></script>

<script type="text/javascript">

    //set tanggal pesan
    $('#tgl_pesan').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('#tgl_pesan').datepicker('setDate', 'today');


    //set tanggal kirim
    $('#tgl_kirim').datepicker({
        format: 'yyyy-mm-dd',
    });
    $('#tgl_kirim').datepicker('setDate', 'today');


    //set total harga dari penjumlahan makanan
    $( "#jumlah_makanan" ).change(function() {
    var jul =  $( "#jumlah_makanan" ).val();
    var id = $('#id_makanan').val();
        $.ajax({
            url : "{{ url('get-total') }}" + '/' +id+'/'+ jul,
            type : "GET",
            dataType: 'html',
            success : function(data) {
                $('#total_harga').val(data);
            },
            error : function(data){
                $('#total_harga').val(data);
            }
        });
        return false;
    });

    
    //set total harga dari penjumlahan minuman
    $( "#jumlah_minuman" ).change(function() {
    var jum =  $( "#jumlah_minuman" ).val();
    var id = $('#id_minuman').val();
    var total = $('#total_harga').val();
        $.ajax({
            url : "{{ url('get-total') }}" + '/' +id+ '/' +jum+ '/' +total,
            type : "GET",
            dataType: 'html',
            success : function(data) {
                $('#total_harga').val(data);
            },
            error : function(data){
                $('#total_harga').val(data);
            }
        });
        return false;
    });

</script>