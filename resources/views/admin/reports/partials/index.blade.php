<table id ="{{$module}}_table" class="table table-striped  table dt-responsive" style="width :100%">
    <thead class="bg-info">
        <tr>
            <th>Id</th>
            <th>Aplicó</th>
            <th>Descripción</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $element )
            <tr>
                <td>{{$element->id}}</td>

                <td>{{$element->find($element->id)->user->name}}</td>
                <td>{{$element->description}}</td>
                <td>{{$element->created_at}}</td>





            </tr>

        @endforeach
    </tbody>
</table>
