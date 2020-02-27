@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><i class='fa fa-key'></i> <strong>Edit: </strong> {{$permission->name}}</h3>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                            {{-- Form model binding to automatically populate our fields with permission data --}}

                            <div class="form-group">
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection