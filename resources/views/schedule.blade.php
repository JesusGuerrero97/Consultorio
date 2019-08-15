@extends('footer')
@extends('header')

@section('header')
@parent

<!--http://jsfiddle.net/weareoutman/YkvK9/ //picker-->

<div id="outer" ng-controller="crtl">
    <div id="modal3" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h3 style="text-align: center">Crear Consulta</h3>
            <div class="row">
                <form class="col s12" autocomplete="off">
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s8"></div>
                            <div class="input-field col s4">Nombre del sujeto</div>
<!--                            <div class="row">-->
                                <div class="input-field col s8"></div>
                                <div class="input-field col s4">
                                    <i class="material-icons prefix">person_pin</i>
                                    <input type="text" id="autocomplete-input-Doctor" class="autocomplete" autocomplete="false" >
                                    <label for="autocomplete-input-Doctor">Seleccionar doctor</label>
                                </div>
<!--                            </div>-->
                        </div>
                        <div class="row">
                            <div class="input-field col s1"></div>
                            <div class="input-field col s10">
                                <textarea id="textarea2" class="materialize-textarea" data-length="255" ng-model="tratamiento"></textarea>
                                <label for="textarea2">Tratamiento realizado</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1"></div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">attach_money</i>
                                <input id="icon_telephone" type="number" class="validate" ng-model="pago">
                                <label for="icon_telephone">Cantidad de pago: </label>
                            </div>
                            <div class="input-field col s4">Link del tratamiento</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect red accent-2 btn">Cancelar</button>
            <button class="btn" ng-click="saveConsulta()">Guardar consulta</button>
        </div>
    </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h3 style="text-align: center"><b>Descripcion de la cita</b></h3>
                <p id="modal2-start" style="font-size: 1.3em"></p>
                <p id="modal2-end" style="font-size: 1.3em"></p>
                <p id="modal2-title" style="font-size: 1.3em"></p>
<!--                <p id="modal2-id" style=""></p>-->
            <input id="modal2-id" type="hidden">

            <p></p>
            <div class="row">
                <div class="input-field col s6"></div>
                <div class="input-field col s5">
                    <select ng-model="type" id="selectType2">
                        <option selected value="">Disponible</option>
                        <option value="2">No disponible</option>
                        <option value="3">Completada</option>
                    </select>
                    <label><b>Cambiar estado de cita</b></label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6"></div>
                <div class="input-field col s5">
                    <a id="openConsulta" class="waves-effect waves-light btn-large"><i class="material-icons left">bookmarks</i>Crear consulta</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">

            <h4 style="color: black; text-align: center">Agendar cita</h4>
            <div class="row">
                <form class="col s12" autocomplete="off">
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s1"></div>
                            <div class="input-field col s10">
                                <i class="material-icons prefix">mode_edit</i>
                                <input id="icon_prefix" type="text" class="validate" ng-model="title">
                                <label for="icon_prefix">Descripcion</label>
                            </div>
                        </div>
                        <div class="row">
                            <div id="T1" class="col s1"></div>
                            <div class="input-field col s5">
                                <i class="material-icons prefix">watch_circle</i>
                                <input id="icon_prefixT1" type="text" class="validate" ng-model="timeStart">
                                <label class="" for="icon_prefixT1">Hora de inicio</label>
                            </div>

                            <div id="T2" class="input-field col s5">
                                <i class="material-icons prefix">watch_circle</i>
                                <input  id="icon_prefixT2" type="text" class="validate" ng-model="timeEnd">
                                <label class="" for="icon_prefixT2">Hora de finalización</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s1"></div>
                            <div class="input-field col s10">
                                <select ng-model="type" id="selectType">
<!--                                    <option value="" disabled>Choose your option</option>-->
                                    <option selected value="">Paciente Nuevo</option>
                                    <option value="2">Cita con paciente</option>
                                    <option value="3">Cita con provedor</option>
                                </select>
                                <label>Seleccione tipo de cita</label>
                            </div>
                        </div>
                        <div class="row" ng-show="type === '2'">
                            <h5 style="text-align: center">Seleccionar paciente</h5>
                            <div class="input-field col s1"></div>
                            <div class="input-field col s10">
                                <i class="material-icons prefix">search</i>
                                <input type="text" id="autocomplete-input-pacientes" class="autocomplete" autocomplete="false" >
                                <label for="autocomplete-input-pacientes">Buscar paciente</label>
                            </div>
                        </div>
                        <div class="row" ng-show="type === '3'">
                            <h5 style="text-align: center">Seleccionar proveedor</h5>
                            <div class="input-field col s1"></div>
                            <div class="input-field col s10">
                                <i class="material-icons prefix">search</i>
                                <input type="text" id="autocomplete-input-provedor" class="autocomplete" autocomplete="false" >
                                <label for="autocomplete-input-provedor">Buscar proveedor</label>
                            </div>
                        </div>
                        <div class="row" ng-show="type === '' || type === '1'" ng-init="type = ''">
                            <h5 style="text-align: center">Seleccionar nuevo paciente</h5>
                            <div id="T1" class="col s1"></div>
                            <div class="input-field col s5">
                                <i class="material-icons prefix">person</i>
                                <input id="txtNameNew" type="text" class="validate" ng-model="tD_name">
                                <label class="" for="txtNameNew">Nombre del paciente</label>
                            </div>

                            <div id="T2" class="input-field col s5">
                                <i class="material-icons prefix">phone_android</i>
                                <input  id="txtPhoneNew" type="text" class="validate" ng-model="tD_phone">
                                <label class="" for="txtPhoneNew">Telefono</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect red accent-2 btn">Cancelar</button>
            <button class="btn" id="lol">Agendar</button>
        </div>
    </div>
    <div class="p-5">
        <div id="full"></div>
    </div>
    <div id="eventContent" title="Event Details">
        <div id="eventInfo"></div>
        <p><strong><a id="eventLink" target="_blank">Read More</a></strong></p>
    </div>
</div>

@section('footer')
@parent
<script >


</script>
<script type="text/javascript">
    var app=angular.module('app',[]);
    app.controller('crtl',function($scope, $http)
    {
        $('#openConsulta').click(function(){
            $('input#input_text, textarea#textarea2').characterCounter();
            $('#modal3').modal();
            $('#modal3').modal('open');
        });

        $scope.type = '1';
        $scope.title = ''
        $scope.timeStart = "";
        $scope.timeEnd = "";
        $scope.backStart = '';
        $scope.backEnd = '';

        $scope.pacientList = [];
        $scope.pacientListTemp = {};

        $scope.providerList = [];
        $scope.providerListTemp = {};

        $scope.DoctorList = [];
        $scope.DoctorListTemp = {};

        $scope.tD_phone = '';
        $scope.tD_name = '';

        $scope.consultaData = {tratamiento: '', pago: '', id_cita: '', id_tratamiento: '', id_empleado: ''};
        $scope.scheduleData = {fecha_inicio: '', fecha_fin: '',tipo: '', descripcion: '', status: 1};
        $scope.eventData = {};
        $scope.ev = [];

        //cambiar status
        $('#selectType2').on('change', function() {
            var sTatus = '';
            if($(this).val() === ''){
                sTatus = 1;
            } else if($(this).val() === '2'){
                sTatus = 0;
            } else if($(this).val() === '3'){
                sTatus = 2;
            }
            console.log({id_cita: $('#modal2-id').val(), status: sTatus})
            $http.post('/updateState', {id_cita: $('#modal2-id').val(), status: sTatus}).then
            ( function (res) {
                console.log(res)
                $scope.scheduleData = {fecha_inicio: '', fecha_fin: '',tipo: '', descripcion: '', status: 1};
                swal({
                    title: "Actualizado correctamente",
                    text: "Click boton Ok para continuar.",
                    icon: "success",
                }).then((value) =>{
                    window.location.reload();
                });
            })
        });

        //checar opcion seleccionada de cita type
        $("#selectType").on('change', function() {
            if($(this).val() === '') {
                $scope.type = '1';
            } else if($(this).val() === '2') {
                $scope.type = '2';
            } else if($(this).val() === '3') {
                $scope.type = '3';
            }
        });


        // autocomplete para seleccionar paciente.
        $(function() {
            $http.get('/getDoc').then
            (
                function(response)
                {

                    $scope.DoctorList = response.data;

                    $scope.DoctorList.forEach( function(item) {
                        $scope.DoctorListTemp[item.id + ' ' + item.name] = null;
                    });

                    // /update autocomplete
                    $('#autocomplete-input-Doctor').autocomplete({
                        data: $scope.DoctorListTemp,
                        limit: 7,
                        onAutocomplete: function(val) {
                            // Callback function when value is autcompleted.
                            console.log('completed señected -provier')
                        },
                        minLength: 0,
                    });
                }
            );

            $http.get('/getPac').then
            (
                function(response)
                {
                    $scope.pacientList = response.data;

                    $scope.pacientList.forEach( function(item) {
                        $scope.pacientListTemp[item.id + ' ' + item.name] = null;
                    });

                    // /update autocomplete
                    $('#autocomplete-input-pacientes').autocomplete({
                        data: $scope.pacientListTemp,
                        limit: 7,
                        onAutocomplete: function(val) {
                            // Callback function when value is autcompleted.
                            console.log('completed señected')
                        },
                        minLength: 0,
                    });
                }
            );

            $http.get('/getPro').then
            (
                function(response)
                {

                    $scope.providerList = response.data;

                    $scope.providerList.forEach( function(item) {
                        $scope.providerListTemp[item.id + ' ' + item.name] = null;
                    });

                    // /update autocomplete
                    $('#autocomplete-input-provedor').autocomplete({
                        data: $scope.providerListTemp,
                        limit: 7,
                        onAutocomplete: function(val) {
                            // Callback function when value is autcompleted.
                            console.log('completed señected -provier')
                        },
                        minLength: 0,
                    });
                }
            );


            // /inicializar
            $('input.autocomplete').autocomplete();
        });

        $scope.getData = function(){
            $http.get('/citasGet').then
            (
                function (r){
                    $scope.evTemp = r.data;
                    angular.forEach($scope.evTemp, function (value, key) {
                        $scope.eventData = {
                            id: value.id_cita,
                            title: value.descripcion,
                            start: value.fecha_inicio,
                            end: value.fecha_fin,
                            editable: true
                        };
                        if(value.status === 0){
                            $scope.eventData.className = 'NoAvailable';
                        } else if( value.status === 1){
                            $scope.eventData.className = 'available';
                        } else if( value.status === 2) {
                            $scope.eventData.className = 'completed';
                        }
                        $scope.ev.push($scope.eventData);
                        $scope.eventData = {};
                        // $('#full').fullCalendar( 'renderEvent', $scope.eventData);
                    });
                    // console.log($scope.ev);
                    console.log($scope.ev)
                    $('#full').fullCalendar( 'addEventSource', $scope.ev )
                }, function (errorR) {

                }
            )
            // return $scope.ev;
        };
        $scope.getData();

        $scope.tratamiento = '';
        $scope.pago = '';
        $scope.saveConsulta = function(){
            $scope.consultaData = {tratamiento: $scope.tratamiento , pago: $scope.pago , id_cita: $('#modal2-id').val(), id_tratamiento: '', id_empleado: $('#autocomplete-input-Doctor').val().charAt(0)};

            console.log($scope.consultaData);
            $http.post('/saveConsulta', $scope.consultaData).then(
                function (res) {
                    console.log(res)
                    $scope.consultaData = {tratamiento: '', pago: '', id_cita: '', id_tratamiento: '', id_empleado: ''};
                    swal({
                        title: "Consulta generada exitosamente",
                        text: "Click boton Ok para continuar.",
                        icon: "success",
                    }).then((value) =>{

                        window.location.reload();
                        // $scope.getData();
                    });
                }
            );

        }
        $('#lol').click( function(){

            $scope.backStart = $scope.backStart.split('T')[0] + " " + $scope.timeStart + ":00";
            $scope.backEnd = $scope.backEnd.split('T')[0] + " " + $scope.timeEnd + ":00";

            var temp = '';
            $scope.typeData = {};
            switch ($scope.type) {
                case '':
                case '1':
                    $scope.type = '1';
                    $scope.typeData = {nombre: $scope.tD_name, telefono: $scope.tD_phone, id_cita: '', type: $scope.type};
                    temp = 'NUEVO PACIENTE: '+$scope.tD_name + '\n\n';
                    break;
                case '2':
                    $scope.typeData = {id_paciente: $('#autocomplete-input-pacientes').val().charAt(0), id_cita: '', type: $scope.type};
                    temp = 'PACIENTE: '+ $('#autocomplete-input-pacientes').val().substring(2) + '\n\n';
                    break;
                case '3':
                    $scope.typeData = {id_proveedor: $('#autocomplete-input-provedor').val().charAt(0), id_cita: '', type: $scope.type};
                    temp = 'PROVEEDOR: '+ $('#autocomplete-input-provedor').val().substring(2) + '\n\n';
                    break;
            }
            $scope.title = temp + $scope.title;

            $scope.eventData = {
                title: $scope.title,
                start: $scope.backStart,
                end: $scope.backEnd,
                className: 'available',
                editable: true
            }
            // $scope.ev.push($scope.eventData); //para añadir sin recargar la pagina
            $scope.scheduleData = {
                fecha_inicio: $scope.eventData.start,
                fecha_fin: $scope.eventData.end,
                tipo: $scope.type,
                descripcion: $scope.eventData.title,
                status: 1
            };

            // $('#full').fullCalendar( 'renderEvent', $scope.eventData);
            $('#modal1').modal('close');

            $scope.eventData={};
            $scope.title = '';
            $scope.backStart = '';
            $scope.backEnd = '';
            $scope.timeStart = '';

            $scope.timeEnd = '';
            // console.log($scope.scheduleData)

            $http.post('/saveCita', $scope.scheduleData).then
            (
                function(response)
                {
                    var last_inserted_id = response.data.last_insert_id;

                    $scope.typeData.id_cita = last_inserted_id;

                    $http.post('/saveCitaKind', $scope.typeData).then(
                        function(response) {
                            $scope.scheduleData = {fecha_inicio: '', fecha_fin: '',tipo: '', descripcion: '', status: 1};
                            swal({
                                title: "Agregado Exitosamente",
                                text: "Click boton Ok para continuar.",
                                icon: "success",
                            }).then((value) =>{

                                window.location.reload();
                                // $scope.getData();
                            });
                        },
                        function(errorResponse)
                        {
                            console.log(errorResponse)
                        }
                    );
                },
                function(errorResponse)
                {
                }
            );
        });
    });

    $(document).ready( function () {

        var scope = angular.element("#outer").scope();

        onInit();

        function onInit(){
            $('select').formSelect();

            var TimeStart = $('#icon_prefixT1');
            var TimeEnd = $('#icon_prefixT2');
            TimeStart.clockpicker({
                autoclose: true
            });
            TimeEnd.clockpicker({
                autoclose: true
            });
            TimeStart.click(function(e){
                e.stopPropagation();
                stopInputPropagation('TimeStart');
            });
            TimeEnd.click(function(e){
                e.stopPropagation();
                stopInputPropagation('TimeEnd');
            });

            function stopInputPropagation(inputSelector){
                inputSelector = $(inputSelector);
                inputSelector.clockpicker('show')
                    .clockpicker('toggleView', 'hours');
            }
        }

        $('#full').fullCalendar(
            {
                allDaySlot: false,
                header: {
                    left:   '',
                    center: '',
                    right:  'today prev,next'
                },
                minTime: "07:00:00",
                maxTime: "21:00:00",
                selectable: true,
                defaultView: 'agendaWeek',
                events: scope.ev,
                select: function(start, end, jsEvent, view) {
                    // var allDay = !start.hasTime && !end.hasTime;
                    //                    // alert(["Event Start date: " + moment(start).format().split('T')[0],
                    //     "Event End date: " + moment(end).format().split('T')[0]].join("\n"));
                    $('#modal1').modal();
                    $('#modal1').modal('open');

                    scope.backStart = moment(start).format();
                    scope.backEnd = moment(end).format();

                    scope.timeStart = moment(start).format().split('T')[1].substr(0,5);
                    scope.timeEnd = moment(end).format().split('T')[1].substr(0,5);

                    $('#icon_prefixT2')
                        .val(scope.timeEnd)
                        .trigger('focus', 'change');
                    $('#icon_prefixT1')
                        .val(scope.timeStart)
                        .trigger('focus', 'change');
                    $('#icon_prefix')
                        .trigger('focus');

                },
                eventClick:  function(event, jsEvent, view) {

                    $('#modal2').modal();
                    $('#modal2').modal('open');
console.log(event)
                    $('#modal2-start').html ('<b>Hora de inicio: </b>'+ moment(event.start).format().replace('T', ' '));
                    $('#modal2-end').html ('<b>Hora de finalización: </b>'+ moment(event.end).format().replace('T', ' '));
                    $('#modal2-title').html ('<b>Descripción: </b>'+ event.title);
                    $('#modal2-id').val(event.id)

                    if(event.className == 'available'){
                        $('#selectType2').find('option[value=""]').prop('selected', true);
                    } else if(event.className == 'NoAvailable'){
                        $('#selectType2').find('option[value="2"]').prop('selected', true);
                    } else if(event.className == 'completed'){
                        $('#selectType2').find('option[value="3"]').prop('selected', true);
                    }

                    $('#selectType2').formSelect();
                    // $('#selectType2').material_select();
                },
                eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {

                    console.log(scope.ev);
                    alert(
                        event.title + " was moved " +
                        dayDelta + " days and " +
                        minuteDelta + " minutes."
                    );

                    // if (!confirm("Are you sure about this change?")) {
                    //     revertFunc();
                    // }

                }
            }
        );

    });

</script>
@endsection
@endsection
