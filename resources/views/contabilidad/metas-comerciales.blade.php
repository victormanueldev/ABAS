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
        <div class="col-lg-4 col-md-4">
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
                        {{-- <p style="margin: 0"> <b>Clientes Nuevos: </b>$ 2'500.000</p>
                        <p style="margin: 0"> <b>Recompra: </b>$ 3'500.000</p> --}}
                        {{-- <address>
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address> --}}
                        <div class="row">
                            <div class="col-lg-12">

                                {{-- <h5>Usage</h5> --}}
                                <h2>65%</h2>
                                <div class="progress progress-mini">
                                    <div style="width: 68%;" class="progress-bar"></div>
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
    @endsection