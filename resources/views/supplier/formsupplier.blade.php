<div class="modal fade" id="supplier" tabindex="1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <form id="form-supplier" method="post" data-toggle="validator">{{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="nama_supplier" class="col-form-label">{{ __('Nama Supplier') }}</label>
                            <input name="nama_supplier" id="nama_supplier" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                   <div class="form-group">
                        <label for="alamat_supplier" class="col-form-label">{{ __('Alamat Lengkap') }}</label>
                            <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" required autocomplete="off"></textarea> 
                    </div>

                    <div class="form-group">
                        <label for="no_telpon" class="col-form-label">{{ __('Nomor Telepon') }}</label>
                            <input name="no_telpon" id="no_telpon" type="text" class="form-control" required autocomplete="off">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit!</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>