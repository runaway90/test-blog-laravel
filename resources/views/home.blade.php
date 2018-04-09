@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="" class="form-control">
</div>

                    You are logged in!

                        <div align="center">
                            <button type="submit" class="submit-button" id="enter-button">ENTER</button>
                        </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
