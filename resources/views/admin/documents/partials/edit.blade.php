{!!Form::model($model,['route'=>['admin.'.$module.'.update',$model],'method'=>'put','enctype' => 'multipart/form-data'])!!}
<div class="form-group">
    {!!Form::label('name','Nombre')!!}
    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese nombre']) !!}

    @error('name')
        <span class="text-danger"> {{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!!Form::label('description','Descripción')!!}
    {!! Form::text('description',null, ['class'=>'form-control','placeholder'=>'Ingrese descripción']) !!}

    @error('description')
        <span class="text-danger"> {{$message}}</span>
    @enderror
</div>



<div class="form-group col-6">
    {!! Form::label('customer_id' ,'Cliente',['class'=>'font-weight-bold'])!!}
    {!!Form::select('customer_id',$lst_customers,null,array('id'=>'slt_customers','class'=>'form-control menu-content', 'placeholder'=>'Cliente')) !!}

        @error('customer_id')
        <span class="text-danger"> {{$message}}</span>
        @enderror
</div>



<div class="form-group col-6">
    {!! Form::label('image' ,'Documento',['class'=>'font-weight-bold'])!!}
    <br>
    <img src="data:image/png;base64,{{$model->document}}" alt="{{$model->name}}" style="max-width:25vw;">

</div>

<div class="form-group col-6">
    {!! Form::label('document' ,'Imagen documento',['class'=>'font-weight-bold'])!!}
    {!! Form::file('document', ['class'=>'form-control','accept'=>'image/*']) !!}
        @error('document')
        <span class="text-danger"> {{$message}}</span>
        @enderror
</div>

{!! Form::submit('Editar Documento', ['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}
</div>
