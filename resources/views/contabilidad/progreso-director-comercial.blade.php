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
    <div class="row animated fadeInDown " id="content-director">

    </div>
    @endsection
    @section('ini-scripts')
    <script src="{{asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script>
        $(document).ready(() => {
            var now = moment();
            var directorInfo = {
                name: '',
                lastName: '',
                role: 'Director Comercial',
                avatar: '',
                //Progreso personal
                personalNewClients: 0,
                personalRepurchases: 0,
                //Progreso equipo mensual
                teamNewClientsMonthly: 0,
                teamRepurcahsesMonthly: 0,
                //Progreso anual
                yearlyByTeam: 0,
                yearlyPerInspect: 0,
                //Metas propuestas
                goalNewClients: 0,
                goalRepurchases: 0,
                goalTeamNewClients: 0,
                goalTeamRepurchases: 0,
                goalYearlyTeam: 0,
                goalYearlyInspect: 0
            };
            $.get('/metas/director')
                .then((res) => {
                    let repurchases = [];
                    let cotizations = [];
                    res.recompras.forEach((value, index) => {
                        repurchases[index] = {
                            user_id: value.user_id,
                            cargo: value.cargo,
                            fecha_inicio: moment(value.fecha_inicio, "YYYY-MM-DD"),
                            total_facturas: value.total_facturas
                        }
                        // if (value.cargo == 4) {
                        //     res.metas.forEach((val, index2) => {
                        //         if (value.user_id == val.user_id) {
                        //             directorInfo.goalNewClients = val.meta_clientes_nuevos;
                        //             directorInfo.goalRepurchases = val.meta_recompras;
                        //             directorInfo.goalTeamNewClients = val.meta_equipo_clientes_nuevos;
                        //             directorInfo.goalTeamRepurchases = val.meta_equipo_recompras;
                        //             directorInfo.goalYearlyTeam = val.meta_anual_equipo;
                        //             directorInfo.goalYearlyInspect = val.meta_anual_inpector;
                        //             directorInfo.name = val.nombres;
                        //             directorInfo.lastName = val.apellidos;
                        //             directorInfo.avatar = val.foto;

                        //         }
                        //     })
                        // }
                    });

                    res.metas.forEach((val, index2) => {
                            directorInfo.goalNewClients = val.meta_clientes_nuevos;
                            directorInfo.goalRepurchases = val.meta_recompras;
                            directorInfo.goalTeamNewClients = val.meta_equipo_clientes_nuevos;
                            directorInfo.goalTeamRepurchases = val.meta_equipo_recompras;
                            directorInfo.goalYearlyTeam = val.meta_anual_equipo;
                            directorInfo.goalYearlyInspect = val.meta_anual_inpector;
                            directorInfo.name = val.nombres;
                            directorInfo.lastName = val.apellidos;
                            directorInfo.avatar = val.foto;
                    })

                    res.cotizaciones.forEach((value, index) => {
                        cotizations[index] = {
                            user_id: value.user_id,
                            cargo: value.cargo,
                            total_cotization: parseInt(value.total),
                            created_at: moment(value.created_at, "YYYY-MM-DD HH:mm:ss")
                        }
                    })

                    let cotizationsDirector = [];
                    let repurchasesDirector = [];
                    let sumCotizations = 0;
                    let sumRepurchases = 0;
                    let sumTeamRepurchases = 0;
                    let sumTeamNewClients = 0;
                    let sumYearlyTeam = 0;
                    let sumYearlyInspect = 0;

                    repurchases.forEach((value, index) => {
                        if (value.cargo == 4) {
                            res.cotizaciones.forEach((elemt, ind) => {
                                if (value.user_id == elemt.user_id) {
                                    cotizationsDirector[ind] = elemt.total;
                                    // directorInfo.personalNewClients = suma+=elemt.total;

                                }
                            });
                            repurchasesDirector[index] = value.total_facturas;
                        }
                            console.log(value)
                        if (value.fecha_inicio.month() == now.month()) {
                            sumTeamRepurchases += value.total_facturas
                        }
                        if (value.fecha_inicio.year() == now.year()) {
                            sumYearlyTeam += value.total_facturas;
                        }

                    })


                    cotizationsDirector.forEach(value => {
                        directorInfo.personalNewClients = sumCotizations += value;
                    });

                    repurchasesDirector.forEach(value => {
                        directorInfo.personalRepurchases = sumRepurchases += value;
                    })

                    cotizations.forEach((value, index) => {
                        if (value.created_at.year() == now.year()) {
                            sumTeamNewClients += value.total_cotization;
                            sumYearlyTeam += value.total_cotization;
                        }
                    })

                    directorInfo.teamRepurcahsesMonthly = sumTeamRepurchases;
                    directorInfo.teamNewClientsMonthly = sumTeamNewClients;
                    directorInfo.yearlyByTeam = sumYearlyTeam;

                    $("#content-director").append(`
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="ibox">
                                <div class="ibox-content text-center">
                                    <h2>${directorInfo.name} <br>
                                        <small class="m-t-sm small">${directorInfo.lastName}</small>
                                    </h2>
                                    <div class="text-center">
                                        <img alt="image" style="margin: 24px auto 24px;" class="img-circle m-t-xs img-responsive"
                                            src="{{asset('img/${directorInfo.avatar}')}}">
                                        <div class="m-t-xs font-bold">${directorInfo.role}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Clientes Nuevos</h5>
                                            <h2>${((directorInfo.personalNewClients / directorInfo.goalNewClients) * 100).toFixed(0)}% <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${directorInfo.personalNewClients}</small></h2>
                                            
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.personalNewClients / directorInfo.goalNewClients) * 100).toFixed(0)}%;" class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalNewClients}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Clientes Nuevos Equipo</h5>
                                            <h2>${((directorInfo.teamNewClientsMonthly / directorInfo.goalTeamNewClients) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${directorInfo.teamNewClientsMonthly}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.teamNewClientsMonthly / directorInfo.goalTeamNewClients) * 100).toFixed(0)}%;" class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalTeamNewClients}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Total Equipo Anual</h5>
                                            <h2>${((directorInfo.yearlyByTeam / directorInfo.goalYearlyTeam) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${directorInfo.yearlyByTeam}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.yearlyByTeam / directorInfo.goalYearlyTeam) * 100).toFixed(0)}%;" class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalYearlyTeam}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Recompras</h5>
                                            <h2>${((directorInfo.personalRepurchases / directorInfo.goalRepurchases) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${directorInfo.personalRepurchases}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.personalRepurchases / directorInfo.goalRepurchases) * 100).toFixed(0)}%;" class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalRepurchases}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Recompras Equipo</h5>
                                            <h2>${((directorInfo.teamRepurcahsesMonthly / directorInfo.goalTeamRepurchases) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${directorInfo.teamRepurcahsesMonthly}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.teamRepurcahsesMonthly / directorInfo.goalTeamRepurchases) * 100).toFixed(0)}%;" class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalTeamRepurchases}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Total Inspector</h5>
                                            <h2>14%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ 3200000</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: 38%;" class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalYearlyInspect}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `)
                    // console.log(cotizations)

                })
                .catch((err) => {
                    console.log(err);
                })
        })
    </script>
    @endsection