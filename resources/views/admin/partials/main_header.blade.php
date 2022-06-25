<div class="card-header bg-secondary header-main-pages-admin">
    <h1 class="h2 title-pages-admin">

        @if ($action=="index")
            Lista de {{$module_name}}
        @elseif($action=="create")
            Agregar {{$module_name}}
        @else
            Editar {{$module_name}}
        @endif


    </h1>
    @if($route_add!=Null)
        <a  class="btn btn-success " href="{{route($route_add)}}" alt="agregar {{$module_name}}"><i class="{{$icon_class}}"></i><br>Nuevo</a>
    @endif
</div>
