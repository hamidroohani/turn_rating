@extends('layouts.admin_template')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">اطلاعات پزشکان</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading centeralign"><h4>{{ $doctor->name }}</h4></div>
                    <div class="panel-body">
                        <form action="/admin-panel/doctor/insert/info" method="get">
                            {{--{{ csrf_field() }}--}}
                            <ul class="list-group dir_rtl">
                                <li class="list-group-item">{{ $doctor->name }}<input type="text" style="display: none"
                                                                                      name="doctor"
                                                                                      value="{{ $doctor->id }}"></li>
                                <li class="list-group-item">
                                    @foreach($doctor->specialties as $specialty)
                                        {{ $specialty->title }}
                                    @endforeach
                                    <div id="specialty">
                                        <label for="specialty_id" class="floatright">تخصص :</label>
                                        <select name="specialty_id" class="form-control dir_rtl">
                                            <option value="0">...</option>
                                            @foreach($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">{{ $specialty->title }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <div class="clearfix"></div>
                                </div>
                                </li>
                                <li class="list-group-item">
                                    @if(count($doctor->clinics))
                                        @foreach($doctor->clinics as $clinic)
                                            {{ $clinic->title }}/
                                        @endforeach
                                    @else
                                        <span class="dang-color" id="no-item"><b>  درمانگاهی اختصاص داده نشده</b></span>
                                    @endif
                                    <div id="clinic">
                                        <label for="clinic_id" class="floatright">نام درمانگاه :</label>
                                        <select name="clinic_id" class="form-control dir_rtl">
                                            <option value="0">...</option>
                                            @foreach($clinics as $clinic)
                                                <option value="{{ $clinic->id }}">{{ $clinic->title }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <input type="submit" class="btn btn-primary pull-left" value="ذخیره">
                                        <div class="clearfix"></div>
                                </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="panel-footer dir_rtl">
                        جهت افزودن تخصص یا درمانگاه
                        <a href="#" id="add">اینجا</a>
                        را کلیک کنید.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#clinic').hide();
            $('#specialty').hide();
            $('#add').on('click', function () {
                $('#clinic').toggle();
                $('#specialty').toggle();
                $('#no-item').toggle();
            })
        })
    </script>

@endsection