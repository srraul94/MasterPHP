<h1>Listado de frutas</h1>
<h3>
    <a href="{{ action('FrutaController@create')}}">
        Crear frutas
    </a>
</h3>

@if(session('status'))
    <p> {{session('status')}}</p>
@endif
<ul>
    @foreach($frutas as $fruta)
    <li>
        <a href="{{ action('FrutaController@detail',['id' => $fruta->id] )}}">
            {{$fruta->nombre}}
        </a>

    </li>
    @endforeach
</ul>