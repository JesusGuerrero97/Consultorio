@extends('footer')
@extends('header')

@section('header')
@parent

<!--http://jsfiddle.net/weareoutman/YkvK9/ //picker-->

<div id="outer" ng-controller="crtl">
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
                        <div class="row">
                            <div class="input-field col s1"></div>
                            <div class="input-field col s10">
                                <i class="material-icons prefix">search</i>
                                <input type="text" id="autocomplete-input" class="autocomplete" autocomplete="false" >
                                <label for="autocomplete-input">Buscar paciente</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn modal-close waves-effect red accent-2 btn">Cancelar</button>
            <button class="btn" ng-click="schedule()">Agendar</button>
        </div>
    </div>
    <div class="p-5">
        <div id="full"></div>
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
        $scope.type = '';
        $scope.title = ''
        $scope.timeStart = "";
        $scope.timeEnd = "";
        $scope.backStart = '';
        $scope.backEnd = '';

        $scope.pacientList = [];
        $scope.pacientListTemp = {};

        $scope.scheduleData = {fecha_inicio: '', fecha_fin: '',tipo: '', descripcion: '', status: 1};
        $scope.eventData = {};
        $scope.ev = [];

        //checar opcion seleccionada de cita type
        $("#selectType").on('change', function() {
            if($(this).val() === '2') {
                console.log($(this).val());
            }
        });


        // autocomplete para seleccionar paciente.
        $(function() {

            $http.get('/getPac').then
            (
                function(response)
                {
                    $scope.pacientList = response.data;

                    $scope.pacientList.forEach( function(item) {
                        $scope.pacientListTemp[item.id + ' ' + item.name] = null;
                    });

                    // /update autocomplete
                    $('input.autocomplete').autocomplete({
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


            // /inicializar
            $('input.autocomplete').autocomplete({
                data: {
                    "Website Performance": null,
                }
            });
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

        $scope.schedule = function(){

            $scope.backStart = $scope.backStart.split('T')[0] + " " + $scope.timeStart + ":00";
            $scope.backEnd = $scope.backEnd.split('T')[0] + " " + $scope.timeEnd + ":00";

            var temp = '';
            $scope.typeData = {};
            switch ($scope.type) {
                case '':
                    $scope.type = '1';
                    temp = 'NUEVA \n'
                    break;
                case '2':
                    temp = 'PACIENTE \n';
                    // $scope.typeData = {};
                    // console.log($('#autocomplete-input').val().charAt(0));
                    break;
                case '3':
                    temp = 'PROVEEDOR \n'
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
            $scope.ev.push($scope.eventData);
            $scope.scheduleData = {
                fecha_inicio: $scope.eventData.start,
                fecha_fin: $scope.eventData.end,
                tipo: $scope.type,
                descripcion: $scope.eventData.title,
                status: 1
            };

            $('#full').fullCalendar( 'renderEvent', $scope.eventData);
            $('#modal1').modal('close');

            $scope.eventData={};
            $scope.title = '';
            $scope.backStart = '';
            $scope.backEnd = '';
            $scope.timeStart = '';

            $scope.timeEnd = '';
            console.log($scope.scheduleData)
            $http.post('/saveCita', $scope.scheduleData).then
            (
                function(response)
                {
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
                }
            );
        }
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
                eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {

                    console.log(scope.ev);
                    alert(
                        event.title + " was moved " +
                        dayDelta + " days and " +
                        minuteDelta + " minutes."
                    );

                    if (!confirm("Are you sure about this change?")) {
                        revertFunc();
                    }

                }
            }
        );

    });

</script>
@endsection
@endsection
