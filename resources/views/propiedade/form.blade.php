<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('precio_uf') }}
            {{ Form::text('precio_uf', $propiedade->precio_uf, ['class' => 'form-control' . ($errors->has('precio_uf') ? ' is-invalid' : ''), 'placeholder' => 'Precio Uf']) }}
            {!! $errors->first('precio_uf', '<div class="invalid-feedback">El campo precio uf no debe estar vacío</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contacto') }}
            {{ Form::text('contacto', auth()->user()->name, ['value' => auth()->user()->name ,'class' => 'form-control' , 'readonly' . ($errors->has('contacto') ? ' is-invalid' : '')]) }}
            {!! $errors->first('contacto', '<div class="invalid-feedback">El campo contacto no debe estar vacío</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $propiedade->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">El campo telefono no debe estar vacío</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $propiedade->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">El campo dirección no debe estar vacío</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $propiedade->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">El campo descripcion no debe estar vacío</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::select('categoria_id', $categorias, $propiedade->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Elige una categoria']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">Debe elegir una categoria</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', auth()->user()->id, ['value' => auth()->user()->id , 'class' => 'form-control' , 'readonly' . ($errors->has('user_id') ? ' is-invalid' : '')]) }}
        </div>
        <div class="mb-3">
            <label for="formFileSm" class="form-label">Agregar una imagen (Opcional)</label>
            <input accept="image/*" class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
            {!! $errors->first('foto', '<div class="invalid-feedback">El archivo debe ser una imagen</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Crear</button>
    </div>
</div>
