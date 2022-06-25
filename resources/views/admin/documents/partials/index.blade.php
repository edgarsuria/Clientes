<table id ="{{$module}}_table" class="table table-striped  table dt-responsive" style="width :100%">
    <thead class="bg-info">
        <tr>
            <th>Id</th>
            <th>Cliente</th>
            <th>Nombre</th>
            <th>Descripción</th>
            {{--<th>Previa</th>--}}
            <th>Vista Previa</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $element )
            <tr>
                <td>{{$element->id}}</td>
                <td>{{$element->find($element->id)->customer->name}}</td>
                <td>{{$element->name}}</td>
                <td>{{$element->description}}</td>
                <td>
                    <img src="data:image/png;base64,{{$element->document}}" alt="{{$element->name}}" style="max-width:3vw;">
                </td>

{{--                <th width="10px">
                    <a class="btn btn-success" href="{{route($route_edit,$element)}}"><i class="fas fa-download"></i></a>

                </th>
                --}}
                <td width="10px">
                    <a class="btn btn-primary" href="{{route($route_edit,$element)}}"><i class="far fa-edit"></i></a>
                </td>
                <td width="10px">
                    <form class="frm-delete" action="{{route($route_delete,$element)}}" method="POST" >
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger "><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
