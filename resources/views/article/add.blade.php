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



                        <div class="entry">
                            <form id="entry" class="entry-form" method="POST" action="{{ route('articleAdd') }}">
                                <div class="small-spacer"></div>

                                <label for="first_name">First Name</label>
                                <input type="text" name="title" value="1" class="form-control">
                                <input type="text" name="main_description" value="2" class="form-control">
                                <input type="text" name="article" value="3" class="form-control">
                                <input type="text" name="tag" value="4" class="form-control">

                                <div align="center">
                                    <a id="swal-demo1" href="#" style="text-decoration: none;">
                                        <input class="submit-button" id="submitentryform" name type="submit" value="Submit">
                                    </a>
                                </div>

                                <div class="sub-legal ie-sub-legal">No purchase necessary. Click for <a href="rules" target="_blank">Official Rules</a></div>

                                {{ csrf_field() }}
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('#submitentryform').addEventListener('click', function() {
            alert('Kliknąłeś mnie!')
        });
    });
</script>
@endsection
