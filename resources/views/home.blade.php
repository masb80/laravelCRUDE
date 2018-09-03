@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Well Come !!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3> You are logged in! <h3>
                      <h3> You can create post from Dashboard <h3>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
