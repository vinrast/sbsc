<div class="modal fade in" id="modal-absenteeism" style="display: none; padding-right: 15px;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <form class="form-horizontal save-form">
          <div class="modal-body">
            <input type="hidden" name="formula_type" value="5">
            <input type="hidden" class="indicator" name="indicator" value="">
            <input type="hidden" class="date" name="date" value="">
            <input type="hidden" class="threshold" name="threshold" value="">
            <div class="form-group container-input_1-help">
              <div class="col-sm-10 col-sm-offset-1">
                <label for="hourAbsenteeism">Total Horas de Ausentismo*</label>
                <input type="number" class="form-control" id="hourAbsenteeism" name="input_1" value="" min="0" placeholder="Nro de horas">
                <span  style="display:none;" class="help-block input_1-help">
                    <strong>error 1</strong>
                </span>
              </div>
            </div>
            <div class="form-group container-input_2-help">
              <div class="col-sm-10 col-sm-offset-1">
                <label for="WorkerNumber">Número de Trabajadores*</label>
                <input type="number" class="form-control" id="WorkerNumber" name="input_2" min="0" value="" placeholder="Número de Trabajadores">
                <span style="display:none;" class="help-block input_2-help">
                    <strong>error 2</strong>
                </span>
              </div>
            </div>
            <div class="form-group container-input_3-help">
              <div class="col-sm-10 col-sm-offset-1">
                <label for="workDay">Días Laborados*</label>
                <input type="number" class="form-control" id="workDay" name="input_3" min="0" value="" placeholder="Cantidad de días laborados en el mes">
                <span style="display:none;" class="help-block input_3-help">
                    <strong>error 3</strong>
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
