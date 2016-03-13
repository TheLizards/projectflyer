@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Register:</h1>

            <form method="POST" action="/auth/register">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>

                <div  class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>

                <div  class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div  class="form-group">
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div  class="form-group">
                    <button type="submit ">Register</button>
                </div>
            </form>
        </div>
    </div>

    @include('errors.list')
@stop