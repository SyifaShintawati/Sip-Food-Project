<div class="modal fade" id="minuman" tabindex="1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <form id="form-minuman" method="post" data-toggle="validator">{{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="nama_minuman" class="col-form-label">{{ __('Nama Minuman') }}</label>
                            <input name="nama_minuman" id="nama_minuman" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">{{ __('Deskripsi Produk') }}</label>
                            <input name="deskripsi" id="deskripsi" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                   <div class="form-group">
                        <label for="harga_minuman" class="col-form-label">{{ __('Harga Asli') }}</label>
                            <input name="harga_minuman" id="harga_minuman" type="text" class="form-control" required autocomplete="off" autofocus>
                   </div>

                   <div class="form-group">
                       <label for="pajak_minuman" class="col-form-label">{{ __('Harga Jual') }}</label>
                           <input name="pajak_minuman" id="pajak_minuman" type="text" class="form-control" required autocomplete="off" readonly>
                   </div>

                   <div class="form-group">
                       <label for="foto" class="col-form-label">{{ __('Foto') }}</label>
                           <input name="foto" id="foto" type="file" class="form-control" required autocomplete="off">
                   </div>

                    <div class="form-group">
                        <label for="stok_minuman" class="col-form-label">{{ __('Stok') }}</label>
                            <input name="stok_minuman" id="stok_minuman" type="text" class="form-control" required autocomplete="off">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit!</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>