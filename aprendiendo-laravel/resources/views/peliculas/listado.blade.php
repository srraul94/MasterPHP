
@include('includes.header')

<h1> <?=$titulo?> </h1>
<h2> <?= $listado[2]?></h2>

<h1>{{$titulo}}</h1>
<h2>{{$listado[2]}}</h2>
<h2>{{date('Y')}}</h2>

<!-- comentario en Blade -->

{{-- comentario blade ---}}

<!-- comprobación -->
{{ $director ?? 'No hay director' }}

<!-- condicionales -->

@if($titulo)
    el titulo existe
@else 
    el titulo no existe 
@endif

<!-- bucles -->

@for($i = 0; $i <= 20; $i++)
    el numero es : {{$i}}
@endfor

{{$contador = 0}}
@while($contador < 10)
    numero: {{$contador}}
    {{$contador++}}
@endwhile

@foreach($listado as $pelicula)
    <p>{{$pelicula}}</p>
@endforeach

@include('includes.footer')