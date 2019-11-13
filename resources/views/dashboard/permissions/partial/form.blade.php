<div class="form-group">
	{{ Form::label('name', 'Nome (Exemplo: create user)') }}
	{{ Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control' ]) }}
	@if ($errors->has('name'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('name') }}</strong>
        </span> 
    @endif
</div>

@if(!$roles->isEmpty()) 
    <h4>Assign Permission to Roles</h4>

    @foreach ($roles as $role) 
        {{ Form::checkbox('roles[]',  $role->id ) }}
        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

    @endforeach
@endif
<br>

{{-- <h3>Permiso especial</h3>
<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} Acesso total</label>
	<label>{{ Form::radio('special', 'no-access') }} Nenhum acesso</label>
</div>
<hr>
<h3>Lista de Permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach ($permissions as $permission)
			<li>
				<label>
					{!! Form::checkbox('permissions[]', $permission->id, null) !!}
					{{ $permission->name }}
					<em>({{ $permission->description ?: 'N/A' }})</em>
				</label>
			</li>
		@endforeach
	</ul>
</div> --}}

<div class="form-group">
	{{ Form::submit('Salvar', ['class' => 'btn btn-success float-right']) }}
</div>