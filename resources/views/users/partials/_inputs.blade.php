<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label for="inputName" class="col-sm-3 control-label">Nombre*</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name', $user->name) }}" placeholder="Ej. usuario nuevo">
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
  <label for="inputEmail" class="col-sm-3 control-label">Email *</label>
  <div class="col-sm-9">
    <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email', $user->email) }}" placeholder="Ej. usuario@correo.com">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
  </div>
</div>
@if($show_PASS)
  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="inputPassword" class="col-sm-3 control-label">Contraseña</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" id="inputPassword" name="password" value="" placeholder="">
      @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
    </div>
  </div>
@endif
<div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
  <label for="inputDepartment_id" class="col-sm-3 control-label">Departamento*</label>
  <div class="col-sm-9">
    <select class="form-control select2" id="inputDepartment_id" name="department_id">
        <option value="">Seleccione una opción</option>
      @foreach($departments as $department)
        <option value="{{ $department->id }}" {{ old('department_id',$user->department_id) == $department->id ?  'selected': ''}}>{{ $department->name }}</option>
      @endforeach
    </select>
    @if ($errors->has('department_id'))
        <span class="help-block">
            <strong>{{ $errors->first('department_id') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
  <label for="inputRole_id" class="col-sm-3 control-label">Rol *</label>
  <div class="col-sm-9">
    <select class="form-control select2" id="inputRole_id" name="role_id">
      <option value="">Seleccione una opción</option>
      @foreach($roles as $role)
        @foreach($user->roles as $relation_role)
          <option value="{{ $role->id }}" {{ old('role_id', $relation_role->id) == $role->id ? 'selected': ''}}>{{ $role->name }}</option>
        @endforeach
      @endforeach
    </select>
    @if ($errors->has('role_id'))
        <span class="help-block">
            <strong>{{ $errors->first('role_id') }}</strong>
        </span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
  <label for="inputAvatar" class="col-sm-3 control-label">Avatar</label>
  <div class="col-sm-9">
    <input type="file"
           class="form-control"
           id="inputAvatar"
           name="avatar"
           accept="image/png, .jpeg, .jpg ">

     @if ($errors->has('avatar'))
         <span class="help-block">
             <strong>{{ $errors->first('avatar') }}</strong>
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
