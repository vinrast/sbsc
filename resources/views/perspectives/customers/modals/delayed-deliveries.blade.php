<div class="modal fade in" id="modal-delayed-deliveries" style="display: none; padding-right: 15px;">
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
              <div class="col-sm-10 col-sm-offset-1">
                <label for="inputTarget">Entregas Fuera de Plazo*</label>
                <input type="number" class="form-control" id="inputTarget" name="performance_threshold" value="" placeholder=" Cantidad de entregas fuera de plazo">
                <span  style="display:none;" class="help-block target-help">
                    <strong>error 1</strong>
                </span>
              </div>
            </div>
            <div class="form-group" id="container-threshold-help">
              <div class="col-sm-10 col-sm-offset-1">
                <label for="inputThreshold">Total Pedidos de Clientes*</label>
                <input type="number" class="form-control" id="inputThreshold" name="performance_threshold" value="" placeholder=" Cantidad de pedidos de clientes">
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
