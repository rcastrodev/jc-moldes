<div class="modal fade" id="modal-create-element">
    <form action="{{ route('download.content.createInfo') }}" method="post" class="modal-dialog" data-info="reset" enctype="multipart/form-data" data-sync="no">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="section_id" value="6">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
            </div>
            <div class="form-group">
                <input type="text" name="content_1" class="form-control" placeholder="Título">
            </div>
            <div class="form-group">
                <input type="text" name="content_2" class="form-control" placeholder="Nota importante">
            </div>
            <div class="form-group">
                <textarea name="content_3" cols="30" rows="10" class="ckeditor" placeholder="Contenido"></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
                <small>la imagen card debe ser al menos 288x318px</small>
            </div> 
            <div class="form-group">
                <input type="file" name="image2" class="form-control-file">
                <small>Archivo</small>
            </div>   
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>