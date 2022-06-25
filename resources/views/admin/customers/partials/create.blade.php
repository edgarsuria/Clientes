{!!Form::open(['route'=>'admin.customers.store','method'=>'POST','enctype' => 'multipart/form-data'])!!}
<div class="form-group">
    {!!Form::label('name','Nombre')!!}
    {!! Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingrese nombre']) !!}

    @error('name')
        <span class="text-danger"> {{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!!Form::label('last_name','Apellido')!!}
    {!! Form::text('last_name',null, ['class'=>'form-control','placeholder'=>'Ingrese apellido']) !!}

    @error('last_name')
        <span class="text-danger"> {{$message}}</span>
    @enderror
</div>

<div class="form-group">
    {!!Form::label('phone','Teléfono')!!}
    {!! Form::text('phone',null, ['class'=>'form-control','placeholder'=>'Ingrese teléfono']) !!}

    @error('phone')
        <span class="text-danger"> {{$message}}</span>
    @enderror
</div>


<div class="form-group">
    {!!Form::label('email','E-mail')!!}
    {!!Form::email('email',null, ['class'=>'form-control','placeholder'=>'Ingrese un correo electrónico']) !!}
    @error('email')
        <span class="text-danger"> {{$message}}</span>
    @enderror
</div>




{!! Form::submit('Crear Cliente', ['class'=>'btn btn-primary']) !!}
{!!Form::close()!!}
</div>
