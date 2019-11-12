@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white">create twit</div>

                    <form method="post" action="/create">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control" name="content" maxlength="200" placeholder="please type your twit here" resize="false"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary">Twit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
