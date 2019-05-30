@extends('layouts.app')
@section('content')
<script>
        document.getElementById('m-metas-comerciales').setAttribute("class", "active");
        document.getElementById('a-metas-comerciales').removeAttribute("style");
        document.getElementById('ml2-metas-comerciales').setAttribute("class", "nav nav-second-level collapse in");
        document.getElementById('ml2-progreso-directores').setAttribute("class", "active");
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
    <div class="row animated fadeInDown">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="ibox">
                <div class="ibox-content text-center">
                    <h2>Inspectores<br>
                        <small class="m-t-sm small">Progreso Individual</small>
                    </h2>
                    <div class="text-center">
                        <div class="m-t-md font-bold">Meta Anual</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="row"  id="content-dir-inspect">
            </div>
        </div>
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
                    let inspects = [];

                    repurchases.forEach((value, index) => {
                        // if (value.cargo == 4) {
                        //     res.cotizaciones.forEach((elemt, ind) => {
                        //         if (value.user_id == elemt.user_id) {
                        //             cotizationsDirector[ind] = elemt.total;
                        //             // directorInfo.personalNewClients = suma+=elemt.total;

                        //         }
                        //     });
                        //     repurchasesDirector[index] = value.total_facturas;
                        // }
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
                        // console.log(value.created_at.year())
                        if (value.created_at.year() +1 == now.year()) {
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
                                        <img alt="image" style="margin: 24px auto 24px;" class="img-circle m-t-xs img-responsive" src="/storage/${directorInfo.avatar.substr(6,)}">
                                        <div class="m-t-xs font-bold">${directorInfo.role}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Clientes Nuevos Equipo (M)</h5>
                                            <h2>${((directorInfo.teamNewClientsMonthly / directorInfo.goalTeamNewClients) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $
                                                    ${directorInfo.teamNewClientsMonthly}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.teamNewClientsMonthly / directorInfo.goalTeamNewClients) * 100).toFixed(0)}%;"
                                                    class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalTeamNewClients}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Recompras Equipo (M)</h5>
                                            <h2>${((directorInfo.teamRepurcahsesMonthly / directorInfo.goalTeamRepurchases) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $
                                                    ${directorInfo.teamRepurcahsesMonthly}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.teamRepurcahsesMonthly / directorInfo.goalTeamRepurchases) * 100).toFixed(0)}%;"
                                                    class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalTeamRepurchases}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Total Equipo Anual</h5>
                                            <h2>${((directorInfo.yearlyByTeam / directorInfo.goalYearlyTeam) * 100).toFixed(0)}%
                                                <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${directorInfo.yearlyByTeam}</small>
                                            </h2>
                                            <div class="progress progress-mini">
                                                <div style="width: ${((directorInfo.yearlyByTeam / directorInfo.goalYearlyTeam) * 100).toFixed(0)}%;"
                                                    class="progress-bar progress-bar-primary"></div>
                                            </div>

                                            <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalYearlyTeam}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `)

                    let sumAuxNewClients, sumAuxRepurchases;

                    res.users.forEach((user, indexUser) => {
                        sumAuxNewClients = 0;
                        sumAuxRepurchases = 0;
                        if(repurchases.length > 0 && cotizations.length > 0  ){
                            repurchases.forEach((repurchase, indexRep) => {
                                if(user.id == repurchase.user_id){
                                    inspects[indexUser] = {
                                        sumRepurchases: sumAuxRepurchases += repurchase.total_facturas,
                                        name: user.nombres
                                    }
                                }
                            })
                        

                            cotizations.forEach((cotization, indexCotization) => {
                                if(user.id == cotization.user_id){
                                    inspects[indexUser].sumNewClients = sumAuxNewClients += cotization.total_cotization
                                    
                                }
                            })

                            inspects[indexUser].sumInspect = inspects[indexUser].sumRepurchases + inspects[indexUser].sumNewClients

                            $("#content-dir-inspect").append(`                            
                            <div class="col-lg-6">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <h5>Total por inspector ${inspects[indexUser].name}</h5>
                                        <h2>${((inspects[indexUser].sumInspect / directorInfo.goalYearlyInspect) * 100).toFixed(0)}%
                                            <small style="float: right;margin-top: 10px;font-size: 11px;">Progreso: $ ${inspects[indexUser].sumInspect}</small>
                                        </h2>
                                        <div class="progress progress-mini">
                                            <div style="width: ${((inspects[indexUser].sumInspect / directorInfo.goalYearlyInspect) * 100).toFixed(0)}%;" class="progress-bar progress-bar-primary"></div>
                                        </div>

                                        <div class="m-t-sm small">Meta Total: $ ${directorInfo.goalYearlyInspect}</div>
                                    </div>
                                </div>
                            </div>
                        `);

                        }else{
                            $("#content-dir-inspect").append(`                            
                                <div class="col-lg-6">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                            <h5>Total por inspector Sin recompras y/o comisinoes</h5>
                                        </div>
                                    </div>
                                </div>
                            `);
                        }
                    }) 
                    
                    // console.log(cotizations)

                })
                .catch((err) => {
                    console.log(err);
                })
        })
    </script>
    @endsection