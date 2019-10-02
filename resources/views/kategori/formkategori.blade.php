<div class="modal fade" id="kategori" tabindex="1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <form id="form-kategori" method="post" data-toggle="validator" enctype="multipart/form-data">{{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="jenis_kategori" class="col-form-label">{{ __('Jenis Produk') }}</label>
                            <input name="jenis_kategori" id="jenis_kategori" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit!</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>