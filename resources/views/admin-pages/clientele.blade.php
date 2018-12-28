@extends('layouts.admin_template')
<style>


    .danger {
        color: red;
    }
</style>
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <form action="/admin-panel/search" method="get">
                    <label for="clinic_id" class="dir_rtl floatright">نام درمانگاه :</label>
                    <select name="clinic_id" id="clinic_id" class="form-control dir_rtl">
                        <option value="">...</option>
                        @foreach($clinics as $clinic)
                            <option value="{{ $clinic->id }}">{{ $clinic->title }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="specialty" class="dir_rtl floatright">تخصص :</label>
                    <span id="specialty_res">
                        <select class='form-control dir_rtl' id='specialty' name=specialty>
                            <option value=''>...</option>
                        </select>
                    </span>
                    <br>
                    <label for="doctor" class="dir_rtl floatright">نام پزشک :</label>
                    <span id="doctor_res">
                        <select class='form-control dir_rtl' id='doctor' name=doctor>
                            <option value=''>...</option>
                        </select>
                    </span>
                    <br>
                    <input type="submit" class="btn btn-primary pull-left" value="جستجو">
                </form>
                <br>
                <br>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading centeralign">جسنجو بر اساس تاریخ</div>
                    <div class="panel-body">
                        <form action="/admin-panel/time/search" method="get">
                            <div class="dir_rtl">
                                <label for="pcal2">از تایخ :</label><input type="text" id="pcal2" class="pdate"
                                                                           name="from"><br><br>
                            </div>
                            <br>
                            <div class="dir_rtl">
                                <label for="pcal1">تا تاریخ :</label><input type="text" id="pcal1" class="pdate"
                                                                            name="until"><br><br>
                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($times))
            <div class="container">
                <div class="col-sm-10 col-sm-offset-1">
                    <h2 class="centeralign">نتایج جستجو</h2>
                    <table class="table table-striped dir_rtl">
                        <thead>
                        <tr>
                            <th>نام درمانگاه</th>
                            <th>نام پزشک</th>
                            <th>تخصص</th>
                            <th>روز</th>
                            <th>تاریخ</th>
                            <th>از ساعت</th>
                            <th>نوبت های خالی</th>
                            <th>رزرو</th>
                            <th>مراجعین</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($times as $time)
                            <tr>
                                <td>{{$clinics[$time->clinic - 1]->title}}</td>
                                <td>{{$time->doctor->name}}</td>
                                <td>{{ $time->specialties[0]->title }}</td>
                                <td>{{ $time->week_d }}</td>
                                <td>{{ substr($time->day,0,10) }}</td>
                                <td>{{ substr($time->from,0,5) }}</td>
                                <td>{{ $time->sick_num }}</td>
                                <td>
                                    @if($time->sick_num > 0)
                                        <a href="/turn/{{ $time->id }}">
                                            <button class="btn btn-primary" id="">رزرو نوبت</button>
                                        </a>
                                    @else
                                        <span class="danger"><b>پر شده</b></span>
                                    @endif
                                </td>
                                <td><a href="/admin-panel/clientele/{{ $time->id }}"><span
                                                class="label label-info">برو به</span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    <script>
        $('#clinic_id').on('change', function () {
            $.ajax({
                url: "/search/first_ajax",
                method: "get",
                type: 'get',
                data: {
                    "clinic_id": $(this).val()
                },
                success: function (response) {
                    var res = "<select class = 'form-control dir_rtl' id='specialty' name=specialty><option value=''>...</option>";
                    for (var i in response) {
                        res += "<option value = " + response[i]['id'] + ">" + response[i]['title'] + "</option>";
                    }
                    res += "</select>";
                    $('#specialty_res').html(res);

                    $("#specialty").on("change", function () {
                        $.ajax({
                            url: "/search/second_ajax",
                            method: "get",
                            data: {
                                "specialty_id": $(this).val()
                            },
                            success: function (response) {
                                var res_2 = "<select class = 'form-control dir_rtl' id='doctor' name=doctor><option value=''>...</option>";
                                for (var i in response) {
                                    res_2 += "<option value = " + response[i]['id'] + ">" + response[i]['name'] + "</option>";
                                }
                                res_2 += "</select>";
                                $('#doctor_res').html(res_2);
                            }
                        });
                    });
                }
            });
        });
        var objCal1 = new AMIB.persianCalendar('pcal1');

        var objCal2 = new AMIB.persianCalendar('pcal2', {
                initialDate: "{{ substr(jdate(),0,10) }}",
            }
        );

        var objCal3 = new AMIB.persianCalendar('pcal3', {
                defaultDate: '1401/12/12'
            }
        );

        var objCal4 = new AMIB.persianCalendar('pcal4', {
                onchange: function (pdate) {
                    if (pdate) {
                        alert(pdate.join('/'));
                    } else {
                        alert('تاریخ واردشده نادرست است');
                    }
                }
            }
        );

        var objCal5 = new AMIB.persianCalendar('pcal5', {
                extraInputID: 'extra',
                extraInputFormat: 'YYYY/MM/DD - yyyy/mm/dd - JD'
            }
        );
    </script>

@endsection