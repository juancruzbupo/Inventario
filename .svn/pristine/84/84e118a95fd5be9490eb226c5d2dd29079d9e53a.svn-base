@extends('layouts.master')
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'auth/login', 'class' => 'form']) !!}
                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::email('email', '', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password', ['class'=> 'form-control']) !!}
                            </div>
                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> Recordarme</label>
                            </div>
                            <div>
                                {!! Form::submit('login',['class' => 'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection