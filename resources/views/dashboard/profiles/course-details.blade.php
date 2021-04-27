@extends('layouts.master') 

@section('content')

    <div class="content-wrapper bg-white">
        <section class="content">
            <div class="container-fluid bg-content">
                <div class="row pt-5 pb-5">
                    <div class="col-md-8">
                        @if (session()->has('checkPayment'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hoops </strong> {{  session()->get('checkPayment') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @else
                            <h3>Finalizar compra</h3>
                        @endif
                        <hr>
                        <h2 class="font-weight-bold">{!! $course->name !!}</h2>
                        <div class="p-l3 pr-3">{!! str_limit($course->description, 700) !!}</div>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/courses/' . $course->image) }}" class="card-img-top" alt="{{ $course->name }}" width="100%"/>
                            <div class="card-body">
                                <h4><strong>Resumo</strong></h4>
                                <span>Preço original</span>
                                <span class="float-right">R${{ $course->price }}</span>
                                <hr>
                                <span class="font-weight-bold">Total:</span>
                                <span class="font-weight-bold float-right">R${{ $course->price }}</span>
                                <a target="_blank" class="btn btn-danger w-100 btn-lg mt-2" href="{{ $course->link_buy }}">Finalizar o pagamento</a>
                            </div>
                        </div>
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
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)

</script>
<!-- Bootstrap 4 -->
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="/dist/js/pages/dashboard.js"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
@stop