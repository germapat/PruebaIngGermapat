<li class="header">Menú principal</li>
@if(session("permisos") != null)
@foreach(session("permisos") as $value)
@if($value["padre"] == 0)
<!-- / Panel -->
<li class="treeview">
    <a href="#"title="{{ $value['nombre']}}" class = "{{$value['icono']}}">
        <i class="pull-right "></i>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        <span>{{ $value["nombre"] }}</span>
    </a>
    <!-- / opciones -->
    <ul class="treeview-menu">
        @foreach(session("permisos") as $padre)
        @if($value["id"] == $padre["padre"])
        <li>
            <a class="{{ $padre['icono'] }}" href= "javascript:window.location='{{ $padre['url'] }}';">
                {{ $padre['nombre'] }}
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</li>
<!-- / Panel -->
@endif
@endforeach
    @else
    <script type="text/javascript">
    setTimeout(function(){
        document.getElementById('logout-form').submit();
    },100)
    </script>
    @endif
