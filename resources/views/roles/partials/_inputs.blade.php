<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="inputName" class="col-sm-2 control-label">Nombre *</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $role->name) }}" placeholder="Ej. Supervisor de zona">
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group">
  <label for="inputDescription" class="col-sm-2 control-label">Descripción</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputDescription" name="description" value="{{ old('description', $role->description) }}" placeholder="Ej. Encargado de zona">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-2 control-label">Permisos Especiales</label>
  <div class="col-sm-9">
    @foreach($specials as $special)
      <input type="radio"
             name="special"
             class="special"
             value="{{ $special->value }}"
             {{ (old('special',$role->special) == $special->value) ? 'checked' : '' }}
             id="special-permission-{{ $special->id }}" >
      <label for="special-permission-{{ $special->id }}" class="control-label">{{ $special->name }}</label>
    @endforeach
  </div>
</div>
<div class="form-group  {{ $errors->has('permissions') ? 'has-error' : '' }}">
  <label for="" class="col-sm-2 control-label">Permisos *</label>
  <div class="col-sm-9">
    @foreach($permissions as $permission)
      <input type="checkbox"
             class="flat-green"
            id="permission-{{$permission->id}}"
            name="permissions[{{ $permission->id }}]"
            value="{{ $permission->id }}"
            {{ $errors->any() ? old("permissions.{$permission->id}"): $role->permissions->contains($permission) ? 'checked' : ''}}>
      <label for="permission-{{$permission->id}}" style="padding-right:10px;" class="control-label">{{ $permission->name }}</label>
    @endforeach
    @if ($errors->has('permissions'))
        <span class="help-block">
            <strong>{{ $errors->first('permissions') }}</strong>
        </span>
    @endif
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <button type="button" onclick="back()" class="btn btn-default btn-flat ">Volver</button>
  <button type="submit" class="btn btn-success btn-flat pull-right" name="button"> Guardar</button>
</div>
<!-- /.box-footer -->
