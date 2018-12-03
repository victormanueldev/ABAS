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
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="ibox">
                <div class="ibox-content text-center">
                    <h2>Nixk Smith <br>
                        <small class="m-t-sm small">Vargaz Perez</small>
                    </h2>
                    <div class="text-center">
                        <img alt="image" style="margin: 0px 37px 37px 37px;" class="img-circle m-t-xs img-responsive"
                            src="{{asset('img/a3.jpg')}}">
                        <div class="m-t-xs font-bold">Marketing manager</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>14%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>14%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>14%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>14%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>14%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>14%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section('ini-scripts')
    @endsection