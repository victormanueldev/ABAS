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
    <div class="row animated fadeInDown" id="users">

    </div>
    @endsection
    @section('ini-scripts')
    <script>
        $(document).ready(function () {

            var sparklineCharts;
            $.get('/metas/comerciales')
                .then((res) => {
                    let userData = [];
                    res.cotizaciones.forEach((value, index) => {
                        if (value.id == res[index].id) {
                            userData[index] = {
                                id: value.id,
                                name: res[index].nombres,
                                lastName: res[index].apellidos,
                                fac: parseInt(res[index].total),
                                cotizaciones: parseInt(value.total),
                                role: res[index].descripcion,
                                avatar: res[index].foto,
                                pieChart1: "pie-newc-"+index,
                                pieChart2: "pie-repurchase-"+(index+=3),
                                goalNewClients: 0,
                                goalRepurchases: 0
                            }
                        }
                    });
                    res.metas.forEach((value,index) => {
                        userData.forEach((user, index2) => {
                        if(value.user_id == user.id){
                            userData[index2].goalNewClients = value.meta_clientes_nuevos,
                            userData[index2].goalRepurchases = value.meta_recompras
                        }
                        });
                        
                    });
                    console.log(userData);
                    userData.forEach((value, index) => {
                        $("#users").append(`
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-box">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <img alt="image" style="margin: 15px" class="img-circle img-responsive" src="{{asset('img/${value.avatar}')}}">
                                            </div>
                                            <div class="col-lg-12 ">
                                                <div style="margin: 0px 15px 15px 20px;width: 100%;" class="font-bold">${value.role}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-4">
                                        <h3><strong>${value.name} ${value.lastName}</strong></h3>
                                        <dl style="margin: 0; " class="dl-horizontal">
                                            <dt style="text-align:left;">Clientes Nuevos: </dt>
                                            <dd style="margin-left: 0px;"> $ ${value.cotizaciones.toLocaleString('de-DE')} <p class="small font-bold m-l" style="width: 30%;display: inline;">COP</p>
                                            </dd>
                                        </dl>
                                        <dl style="margin: 0; " class="dl-horizontal">
                                            <dt style="text-align:left;">Recompras: </dt>
                                            <dd style="margin-left: 0px;"> $ ${value.fac.toLocaleString('de-DE')} <p class="small font-bold m-l" style="width: 30%;display: inline;">COP</p>
                                            </dd>
                                        </dl>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h2 style="width: 56px;display: inline-block;">${((value.cotizaciones/value.goalNewClients)*100).toFixed(0)}% </h2><small>C. Nuevos</small>
                                                <div class="text-center" style="width: 120px;">
                                                    <div id="${value.pieChart1}"></div>
                                                </div>

                                                <div class="m-t-sm small"><b>Meta Total: </b>$ ${value.goalNewClients.toLocaleString('de-DE')}</div>

                                            </div>
                                            <div class="col-lg-6">
                                                <h2 style="width: 56px;display: inline-block;">${((value.fac/value.goalRepurchases)*100).toFixed(0)}%</h2><small>Recompras</small>
                                                <div class="text-center" style="width: 120px;">
                                                    <div id="${value.pieChart2}"></div>
                                                </div>

                                                <div class="m-t-sm small"><b>Meta Total: </b>$ ${value.goalRepurchases.toLocaleString('de-DE')}</div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `)

                        sparklineCharts = function () {
                            userData.forEach((value,index) => {
                                $(`#${value.pieChart1}`).sparkline([value.cotizaciones, value.goalNewClients], {
                                    type: 'pie',
                                    height: '60',
                                    sliceColors: ['#5CAE27', '#F5F5F5']
                                });
                                $(`#${value.pieChart2}`).sparkline([value.fac, value.goalRepurchases], {
                                    type: 'pie',
                                    height: '60',
                                    sliceColors: ['#5CAE27', '#F5F5F5']
                                });
                            });
                        };
                        sparklineCharts();
                    })
                })
                .catch((err) => {
                    console.log(err)
                });


            var sparkResize;

            $(window).resize(function (e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });




        });
    </script>
    @endsection