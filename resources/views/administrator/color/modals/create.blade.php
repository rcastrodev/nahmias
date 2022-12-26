<div class="modal fade" id="modal-create-element">
    <form action="{{ route('color.content.store') }}" method="post" class="modal-dialog" data-info="reset" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Orden">
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" name="code" class="form-control" placeholder="Código">
            </div>
            <div class="form-group mt-3">
                <input type="file" name="color" class="form-control-file">
                <small>Tamaño de imagen recomendada 200x60</small>
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