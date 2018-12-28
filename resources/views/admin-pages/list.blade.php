@foreach($doctors as $doctor)
    <a href="/list/{{ $doctor->id }}">{{ $doctor->name }}</a><br>
@endforeach