

<div class="form-group">
				
	{!! Form::label('name', 'Nome:') !!}
	{!! Form::text('user[name]', null, ['class'=>'form-control'] ) !!}

</div>	

<div class="form-group">
				
	{!! Form::label('email', 'Email:') !!}
	{!! Form::text('user[email]', null, ['class'=>'form-control'] ) !!}

</div>	

<div class="form-group">
				
	{!! Form::label('telefone', 'Telefone:') !!}
	{!! Form::text('phone', null, ['class'=>'form-control'] ) !!}

</div>	

<div class="form-group">
				
	{!! Form::label('Endereco', 'Endereço:') !!}
	{!! Form::textarea('address', null, ['class'=>'form-control'] ) !!}

</div>	

<div class="form-group">
				
	{!! Form::label('city', 'City:') !!}
	{!! Form::text('city', null, ['class'=>'form-control'] ) !!}

</div>	

<div class="form-group">
				
	{!! Form::label('estado', 'Estado:') !!}
	{!! Form::text('state', null, ['class'=>'form-control'] ) !!}

</div>	

<div class="form-group">
				
	{!! Form::label('cep', 'Cep:') !!}
	{!! Form::text('zipcode', null, ['class'=>'form-control'] ) !!}

</div>	
