<div class="modal fade" id="produk" tabindex="1" data-backdrop="static" data-keyboard="false" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <form id="form-produk" method="post" data-toggle="validator" enctype="multipart/form-data">{{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    
                        <input type="hidden" id="id" name="id">

                    <div class="form-group">
                            <label for="id_kategori" class="col-form-label">{{ __('Penyuplai') }}</label>
                                <select name="id_kategori" id="id_kategori" class="form-control" autofocus>
                                    <option>Jenis Produk</option>
                                    @foreach($kategori as $valu)
                                        <option value="{{$valu->id}}">{{$valu->jenis_kategori}}</option>
                                    @endforeach
                                </select>
                        </div>

                    <div class="form-group">
                        <label for="nama_produk" class="col-form-label">{{ __('Nama produk') }}</label>
                            <input name="nama_produk" id="nama_produk" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">{{ __('Deskripsi Produk') }}</label>
                            <input name="deskripsi" id="deskripsi" type="text" class="form-control" required autocomplete="off" autofocus>
                    </div>

                   <div class="form-group">
                        <label for="foto" class="col-form-label">{{ __('Foto') }}</label>
                            <input name="foto" id="foto" type="file" class="form-control" autofocus>
                   </div>

                    <div class="form-group">
                        <label for="stok" class="col-form-label">{{ __('Stok') }}</label>
                            <input name="stok" id="stok" type="text" class="form-control" required autocomplete="off">
                    </div>

                   <div class="form-group">
                        <label for="harga_asli" class="col-form-label">{{ __('Harga Asli') }}</label>
                            <input name="harga_asli" id="harga_asli" type="text" class="form-control" required autocomplete="off" autofocus>
                   </div>

                   <div class="form-group">
                        <label for="harga_jual" class="col-form-label">{{ __('Harga Jual') }}</label>
                            <input name="harga_jual" id="harga_jual" type="text" class="form-control" required autocomplete="off" autofocus readonly>
                   </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-save">Submit!</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>