@extends('layouts.Template-1')
<style>
    .danger{
        color: red;
    }
</style>
@section('content-1')
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <form action="/search#result" method="get">
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
                        <select class = 'form-control dir_rtl' id='specialty' name=specialty>
                            <option value=''>...</option>
                        </select>
                    </span>
                    <br>
                    <label for="doctor" class="dir_rtl floatright">نام پزشک :</label>
                    <span id="doctor_res">
                        <select class = 'form-control dir_rtl' id='doctor' name=doctor>
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
    </div>
    @if(isset($times))
        <div class="container" id="result">
            <div class="col-sm-10 col-sm-offset-1">
                <h2 class="centeralign wow fadeInDown animated">نتایج جستجو</h2>
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
                        <tr>
                            <td>{{$clinic_s->title}}</td>
                            <td>{{$time->doctor->name}}</td>
                            <td>{{ $time->specialties[0]->title }}</td>
                            <td>{{ $time->week_d }}</td>
                            <td>{{ substr($time->day,0,10) }}</td>
                            <td>{{ substr($time->from,0,5) }}</td>
                            <td>{{ $time->sick_num }}</td>
                            <td>
                                @if($time->sick_num > 0)
                                    <a href="/turn/{{ $time->id }}"><button class="btn btn-success" id="">رزرو نوبت</button></a>
                                @else
                                <span class="danger"><b>پر شده</b></span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $times->links() }}
    @endif
    <script>
        $('#clinic_id').on('change',function(){
           $.ajax({
            url : "/search/first_ajax",
            method : "get",
            type: 'get',
            data : {
                "clinic_id" : $(this).val()
        },
            success : function (response) {
                var res = "<select class = 'form-control dir_rtl' id='specialty' name=specialty><option value=''>...</option>";
                for (var i in response) {
                    res += "<option value = " + response[i]['id'] + ">" + response[i]['title'] + "</option>";
                }
                res += "</select>";
                $('#specialty_res').html(res);

                $("#specialty").on("change",function () {
                    $.ajax({
                        url : "/search/second_ajax",
                        method : "get",
                        data : {
                            "specialty_id" : $(this).val()
                        },
                    success : function (response) {
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
    </script>

@endsection

@section('content-2')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2 class="centeralign wow bounce animated">جستجوی نوبت های رزرو شده</h2>
                <hr>
                <form action="/search_turn">
                    <label for="" class="dir_rtl floatright">کد ملی :</label>
                    <br>
                    <input type="text" name="meli_code" class="form-control" placeholder="شماره ملی خود را وارد کنید">
                    <br>
                    <button class="btn btn-primary pull-left">جستجو</button>
                </form>
            </div>
        </div>
    </div>
@endsection