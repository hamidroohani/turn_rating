@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading centeralign"><h4>اطلاعات فردی </h4></div>
                    <div class="panel-body dir_rtl">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div>
                                    <span>نام :</span>
                                    <span>{{ $turn->firstname }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <span>نام خانوادگی :</span>
                                    <span>{{ $turn->lastname }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <span>شماره ملی :</span>
                                    <span>{{ $turn->meli_code }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <span>پزشک :</span>
                                    <span>{{ $doctor->name }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <span>نام درمانگاه :</span>
                                    <span>{{ $clinic->title }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <span>ساعت حضور در درمانگاه :</span>
                                    <span>{{ $turn->time_s }}</span>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div>
                                    <span>کد پیگیری :</span>
                                    <span>{{ $turn->trace_code }}</span>
                                </div>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="centeralign"><b>لطفا کد پیگیری را در زمان مراجعه به همراه داشته باشید</b></div>
            </div>
        </div>
    </div>

@endsection