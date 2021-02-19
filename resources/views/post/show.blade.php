@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">かあスレッド(show)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h5>あなたの投稿</h5>

                    {{$post->id}}
                    {{$post->message}}
                    {{$post->user_id}}
                    {{$post->reply_post_id}}
                    {{$post->created_at}}
                    {{$post->updated_at}}
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection