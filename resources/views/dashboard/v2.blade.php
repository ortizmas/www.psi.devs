@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PRÓ-SAÚDE INTEGRAL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cursos</span>
                <span class="info-box-number">
                  {{ $trainees->count() }}
                  <small>cursos</small>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Modulos</span>
                <span class="info-box-number">
                  {{ $young_employees->count() }}
                    <small>Modulos</small>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-university"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Classes</span>
                <span class="info-box-number">
                  {{ $careers->count() }}
                  <small>classes</small>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Paginas</span>
                <span class="info-box-number">
                  {{ $allJT->count() }}
                  <small>100%</small>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Pró-Saúde Integral</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">Total de {{ $allJT->count() }} posts</span>
                      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        @if (isset($allJT))
                            @foreach ($allJT as $jt)
                            <li>
                                <img src="{{ asset('uploads/trainees/'. $jt->image) }}" alt="{{ $jt->name }}">
                                <a class="users-list-name" href="{{ route('trainees.edit', $jt->id) }}">{{ $jt->name }}</a>
                                <span class="users-list-date">Curso {{ $jt->course->name }}</span>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript::">Todos os Posts</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
            </div>
            <div class="col-md-4">
                @if (isset($careers))
                    @foreach ($careers as $curso)
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fa fa-university"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $curso->name }}</span>
                                <span class="info-box-number text-muted">{{ $curso->trainees->count() }} posts</span>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="fa fa-tag"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Inventory</span>
                    <span class="info-box-number">5,200</span>
                  </div>
                </div>
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="fa fa-heart-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Mentions</span>
                    <span class="info-box-number">92,050</span>
                  </div>
                </div>
                <div class="info-box mb-3 bg-danger">
                  <span class="info-box-icon"><i class="fa fa-cloud-download"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Downloads</span>
                    <span class="info-box-number">114,381</span>
                  </div>
                </div>
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="fa fa-comment-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Direct Messages</span>
                    <span class="info-box-number">163,921</span>
                  </div>
                </div> --}}
            </div>
        </div>
      </div>
    </section>
    </div>
@endsection

@section('javascript')
    <!-- jQuery -->
    <script src="/dist/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sparkline -->
    <script src="/dist/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Slimscroll -->
    <script src="/dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.2 -->
    <script src="/dist/plugins/chartjs-old/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
@stop