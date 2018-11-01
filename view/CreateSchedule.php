<?php
include_once __DIR__.'/./reusable/Session.php';
include_once __DIR__.'/./reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateSchedule.php"><i class="fa fa-arrow-circle-right"></i> Crear Horario</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <!--<div class="row">-->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- GROUP -->
            <div class="form-group">
                <label>Grupo</label>
                <select id="group" name="course" class="form-control">
                </select>
            </div>
            <!--PROFESSOR-->
            <div class="form-group" id="divProfessor">
                <label>Profesor</label>
                <select id="professor" name="professor" class="form-control">
                </select>
            </div>
            <!--MODULE-->
            <div class="form-group" id="divModule">
                <label>Módulo</label>
                <select id="module" name="course" class="form-control">
                </select>
            </div>
        </div>
    </div>

    <!--<div class="col-md-6">-->
    <div class="box" id="schedule">

        <!--CREATE SCHEDULE-->
        <div class="box-footer" style="text-align: center">
            <button onclick="SetSchedule();" class="btn btn-primary">Establecer horario</button>
        </div>

        <div class="box-body no-padding">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <tr>
                        <th style="width: 120px">Hora / Día</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miercoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                    <!--MORNING-->
                    <!--HOUR 7:00AM - 7:40AM-->
                    <tr>
                        <td>7:00am-7:40am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-1-1"></span>
                            <!-- checkbox -->
                            <input id="c-1-1" value="1-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-1-2" ></span>
                            <!-- checkbox -->
                            <input id="c-1-2" value="1-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-1-3" ></span>
                            <!-- checkbox -->
                            <input id="c-1-3" value="1-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-1-4" ></span>
                            <!-- checkbox -->
                            <input id="c-1-4" value="1-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-1-5" ></span>
                            <!-- checkbox -->
                            <input id="c-1-5" value="1-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 7:40AM - 8:20AM-->
                    <tr>
                        <td>7:40am-8:20am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-2-1" ></span>
                            <!-- checkbox -->
                            <input id="c-2-1" value="2-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-2-2" ></span>
                            <!-- checkbox -->
                            <input id="c-2-2" value="2-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-2-3" ></span>
                            <!-- checkbox -->
                            <input id="c-2-3" value="2-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-2-4" ></span>
                            <!-- checkbox -->
                            <input id="c-2-4" value="2-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-2-5" ></span>
                            <!-- checkbox -->
                            <input id="c-2-5" value="2-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 8:20AM - 9:00AM-->
                    <tr>
                        <td>8:20am-9:00am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-3-1" ></span>
                            <!-- checkbox -->
                            <input id="c-3-1" value="3-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-3-2" ></span>
                            <!-- checkbox -->
                            <input id="c-3-2" value="3-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-3-3" ></span>
                            <!-- checkbox -->
                            <input id="c-3-3" value="3-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-3-4" ></span>
                            <!-- checkbox -->
                            <input id="c-3-4" value="3-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-3-5" ></span>
                            <!-- checkbox -->
                            <input id="c-3-5" value="3-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >RECREO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >RECREO</td>
                    </tr>
                    <!--HOUR 9:10AM - 9:50AM-->
                    <tr>
                        <td>9:10am-9:50am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-4-1" ></span>
                            <!-- checkbox -->
                            <input id="c-4-1" value="4-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-4-2" ></span>
                            <!-- checkbox -->
                            <input id="c-4-2"value="4-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-4-3" ></span>
                            <!-- checkbox -->
                            <input id="c-4-3" value="4-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-4-4" ></span>
                            <!-- checkbox -->
                            <input id="c-4-4" value="4-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-4-5" ></span>
                            <!-- checkbox -->
                            <input id="c-4-5" value="4-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 9:50AM - 10:30AM-->
                    <tr>
                        <td>9:50am-10:30am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-5-1" ></span>
                            <!-- checkbox -->
                            <input id="c-5-1" value="5-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-5-2" ></span>
                            <!-- checkbox -->
                            <input id="c-5-2" value="5-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-5-3" ></span>
                            <!-- checkbox -->
                            <input id="c-5-3" value="5-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-5-4" ></span>
                            <!-- checkbox -->
                            <input id="c-5-4" value="5-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-5-5" ></span>
                            <!-- checkbox -->
                            <input id="c-5-5" value="5-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >RECREO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >RECREO</td>
                    </tr>
                    <!--HOUR 10:40AM - 11:20AM-->
                    <tr>
                        <td>10:40am-11:20am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-6-1" ></span>
                            <!-- checkbox -->
                            <input id="c-6-1" value="6-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-6-2" ></span>
                            <!-- checkbox -->
                            <input id="c-6-2" value="6-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-6-3" ></span>
                            <!-- checkbox -->
                            <input id="c-6-3" value="6-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-6-4" ></span>
                            <!-- checkbox -->
                            <input id="c-6-4" value="6-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-6-5" ></span>
                            <!-- checkbox -->
                            <input id="c-6-5" value="6-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 11:20AM - 12:00MM-->
                    <tr>
                        <td>11:20am-12:00mm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-7-1" ></span>
                            <!-- checkbox -->
                            <input id="c-7-1" value="7-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-7-2" ></span>
                            <!-- checkbox -->
                            <input id="c-7-2" value="7-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-7-3" ></span>
                            <!-- checkbox -->
                            <input id="c-7-3" value="7-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-7-4" ></span>
                            <!-- checkbox -->
                            <input id="c-7-4" value="7-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-7-5" ></span>
                            <!-- checkbox -->
                            <input id="c-7-5" value="7-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 12:00MM - 12:40MM-->
                    <tr>
                        <td>12:00am-12:40mm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-8-1" ></span>
                            <!-- checkbox -->
                            <input id="c-8-1" value="8-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-8-2" ></span>
                            <!-- checkbox -->
                            <input id="c-8-2" value="8-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-8-3" ></span>
                            <!-- checkbox -->
                            <input id="c-8-3" value="8-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-8-4" ></span>
                            <!-- checkbox -->
                            <input id="c-8-4" value="8-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-8-5" ></span>
                            <!-- checkbox -->
                            <input id="c-8-5" value="8-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >ALMUERZO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >ALMUERZO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >ALMUERZO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >ALMUERZO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >ALMUERZO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >ALMUERZO</td>
                    </tr>

                    <!--AFTERNOON-->
                    <!--HOUR 12:20:00MM - 1:00PM-->
                    <tr>
                        <td>12:20mm-1:00pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-9-1" ></span>
                            <!-- checkbox -->
                            <input id="c-9-1" value="9-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-9-2" ></span>
                            <!-- checkbox -->
                            <input id="c-9-2" value="9-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-9-3" ></span>
                            <!-- checkbox -->
                            <input id="c-9-3" value="9-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-9-4" ></span>
                            <!-- checkbox -->
                            <input id="c-9-4" value="9-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-9-5" ></span>
                            <!-- checkbox -->
                            <input id="c-9-5" value="9-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 1:00PM - 1:40PM-->
                    <tr>
                        <td>1:00pm-1:40pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-10-1" ></span>
                            <!-- checkbox -->
                            <input id="c-10-1" value="10-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-10-2" ></span>
                            <!-- checkbox -->
                            <input id="c-10-2" value="10-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-10-3" ></span>
                            <!-- checkbox -->
                            <input id="c-10-3" value="10-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-10-4" ></span>
                            <!-- checkbox -->
                            <input id="c-10-4" value="10-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-10-5" ></span>
                            <!-- checkbox -->
                            <input id="c-10-5" value="10-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 1:40PM - 2:20PM-->
                    <tr>
                        <td>1:40pm-2:20pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-11-1" ></span>
                            <!-- checkbox -->
                            <input id="c-11-1" value="11-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-11-2" ></span>
                            <!-- checkbox -->
                            <input id="c-11-2" value="11-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-11-3" ></span>
                            <!-- checkbox -->
                            <input id="c-11-3" value="11-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-11-4" ></span>
                            <!-- checkbox -->
                            <input id="c-11-4" value="11-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-11-5" ></span>
                            <!-- checkbox -->
                            <input id="c-11-5" value="11-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >RECREO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >RECREO</td>
                    </tr>
                    <!--HOUR 2:30PM - 3:10PM-->
                    <tr>
                        <td>2:30pm-3:10pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-12-1" ></span>
                            <!-- checkbox -->
                            <input id="c-12-1" value="12-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-12-2" ></span>
                            <!-- checkbox -->
                            <input id="c-12-2" value="12-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-12-3" ></span>
                            <!-- checkbox -->
                            <input id="c-12-3" value="12-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-12-4" ></span>
                            <!-- checkbox -->
                            <input id="c-12-4" value="12-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-12-5" ></span>
                            <!-- checkbox -->
                            <input id="c-12-5" value="12-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 3:10PM - 3:50PM-->
                    <tr>
                        <td>3:10pm-3:50pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-13-1" ></span>
                            <!-- checkbox -->
                            <input id="c-13-1" value="13-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-13-2" ></span>
                            <!-- checkbox -->
                            <input id="c-13-2" value="13-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-13-3" ></span>
                            <!-- checkbox -->
                            <input id="c-13-3" value="13-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-13-4" ></span>
                            <!-- checkbox -->
                            <input id="c-13-4" value="13-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-13-5" ></span>
                            <!-- checkbox -->
                            <input id="c-13-5" value="13-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >RECREO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >RECREO</td>
                    </tr>
                    <!--HOUR 4:00PM - 4:40PM-->
                    <tr>
                        <td>4:00pm-4:40pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-14-1" ></span>
                            <!-- checkbox -->
                            <input id="c-14-1" value="14-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-14-2" ></span>
                            <!-- checkbox -->
                            <input id="c-14-2" value="14-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-14-3" ></span>
                            <!-- checkbox -->
                            <input id="c-14-3" value="14-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-14-4" ></span>
                            <!-- checkbox -->
                            <input id="c-14-4" value="14-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-14-5" ></span>
                            <!-- checkbox -->
                            <input id="c-14-5" value="14-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 4:40PM - 5:20PM-->
                    <tr>
                        <td>4:40pm-5:20pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-15-1" ></span>
                            <!-- checkbox -->
                            <input id="c-15-1" value="15-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-15-2" ></span>
                            <!-- checkbox -->
                            <input id="c-15-2" value="15-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-15-3" ></span>
                            <!-- checkbox -->
                            <input id="c-15-3" value="15-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-15-4" ></span>
                            <!-- checkbox -->
                            <input id="c-15-4" value="15-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-15-5" ></span>
                            <!-- checkbox -->
                            <input id="c-15-5" value="15-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >NOCHE</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                    </tr>
                    
                    <!--NIGHT-->
                    <!--HOUR 5:30PM - 6:05PM-->
                    <tr>
                        <td>5:30PM-6:05pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-16-1" ></span>
                            <!-- checkbox -->
                            <input id="c-16-1" value="16-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-16-2" ></span>
                            <!-- checkbox -->
                            <input id="c-16-2" value="16-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-16-3" ></span>
                            <!-- checkbox -->
                            <input id="c-16-3" value="16-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-16-4" ></span>
                            <!-- checkbox -->
                            <input id="c-16-4" value="16-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-16-5" ></span>
                            <!-- checkbox -->
                            <input id="c-16-5" value="16-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 6:05PM - 6:40PM-->
                    <tr>
                        <td>6:05pm-6:40pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-17-1" ></span>
                            <!-- checkbox -->
                            <input id="c-17-1" value="17-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-17-2" ></span>
                            <!-- checkbox -->
                            <input id="c-17-2" value="17-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-17-3" ></span>
                            <!-- checkbox -->
                            <input id="c-17-3" value="17-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-17-4" ></span>
                            <!-- checkbox -->
                            <input id="c-17-4" value="17-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-17-5" ></span>
                            <!-- checkbox -->
                            <input id="c-17-5" value="17-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 6:40PM - 7:15PM-->
                    <tr>
                        <td>6:40pm-7:15pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-18-1" ></span>
                            <!-- checkbox -->
                            <input id="c-18-1" value="18-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-18-2" ></span>
                            <!-- checkbox -->
                            <input id="c-18-2" value="18-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-18-3" ></span>
                            <!-- checkbox -->
                            <input id="c-18-3" value="18-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-18-4" ></span>
                            <!-- checkbox -->
                            <input id="c-18-4" value="18-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-18-5" ></span>
                            <!-- checkbox -->
                            <input id="c-18-5" value="18-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >RECREO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >RECREO</td>
                    </tr>
                    <!--HOUR 7:25PM - 8:00PM-->
                    <tr>
                        <td>7:25pm-8:00pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-19-1" ></span>
                            <!-- checkbox -->
                            <input id="c-19-1" value="19-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-19-2" ></span>
                            <!-- checkbox -->
                            <input id="c-19-2" value="19-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-19-3" ></span>
                            <!-- checkbox -->
                            <input id="c-19-3" value="19-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-19-4" ></span>
                            <!-- checkbox -->
                            <input id="c-19-4" value="19-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-19-5" ></span>
                            <!-- checkbox -->
                            <input id="c-19-5" value="19-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 8:00PM - 8:35PM-->
                    <tr>
                        <td>8:00pm-8:35pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-20-1" ></span>
                            <!-- checkbox -->
                            <input id="c-20-1" value="20-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-20-2" ></span>
                            <!-- checkbox -->
                            <input id="c-20-2" value="20-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-20-3" ></span>
                            <!-- checkbox -->
                            <input id="c-20-3" value="20-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-20-4" ></span>
                            <!-- checkbox -->
                            <input id="c-20-4" value="20-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-20-5" ></span>
                            <!-- checkbox -->
                            <input id="c-20-5" value="20-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >RECREO</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >RECREO</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >RECREO</td>
                    </tr>
                    <!--HOUR 8:40PM - 9:15PM-->
                    <tr>
                        <td>8:40pm-9:15pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-21-1" ></span>
                            <!-- checkbox -->
                            <input id="c-21-1" value="21-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-21-2" ></span>
                            <!-- checkbox -->
                            <input id="c-21-2" value="21-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-21-3" ></span>
                            <!-- checkbox -->
                            <input id="c-21-3" value="21-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-21-4" ></span>
                            <!-- checkbox -->
                            <input id="c-21-4" value="21-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-21-5" ></span>
                            <!-- checkbox -->
                            <input id="c-21-5" value="21-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    <!--HOUR 9:15PM - 9:50PM-->
                    <tr>
                        <td>9:15pm-9:50pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-22-1" ></span>
                            <!-- checkbox -->
                            <input id="c-22-1" value="22-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-22-2" ></span>
                            <!-- checkbox -->
                            <input id="c-22-2" value="22-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-22-3" ></span>
                            <!-- checkbox -->
                            <input id="c-22-3" value="22-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-22-4" ></span>
                            <!-- checkbox -->
                            <input id="c-22-4" value="22-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-22-5" ></span>
                            <!-- checkbox -->
                            <input id="c-22-5" value="22-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div><!-- /.box-body -->

        <br>
        <br>
        <!--CREATE SCHEDULE-->
        <div class="box-footer" style="text-align: center">
            <button onclick="SetSchedule();" class="btn btn-primary">Establecer Horario</button>
        </div>
    </div><!-- /.box -->
    <!--</div> /.col -->

</section><!-- /.content -->
<br>
<?php
include_once __DIR__.'/./reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    (function ($) {
        $.get = function (key) {
            key = key.replace(/[\[]/, '\\[');
            key = key.replace(/[\]]/, '\\]');
            var pattern = "[\\?&]" + key + "=([^&#]*)";
            var regex = new RegExp(pattern);
            var url = unescape(window.location.href);
            var results = regex.exec(url);
            if (results === null) {
                return null;
            } else {
                return results[1];
            }
        }
    })(jQuery);
    var action = $.get("action");
    var msg = $.get("msg");
    if (action === "1") {
        msg = msg.replace(/_/g, " ");
        alertify.success(msg);
    }
    if (action === "0") {
        msg = msg.replace(/_/g, " ");
        alertify.error(msg);
    }

    $(function () {
        $("#example1").dataTable();
        hideDiv();
        groups();
        professors();
    });

    function hideDiv() {
        $("#schedule").hide();
        $("#divProfessor").hide();
        $("#divModule").hide();
    }

    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }

    function showCheck() {
        $("input[name=check]").each(function (index) {
            $(this).show();
        });
    }

    function clearSpan() {

        for (var i = 1; i < 15; i++) {
            $("#s-" + i + "-1").html("");
            $("#s-" + i + "-2").html("");
            $("#s-" + i + "-3").html("");
            $("#s-" + i + "-4").html("");
            $("#s-" + i + "-5").html("");
        }
    }

    function schedule() {
        var parameters = {
            "group": $("#group").val()
        };
        $.ajax({
            type: 'POST',
            url: "../business/GetScheduleByGroup.php",
            data: parameters,
            success: function (data)
            {
                var schedules = JSON.parse(data);
                var bool = false;
                $.each(schedules, function (i, item) {
                    bool = true;
                    $("#c-" + item.groupschedulehour + "-" + item.groupscheduleday).hide();
                    $("#s-" + item.groupschedulehour + "-" + item.groupscheduleday).html(item.coursecode);
                });

                if (!bool) {
                    clearSpan();
                    showCheck();
                }
            },
            error: function ()
            {
                alertify.error("Error de horario...");
            }
        });
    }

    function SetSchedule() {

        if ($('#group').val() === "0") {
            alertify.error("Seleccione un módulo");
            return false;
        }

        if ($('#professor').val() === "0") {
            alertify.error("Seleccione un profesor");
            return false;
        }

        if ($('#module').val() === "0") {
            alertify.error("Seleccione un módulo");
            return false;
        }

        var bool = false;
        var schedule = "";
        var hours = "";
        var days = "";

        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                bool = true;
                schedule = $(this).val().split("-");
                hours += schedule[0] + ",";
                days += schedule[1] + ",";
            }
        });

        hours = hours.substr(0, hours.length - 1);
        days = days.substr(0, days.length - 1);

        if (!bool) {
            alertify.error("Seleccione al menos una clase");
            return false;
        }

        createSchedule(hours, days);
    }

    function createSchedule(hours, days) {

        var parameters = {
            "group": $("#group").val(),
            "professor": $("#professor").val(),
            "module": $("#module").val(),
            "hours": hours,
            "days": days
        };
        $.ajax({
            type: 'POST',
            url: "../business/CreateScheduleAction.php",
            data: parameters,
            success: function (data)
            {
                if (data == true) {
                    alertify.success("Horario creado correctamente!");
                    clearCheck();
                    schedule();
                } else {
                    alertify.error("Upps! Ha ocurrido un error!");
                }
            },
            error: function ()
            {
                alertify.error("Error de horario...");
            }
        });
    }

    function groups() {
        $.ajax({
            type: 'GET',
            url: "../business/GetGroups.php",
            success: function (data)
            {
                var group = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccione un grupo</OPTION>';
                var bool = 0;
                $.each(group, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.number + '</OPTION>';
                });

                if (bool == 1) {
                    $("#group").html(htmlCombo);
                } else {
                    alertify.error("No se encuentran grupos registrados");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    var htmlProfesor = "";
    function professors() {
        $.ajax({
            url: "../business/GetProfessor.php",
            success: function (data)
            {
                var professor = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccione un profesor</OPTION>';
                var bool = 0;
                var name;
                $.each(professor, function (i, item) {
                    bool = 1;
                    name = item.personfirstname + " " + item.personfirstlastname + " " + item.personsecondlastname;
                    htmlCombo += '<OPTION VALUE="' + item.personid + '">' + name + '</OPTION>';
                });

                if (bool == 1) {
                    htmlProfesor = htmlCombo;
                    $("#professor").html(htmlProfesor);
                } else {
                    alertify.error("No se encuentran profesores registrados");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    var htmlModule;
    function module() {

        var parameters = {
            "professor": $("#professor").val()
        };

        $.ajax({
            type: 'POST',
            url: "../business/GetCourses.php",
            data: parameters,
            success: function (data)
            {
                var professor = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccione un módulo</OPTION>';
                var bool = 0;
                $.each(professor, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.courseid + '">' + item.coursecode + ' - ' + item.coursename + '</OPTION>';
                });

                if (bool == 1) {
                    htmlModule = htmlCombo;
                    $("#module").html(htmlModule);
                } else {
                    alertify.error("No se encuentran módulos registrados para este profesor");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    // FUNCTION SELECT ------------------------------------------------
    $('#group').on('change', function () {
        if ($(this).val() !== "0") {
            $("#divProfessor").show();
            clearCheck();
            clearSpan();
            showCheck();
            schedule();
        } else {
            $("#professor").html(htmlProfesor);
            hideDiv();
        }
    }
    );

    $('#professor').on('change', function () {
        if ($(this).val() !== "0") {
            $("#module").html(htmlModule);
            $("#divModule").show();
            module();
            clearCheck();
        } else {
            $("#divModule").hide();
            $("#schedule").hide();
        }
    }
    );

    $('#module').on('change', function () {
        if ($(this).val() !== "0") {
            $("#schedule").show();
            clearCheck();
        } else {
            $("#schedule").hide();
        }
    }
    );


</script>

