<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="inputName" class="col-sm-2 control-label">Nombre*</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $department->name) }}" placeholder="Ej. Recursos Humanos">
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group">
  <label for="inputDescription" class="col-sm-2 control-label">Descripción</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputDescription" name="description" value="{{ old('description', $department->description) }}" placeholder="Ej. Talento Humano">
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <button type="button" onclick="back()" class="btn btn-default btn-flat ">Volver</button>
  <button type="submit" class="btn btn-success btn-flat pull-right" name="button"> Guardar</button>
</div>
<!-- /.box-footer -->
