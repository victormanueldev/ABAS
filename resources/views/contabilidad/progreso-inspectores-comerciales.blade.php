@extends('layouts.app')
@section('content')
<script>
    document.getElementById('m-metas-comerciales').setAttribute("class", "active");
    document.getElementById('a-metas-comerciales').removeAttribute("style");
    document.getElementById('ml2-metas-comerciales').setAttribute("class", "nav nav-second-level collapse in");
    document.getElementById('ml2-progreso-inspectores').setAttribute("class", "active");
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
    <div class="row">
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Progreso de inspectores comerciales</h5>
        
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3" style="text-align: center">
                                            <h4>Filtrar por fechas</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="data_5">
                                                <div class="input-daterange input-group" id="datepicker" style="width: 100%;">
                                                    <input type="text" id="date-start" class="form-control-sm form-control"
                                                        name="start" value="01/14/2018" />
                                                    <span class="input-group-addon">hasta</span>
                                                    <input type="text" id="date-end" class="form-control-sm form-control" name="end"
                                                        value="01/22/2018" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-outline btn-primary" id="filter-dates">Aplicar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
    </div>
    <div class="row animated fadeInDown" id="users">

    </div>
    @endsection
    @section('ini-scripts')
    <script src="{{asset('js/plugins/fullcalendar/moment-timezone.js')}}"></script>
    <script>
        $(document).ready(function () {

        /** Asignacion de fechas por default a dateRange **/
        $("#date-start").val(moment().tz("America/Bogota").format("MM/DD/YYYY"));
        $("#date-end").val(moment().tz("America/Bogota").add(1, "month").format("MM/DD/YYYY"));

        /** Inicializacion del Date Range **/
        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var sparklineCharts;

        $("#filter-dates").click(e => {
            $("#users").empty();
            $.ajax({
                url: '/inspectores/metas',
                data: {
                    dateIni: moment($("#date-start").val(), 'MM/DD/YYYY').format("YYYY-MM-DD"),
                    dateEnd: moment($("#date-end").val(), 'MM/DD/YYYY').format("YYYY-MM-DD"),
                    monthValidity:  moment($("#date-start").val()).month()
                },
                type: 'GET'
            })
                .then((res) => {
                    let userData = [];
                    res.cotizaciones.forEach((value, index) => {
                        if(res[index] !== undefined){
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
                    console.log(userData)
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
                                        <div class="row" id="chart-row">
                                            <div class="col-lg-6" id="chart-col-1">
                                                <h2 style="width: 56px;display: inline-block;font-size: 22px;">${ !value.goalNewClients ? 0 : ((value.cotizaciones/value.goalNewClients)*100).toFixed(0)}% </h2><small>C. Nuevos</small>
                                                <div class="text-center" ${((value.cotizaciones/value.goalNewClients)*100).toFixed(0) >= 100 ? "style='display: none;'" :  "style='width: 120px;'"}>
                                                    <div id="${value.pieChart1}"></div>
                                                </div>
                                                <div ${((value.cotizaciones/value.goalNewClients)*100).toFixed(0) >= 100 ? "style='width: 120px;text-align: center;margin-top:3px'" : "style='display: none;'"}>
                                                    <i class="fa fa-trophy fa-3x" style="display:block;color:rgb(219, 165, 37);"></i>
                                                    <small>¡Meta Cumplida!</small>
                                                </div>
                                                <div class="m-t-sm small"><b>Meta Total: </b>$ ${value.goalNewClients.toLocaleString('de-DE')}</div>
                                            </div>
                                            <div class="col-lg-6" id="chart-col-2">
                                                <h2 style="width: 56px;display: inline-block;font-size: 22px;">${ !value.goalRepurchases ? 0 : ((value.fac/value.goalRepurchases)*100).toFixed(0)}%</h2><small>Recompras</small>
                                                <div class="text-center"  ${((value.fac/value.goalRepurchases)*100).toFixed(0) >= 100 ? "style='display: none;'" :  "style='width: 120px;'"}">
                                                    <div id="${value.pieChart2}"></div>
                                                </div>
                                                <div ${((value.fac/value.goalRepurchases)*100).toFixed(0) >= 100 ? "style='width: 120px;text-align: center;margin-top: 3px'" : "style='display: none;'"}>
                                                    <i class="fa fa-trophy fa-3x" style="display:block;color:rgb(219, 165, 37);"></i>
                                                    <small>¡Meta Cumplida!</small>
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
                                    $(`#${value.pieChart1}`).sparkline([!value.cotizaciones ? 0 : value.cotizaciones, !value.goalNewClients ? 0 : value.goalNewClients], {
                                        type: 'pie',
                                        height: '60',
                                        sliceColors: ['#5CAE27', '#F5F5F5']
                                    });
                                
                                    $(`#${value.pieChart2}`).sparkline([!value.fac ? 0 : value.fac, !value.goalRepurchases ? 0 : value.goalRepurchases], {
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
        })


        var sparkResize;

        $(window).resize(function (e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });




        });
    </script>
    @endsection