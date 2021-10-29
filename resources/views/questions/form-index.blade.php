@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($forms as $form)
                <div class="card m-3" style="width: 18rem;">
                    <img class="card-img-top" src="https://via.placeholder.com/468x60" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $form['name']}} &#183;
                            <small>{{ count($form['questions'])}} {{Str::plural('question', count($form['questions']))}}
                            &#183; {{\Carbon\Carbon::parse($form['created_at'])->diffForHumans()}}</small></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                    </div>
                    <div class="card-body">
                        <a class=""
                           href="{{route('next-question',[$form['id'],$form['questions'][0]['id']])}}"
                           onclick="event.preventDefault();
                               document.getElementById('{{'form'.$form['id']}}').submit();">
                            Show form </a>
                        <form id="{{'form'.$form['id']}}"
                              action="{{route('next-question',[$form['id'],$form['questions'][0]['id']])}}"
                              method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
