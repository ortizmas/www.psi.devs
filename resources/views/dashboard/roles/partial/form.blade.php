{{ Form::open(array('url' => 'roles')) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'id' => 'toLowerCase', 'placeholder' =>'Nome')) }}
    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('name') }}</strong>
        </span> 
    @endif
</div>

<h5><b>Assign Permissions</b></h5>
<hr>
<div class='form-group'>
	<input type="checkbox" id="select_all"/> Selecionar todos
</div>
<hr>
<div class='form-group'>
    @foreach ($permissions as $permission)
        {{ Form::checkbox('permissions[]',  $permission->id, null,  array('class' => 'checkbox')) }}
        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
    @endforeach
</div>

{{ Form::submit('Salvar rol', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}