@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Alterar Periodo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('periods.index') }}" class="btn btn-info btn-sm">Lista de cursos</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('periods.update', $period->id) }}" method="post" novalidate="">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select id="year" name="year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}">
                                        <option value="2018" {{ old('year', $period->year )== 2018 ? 'selected' : ''  }}>2018</option>
                                        <option value="2019" {{ old('year', $period->year )==2019 ? 'selected' : ''  }}>2019</option>
                                        <option value="2020" {{ old('year', $period->year )==2020 ? 'selected' : ''  }}>2020</option>
                                        <option value="2021" {{ old('year', $period->year )==2021 ? 'selected' : ''  }}>2021</option>
                                        <option value="2022" {{ old('year', $period->year )==2022 ? 'selected' : ''  }}>2022</option>
                                        <option value="2023" {{ old('year', $period->year )==2023 ? 'selected' : ''  }}>2023</option>
                                        <option value="2024" {{ old('year', $period->year )==2024 ? 'selected' : ''  }}>2024</option>
                                    </select>
                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <select id="enabled" name="enabled" class="form-control{{ $errors->has('enabled') ? ' is-invalid' : '' }}">
                                        <option value="1" {{ old('enabled', $period->enabled )=='1' ? 'selected' : ''  }}>Ativo</option>
                                        <option value="0" {{ old('enabled', $period->enabled )=='0' ? 'selected' : ''  }}>Inativo</option>
                                    </select>
                                    @if ($errors->has('enabled'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('enabled') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Alterar periodo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
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
    <!--StringToSlug-->
   {{--  <script src="//cdnjs.cloudflare.com/ajax/libs/speakingurl/13.0.0/speakingurl.min.js" type="text/javascript"></script>
    <script src="/dist/plugins/stringToSlug/jquery.stringtoslug.min.js"></script> --}}
    <script src="/dist/plugins/stringToSlug/jquery.stringToSlug.1.3.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="/dist/js/demo.js"></script>

    <script>
        $(document).ready( function() {
            //$("#basic-usage").stringToSlug();
            $("#name").stringToSlug({
                 getPut: '#slug',
            });
        });
    </script>

@stop