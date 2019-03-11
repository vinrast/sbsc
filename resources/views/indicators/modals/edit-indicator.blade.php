<div class="modal fade in" id="modal-edit-indicator" style="display: none; padding-right: 15px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <form class="form-horizontal" id="edit-form">
          <div class="modal-body">
            <input type="hidden" id="register" name="id" value="">
            <div class="form-group" id="container-target-help">
              <label for="inputTarget" class="col-sm-2 control-label">Objetivo*</label>
              <div class="col-sm-9">
                <textarea name="target" class="form-control" id="inputTarget" rows="8" cols="50" placeholder="..."></textarea>
                <span  style="display:none;" class="help-block target-help">
                    <strong>error 1</strong>
                </span>
              </div>
            </div>
            <div class="form-group" id="container-threshold-help">
              <label for="inputThreshold" class="col-sm-2 control-label">Umbral de Desempeño*</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="inputThreshold" step=".01" name="performance_threshold" value="" placeholder=" Ej. 10">
                <span style="display:none;" class="help-block threshold-help">
                    <strong>error 2</strong>
                </span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-flat pull-right" > Guardar</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
