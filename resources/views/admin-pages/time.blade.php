@extends('layouts.admin_template')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                {{--<h1 class="page-header text-center">داشبورد</h1>--}}
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($times as $time)
                        @if(isset($time->specialties[0]))
                            <tr>
                                <td>{{$clinics[$time->clinic -1]->title}}</td>
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
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="text-center">ذخیره تایم جدید</h2>
                    <form action="/admin-panel/time/insert" method="post">
                        <label for="day_w" class="dir_rtl floatright">تخصص :</label>
                        <select name="specialty" class="form-control dir_rtl" id="specialty">
                            <option value="">...</option>
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->title }}</option>
                            @endforeach
                        </select><br>
                        {{ csrf_field() }}
                        <label for="doc_name" class="floatright dir_rtl"> نام دکتر :</label>
                        <div id="doc_div">
                            <select name="name" class="form-control" id="">
                                <option>...</option>
                            </select>
                        </div>
                        <br>
                        <label for="cli_name" class="floatright dir_rtl"> نام درمانگاه :</label>
                        <div id="clin_div">
                            <select name="" class="form-control" id="">
                                <option>...</option>
                            </select>
                        </div>
                        <br>
                        <label for="week_d" class="floatright dir_rtl">ایام هفته :</label>
                        <select name="week_d" id="" class="form-control">
                            <option value="شنبه-صبح">شنبه-صبح</option>
                            <option value="شنبه-بعدظهر">شنبه-بعدظهر</option>
                            <option value="یکشنبه-صبح">یکشنبه-صبح</option>
                            <option value="یکشنبه-بعدظه">یکشنبه-بعدظهر</option>
                            <option value="دوشنبه-صبح">دوشنبه-صبح</option>
                            <option value="دوشنبه-بعدظهر">دوشنبه-بعدظهر</option>
                            <option value="سه شنبه-صبح">سه شنبه-صبح</option>
                            <option value="سه شنبه-بعدظهر">سه شنبه-بعدظهر</option>
                            <option value="چهارشنبه-صبح">چهارشنبه-صبح</option>
                            <option value="چهارشنبه-بعدظهر">چهارشنبه-بعدظهر</option>
                            <option value="پنجشنبه-صبح">پنج شنبه-صبح</option>
                            <option value="چهارشنبه-بعدظهر">پنج شنبه-بعدظهر</option>
                        </select><br>
                        <label class="dir_rtl floatright" for="day">در تاریخ : </label>
                        <input type="text" id="pcal1" class="pdate" name="day"><br><br>
                        <label class="dir_rtl floatright" for="day">از ساعت : </label>
                        <input type="time" class="form-control" name="from" style="width: 40%"><br>
                        <label class="dir_rtl floatright" for="day">تا ساعت : </label>
                        <input type="time" class="form-control" name="until" style="width: 40%">
                        <br>
                        <label class="dir_rtl floatright" for="ave_time">زمان تقریبی برای هر بیمار (بر حسب دقیقه)
                            : </label>
                        <input type="number" class="form-control" min="0" max="60" name="ave_time" value="15"
                               style="width: 40%">
                        <br>
                        <br>
                        <br>
                        <input type="submit" class="btn btn-primary " value="ذخیره">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var day = "";
        $('#specialty').on('change', function () {
            $.ajax({
                url: '/admin-panel/first_ajax',
                method: 'get',
                type: 'get',
                data: {
                    "day_w": $(this).val()
                },
                success: function (response) {
                    var res = "<select class = 'form-control dir_rtl' name='name' id='doctor'><option value=''>...</option>";
                    for (var i in response) {
                        res += "<option value = " + response[i]['id'] + ">" + response[i]['name'] + "</option>";
                    }
                    res += "</select>"
                    $('#doc_div').html(res);

                    $('#doctor').on('change', function () {
                        $.ajax({
                            url: '/admin-panel/second_ajax',
                            method: 'get',
                            type: 'get',
                            data: {
                                "doc_id": $(this).val()
                            },
                            success: function (response) {
                                console.log(response);
                                var res_2 = "<select class = 'form-control dir_rtl' name=clinic><option value=''>...</option>";
                                for (var i in response) {
                                    res_2 += "<option value = " + response[i]['id'] + ">" + response[i]['title'] + "</option>";
                                }
                                res_2 += "</select>"
                                $('#clin_div').html(res_2)
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