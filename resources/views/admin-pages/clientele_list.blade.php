@extends('layouts.admin_template')

@section('content')
    <div id="page-wrapper">
        <div class="col-sm-12 ">
            <h2 class="centeralign">نتایج جستجو</h2>
            <table class="table table-striped dir_rtl">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>نام پدر</th>
                    <th>کد ملی</th>
                    <th>نوع بیمه</th>
                    <th>تلفن ثابت</th>
                    <th>موبایل</th>
                    <th>ساعت حضور</th>
                    <th>کد رهگیری</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->firstname }}</td>
                        <td>{{ $client->lastname }}</td>
                        <td>{{ $client->father }}</td>
                        <td>{{ $client->meli_code }}</td>
                        <td>{{ $client->bime }}</td>
                        <td>{{ $client->phone_num }}</td>
                        <td>{{ $client->mobile_num }}</td>
                        <td>{{ $client->time_s }}</td>
                        <td>{{ $client->trace_code }}</td>
                        <td><a href="/admin-panel/client/delete/{{ $client->id }}" class="label label-warning">حذف</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $clients->links() }}
    </div>
@endsection