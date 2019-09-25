<div class="modal fade" id="makanan" tabindex="1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <form id="form-makanan" method="post" data-toggle="validator">{{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                            <label for="id_supplier" class="col-form-label">{{ __('Penyuplai') }}</label>
                                <select name="id_supplier" id="id_supplier" class="form-control" autofocus>
                                    <option>Pilih Supplier</option>
                                    @foreach($supplier as $valu)
                                        <option value="{{$valu->id}}">{{$valu->nama_supplier}}</option>
                                    @endforeach
                                </select>
                        </div>

                    <div class="form-group">
                        <label for="nama_makanan" class="col-form-label">{{ __('Nama Makanan') }}</label>
                            <input name="nama_makanan" id="nama_makanan" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                   <div class="form-group">
                        <label for="harga_makanan" class="col-form-label">{{ __('Harga Makanan') }}</label>
                            <input name="harga_makanan" id="harga_makanan" type="text" class="form-control" required autocomplete="off" autofocus>

                    <div class="form-group">
                        <label for="stok_makanan" class="col-form-label">{{ __('Stok Makanan') }}</label>
                            <input name="stok_makanan" id="stok_makanan" type="text" class="form-control" required autocomplete="off">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit!</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>