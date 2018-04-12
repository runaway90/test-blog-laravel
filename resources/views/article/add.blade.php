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

                                <label for="first_name">Add article</label>



                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Title</span>
                                    </div>
                                    <textarea class="form-control" name="title" aria-label=""></textarea>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Main information</span>
                                    </div>
                                    <textarea class="form-control" name="main_info" aria-label=""></textarea>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Article</span>
                                    </div>
                                    <textarea class="form-control" name="article" aria-label=""></textarea>
                                </div>
                                <div class="input-group mb-3">
                                  <select class="custom-select" id="inputGroupSelect02">
                                    <option selected>Choose...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                  <div class="input-group-append">
                                    <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                  </div>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name = 'q' value="option1">
                                    <label class="form-check-label" for="inlineCheckbox1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name = 'q' value="option2">
                                    <label class="form-check-label" for="inlineCheckbox2">2</label>
                                </div>

                                <div align="center">
                                    <a id="swal-demo1" href="#" style="text-decoration: none;">
                                        <input class="submit-button" id="submitentryform" name type="submit" value="Submit">
                                    </a>
                                </div>

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

    p = array.push(option1, option2);
</script>
@endsection
