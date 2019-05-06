@extends('layouts.master')
    
@section('styles')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" /> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categorias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('categories.create') }}"><i class="fas fa-plus-square" style="font-size: 48px;"></i></a></li>
              {{-- <li class="breadcrumb-item active">Dashboard v2</li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      	<div class="container-fluid">
            <div class="form-group col-md-4 col-md-offset-1">
                <label for="funcionario">Funcionário(a)</label>
                <div class="input-group">
                    <select id="GenreId" name="GenreId" class="form-control combobox" >
                        <option value=""></option>
                        @foreach ($categories as $value)
                            <option value="{{ $value->id }}" {{ old('category_id')== $value->id ? 'selected' : ''  }}>{{ $value->name }}</option>
                        @endforeach

                    </select>
                    <span class="input-group-addon"><a href="#" class="fa fa-plus fa-fw" data-toggle="modal" data-target="#modalForm" title="Cadastrar categoria"></a></span>
                </div>
            </div>
      	</div>
    </section>
    <!-- /.content -->

    <!--mODAL INFO-->
    <div class="modal modal-info fade" id="modalForm">
        <div class="modal-dialog">
            <form action="{{ route('ajax.test.create') }}" method="post" novalidate="" id="frm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title float-left">Nova categoria</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="float-right">&times;</span>
                        </button>


                    </div>
                    <div class="modal-body">

                        @include('dashboard.tests.helpers.tests-modal', ['some' => 'data'])
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger pull-left" data-dismiss="modal">Fechar</button>
                        <button type="submitalvar categoria" class="btn btn-outline-info" >Salvar categoria</button>
                    </div>
                </div>

            <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    </div>
    <!-- /.content-wrapper -->

@endsection

@section('javascript')
    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <!-- Sweetalert2 -->
    <script src="{{ asset('/dist/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui.combobox@1.0.7/lib/jquery-ui.combobox.min.js"></script> --}}

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    {{-- script src="{{ asset('js/ajax-crud-modal-form.js') }}"></script> --}}

    <script src="/dist/js/demo.js"></script>

	<script>
        $(document).on('submit', 'form#frm', function (event) {
            event.preventDefault();
            var form = $(this);
            var data = new FormData($(this)[0]);
            var url = form.attr("action");
            $.ajax({
                type: form.attr('method'),
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('.is-invalid').removeClass('is-invalid');
                    if (data.fail) {
                        for (control in data.errors) {
                            $('input[name=' + control + ']').addClass('is-invalid');
                            $('#error-' + control).html(data.errors[control]);
                        }
                    } else {
                        // Add the new genre to the dropdown list and select it

                        $('#GenreId').append(
                            $('<option></option>')
                                .val(data.category_id)
                                .html(data.category_name)
                                .prop('selected', true)  // Selects the new Genre in the DropDown LB
                        );

                        //$('#genreDialog').dialog('close');
                        $('#modalForm').modal('hide');
                        ajaxLoad(data.redirect_url);

                        //alert(data.category_name);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Error: " + errorThrown);
                }
            });
            return false;
        }); 

        function ajaxLoad(filename, content) {
            content = typeof content !== 'undefined' ? content : 'content';
            $('.loading').show();
            $.ajax({
                type: "GET",
                url: filename,
                contentType: false,
                success: function (data) {
                    $("#" + content).html(data);
                    $('.loading').hide();
                },
                error: function (xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        } 

        $('#modalForm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            ajaxLoad(button.data('href'), 'modal_content');
        });
        $('#modalDelete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            $('#delete_id').val(button.data('id'));
            $('#delete_token').val(button.data('token'));
        });
        $('#modalForm').on('shown.bs.modal', function () {
            $('#focus').trigger('focus')
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.combobox').select2();
        });
    </script>

@stop