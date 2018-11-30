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
            <div class="col-lg-4">
                    <div class="contact-box">
                        <a class="row" href="profile.html">
                        <div class="col-4">
                            <div class="text-center">
                                <img alt="image" class="img-circle m-t-xs img-responsive" src="{{asset('img/a3.jpg')}}">
                                <div class="m-t-xs font-bold">Marketing manager</div>
                            </div>
                        </div>
                        <div class="col-8">
                            <h3><strong>Monica Smith</strong></h3>
                            <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p>
                            <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                            </a>
                    </div>
                </div>
    </div>
</div>
@endsection
@section('ini-scripts')
@endsection