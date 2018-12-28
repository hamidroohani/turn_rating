@extends('layouts.template')
<style>
    .cation {
        color: #a94442;
    }

    .danger{
        color: red;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 dir_rtl">
                <form action="/turn/create_turn" method="post">
                    {{ csrf_field() }}
                    <label for="">نام پزشک :</label>
                    <select name="id" id="" class="form-control">
                        <option value="{{ $time->id }}">{{ $time->doctor->name }}</option>
                    </select>
                    <br>
                    <span class="cation">
                        <b>
                            <span class="danger">*</span>
                            فیلدهایی که پر کردن آنها الزامیست
                        </b>
                    </span>
                    <br>
                    <br>
                    <br>
                    <label for=""><b class="danger">*</b> نام :</label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control" required>
                    <br>
                    <label for=""><b class="danger">*</b> نام خانوادگی :</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control" required>
                    <br>
                    <label for=""><b class="danger">*</b> کد ملی :</label>
                    <input type="text" name="meli_code" value="{{ old('meli_code') }}" class="form-control" required>
                    <br>
                    <label for="">نام پدر :</label>
                    <input type="text" name="father" value="{{ old('father') }}" class="form-control">
                    <br>
                    <label for=""><b class="danger">*</b> تلفن همراه :</label>
                    <input type="text" name="mobile_num" value="{{ old('mobile_num') }}" class="form-control" required>
                    <br>
                    <label for="">تلفن ثابت :</label>
                    <input type="text" name="phone_num" value="{{ old('phone_num') }}" class="form-control">
                    <br>
                    <label for=""><b class="danger">*</b> نوع بیمه :</label>
                    <select name="bime" id="" class="form-control">
                        <option value="آزاد">آزاد</option>
                        <option value="تامین اجتماعی">تامین اجتماعی</option>
                        <option value="نیروهای مسلح">نیروهای مسلح</option>
                    </select>
                    <br>
                    <span class="cation">در پايان فرايند اخذ نوبت، سيستم به شما كد رهگيري اعلام مي‌نمايد.
                    خواهشمند است در هنگام مراجعه به درمانگاه، كد رهگيري را همراه داشته باشيد.
                    </span>
                    <br>
                    <button class="btn btn-primary pull-left">تایید</button>
                </form>
            </div>
        </div>
    </div>

@endsection