@extends('layout.app')
@section('content')

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif -->

<div class="card" style="width:40rem;">
            <div class="card-body">
                
            <p style="font-size:20px; font-weight:bold;">Create New Employee</p>
            
            <form action="{{route('employees.store')}}" class="was-validated" method="POST" novalidate>
            @csrf  
                <div class="form-group has-validation">
                        <label for="name1">Name</label>
                        <input type="text" name="name1" id="name1" class="form-control "{{$errors->has('name1')?'is-invalid':""}}" value= "{{old('name1')}}" required>
                        @if($errors->has('name1'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name1') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control "{{$errors->has('email')?'is-invalid':""}}" value="{{old('email')}}"required>
                        @if($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="joining_date">Joining date</label>
                        <input type="date" name="joining_date" id="joining_date" class="form-control "{{$errors->has('joining_date')? 'is-invalid':""}}" value="{{old('joining_date')}}"required>
                        @if($errors->has('joining_date'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('joining_date') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="salary">salary</label>
                        <input type="number" name="salary" id="salary" class="form-control "{{$errors->has('salary')?'is-invalid':""}}" value= "{{old('salary')}}" required>
                        @if($errors->has('salary'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('salary') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                    <label for="is_active">Active</label><br>
                    <input type="checkbox" name="is_active" id="is_active" class="{{$errors->has('is_active') ? 'is-invalid' : ''}}" value="1" required {{ old('is_active') == '1' ? 'checked' : '' }}>
                    @if($errors->has('is_active'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('is_active') }}</strong>
                        </span>
                    @endif
                </div>

                    <button type="submit" class="btn btn-primary">Create Employee</button>
                </form>
            </div>
</div>
@endsection 




