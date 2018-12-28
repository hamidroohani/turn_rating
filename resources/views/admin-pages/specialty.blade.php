@extends('layouts.admin_template')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center">تخصص ها</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading centeralign"><h4>لیست تخصص ها</h4></div>
                    <div class="panel-body">
                        <form action="" method="post">
                            {{ csrf_field() }}
                        <ul class="list-group dir_rtl">
                            @foreach($specialties as $specialty)
                                <li class="list-group-item"><span class="modifyTitle" data-value="{{ $specialty->id }}">{{ $specialty->title }}</span></li>
                            @endforeach
                        </ul>
                            <button class="btn btn-info">اعمال تغییرات</button>
                        </form>
                    </div>
                </div>
                <hr>
                <h2 class="text-center">ذخیره تخصص جدید</h2>
                <form action="/admin-panel/specialty/insert">
                    <label for="name" class="dir_rtl floatright">نام تخصص :</label>
                    <input type="text" class="form-control dir_rtl floatright" placeholder="تخصص" name="title">
                    <br>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-primary " value="ذخیره">
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $(".btn-info").hide();
            $('.modifyTitle').on('dblclick',function () {
                $(this).parents('form').attr('action','/admin-panel/specialty/update/' + $(this).attr('data-value'));
                $(this).replaceWith($('<input type="text" class="form-control" name="title" value="' + this.innerHTML + '" >' ));
                $(".btn-info").show();
            });
        })
    </script>
@endsection