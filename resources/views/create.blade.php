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
                                <textarea class="form-control" name="content" maxlength="200"
                                          placeholder="please type your twit here" resize="false"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary">Twit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <h5 class="text-danger">Do't use these keywords (the system will automatically block you ) </h5>

                @foreach($blacklist as $keyword)
                        <span class="badge badge-pill badge-primary lead">{{ $keyword['keyword'] }}</span>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
