@extends('layouts.admin_template')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">پزشکان</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="panel doctor-panel panel-primary">
                        <div class="panel-heading centeralign"><h4>لیست پزشکان</h4></div>
                        <div class="panel-body">
                            <ul class="list-group dir_rtl">
                                @foreach($doctors as $doctor)
                                    <li class="list-group-item">
                                        <a href="/admin-panel/doctor/info/{{ $doctor->id }}">{{ $doctor->name }}</a>
                                        <span class="label label-danger pull-left"><a
                                                    href="/admin-panel/doctor/delete/{{ $doctor->id }}">حذف</a></span>
                                        @foreach($doctor->specialties as $specialty)
                                            <span class="label label-info pull-left">{{ $specialty->title }}</span>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="text-center">ذخیره پزشک جدید</h2>
                    <form action="/admin-panel/doctor/insert">
                        <label for="name" class="dir_rtl floatright">نام پزشک :</label>
                        <input type="text" name="name" class="form-control dir_rtl" placeholder="نام پزشک">
                        <br>
                        <label for="name" class="dir_rtl floatright">تخصص :</label>
                        <select name="specialty_id" id="" class="form-control dir_rtl">
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->title }}</option>
                            @endforeach
                        </select>
                        <br>
                        <div class="floatright dir_rtl"><a href="#" id="add">+اضافه کردن درمانگاه</a></div>
                        <div id="clinic">
                            <select name="clinic_id" class="form-control dir_rtl">
                                <option value="0">...</option>
                                @foreach($clinics as $clinic)
                                    <option value="{{ $clinic->id }}">{{ $clinic->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary " value="ذخیره">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#clinic').hide();
            $('#add').on('click', function () {
                $('#clinic').toggle();
            })
        })
    </script>

@endsection
