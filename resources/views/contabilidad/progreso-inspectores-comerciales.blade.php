@extends('layouts.app')
@section('content')
<script>
    document.getElementById('m-metas-comerciales').setAttribute("class", "active");
    document.getElementById('a-metas-comerciales').removeAttribute("style");
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Metas Comerciales</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            <li class="active">
                <strong>Metas Comerciales</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-6 col-md-6">
            <div class="contact-box">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{asset('img/a3.jpg')}}">
                            <div class="m-t-xs font-bold">Marketing manager</div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-4">
                        <h3><strong>Monica Smith</strong></h3>
                        <dl style="margin: 0; " class="dl-horizontal">
                            <dt style="text-align:left;">Clientes Nuevos: </dt>
                            <dd style="margin-left: 0px;">2'500.000 <p class="small font-bold m-l" style="width: 30%;display: inline;">Hasta
                                    hoy</p>
                            </dd>
                        </dl>
                        <dl style="margin: 0; " class="dl-horizontal">
                            <dt style="text-align:left;">Recompras: </dt>
                            <dd style="margin-left: 0px;">2'500.000 <p class="small font-bold m-l" style="width: 30%;display: inline;">Hasta
                                    hoy</p>
                            </dd>
                        </dl>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 style="width: 56px;display: inline-block;">54% </h2><small>C. Nuevos</small>
                                <div class="text-center" style="width: 120px;">
                                    <div id="sparkline5"></div>
                                </div>

                                <div class="m-t-sm small"><b>Meta Total: </b>$ 3.800.000</div>

                            </div>
                            <div class="col-lg-6">
                                <h2 style="width: 56px;display: inline-block;">54%</h2><small>Recompras</small>
                                <div class="text-center" style="width: 120px;">
                                    <div id="sparkline6"></div>
                                </div>

                                <div class="m-t-sm small"><b>Meta Total: </b>$ 3.800.000</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="contact-box">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{asset('img/a3.jpg')}}">
                            <div class="m-t-xs font-bold">Marketing manager</div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-4">
                        <h3><strong>Monica Smith</strong></h3>
                        <dl style="margin: 0; " class="dl-horizontal">
                            <dt style="text-align:left;">Clientes Nuevos: </dt>
                            <dd style="margin-left: 0px;">2'500.000</dd>
                        </dl>
                        <dl style="margin: 0; " class="dl-horizontal">
                            <dt style="text-align:left;">Recompras: </dt>
                            <dd style="margin-left: 0px;">2'500.000</dd>
                        </dl>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 style="width: 56px;display: inline-block;">54% </h2><small>Nuevos</small>
                                <div class="text-center" style="width: 120px;">
                                    <div id="sparkline7"></div>
                                </div>

                                <div class="m-t-sm small"><b>Meta Total: </b>$ 3.800.000</div>

                            </div>
                            <div class="col-lg-6">
                                <h2 style="width: 56px;display: inline-block;">54%</h2><small>Recompras</small>
                                <div class="text-center" style="width: 120px;">
                                    <div id="sparkline8"></div>
                                </div>

                                <div class="m-t-sm small"><b>Meta Total: </b>$ 3.800.000</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('ini-scripts')
    <script>
        $(document).ready(function () {

            var sparklineCharts = function () {

                $("#sparkline5").sparkline([1, 4], {
                    type: 'pie',
                    height: '60',
                    sliceColors: ['#5CAE27', '#F5F5F5']
                });

                $("#sparkline6").sparkline([5, 3], {
                    type: 'pie',
                    height: '60',
                    sliceColors: ['#5CAE27', '#F5F5F5']
                });
                $("#sparkline7").sparkline([1, 4], {
                    type: 'pie',
                    height: '60',
                    sliceColors: ['#5CAE27', '#F5F5F5']
                });

                $("#sparkline8").sparkline([5, 3], {
                    type: 'pie',
                    height: '60',
                    sliceColors: ['#5CAE27', '#F5F5F5']
                });
            };

            var sparkResize;

            $(window).resize(function (e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });

            sparklineCharts();


        });
    </script>
    @endsection