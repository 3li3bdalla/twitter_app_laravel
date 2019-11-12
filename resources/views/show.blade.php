@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <h5 class="text-primary">{{ '@'.$twit->user->name  }}</h5>
                        {{ $twit->content }}
                        <br>
                        <br>
                        <h6>{{ $twit->created_date   }}</h6>
                    </div>
                    <form method="post" action="/reply/{{ $twit->id }}">
                        @csrf
                        <div class="card-footer">
                            <div class="form-group">
                                <textarea class="form-control" name="content" maxlength="200" placeholder="please type your comment here" resize="false"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary">Reply</button>
                            </div>
                        </div>
                    </form>
                </div>

                <br>
                <h3 class="card-title"><i class="fa fa-comments"></i> Replies</h3>
                @foreach($twit->replies as $reply)
                    <div class="card" style="margin-bottom: 5px;">
                        <div class="card-header bg-white text-primary">{{  '@'.$reply->user->name }}</div>

                        <div class="card-body">

                            {{ $reply->content}}
                            <br>
                            <span class="text-primary">{{ $reply->created_date }}</span>
                        </div>

                    </div>

                @endforeach
            </div>

            <div class="col-md-2">
                <h3 class="card-title"><i class="fa fa-thumbs-up"></i> Likers</h3>
                @foreach($twit->likes as $like)
                    <div class="card" style="margin-bottom: 5px;">
                        <div class="card-header bg-white text-primary">{{  '@'.$reply->user->name }}</div>

                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
