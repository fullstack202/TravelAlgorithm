@extends('layouts.app')
@section('content')
    <div class="col-1"></div>
    <div class=" d-flex justify-content-center col">
        <form class="mt-5" method="post" action="{{route('next-question',[$form_id,$question['id']])}}">
            @csrf
            @method('POST')
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="inputState">{{$question['question']}}@if($question['is_dealbreaker'])<span
                            class="text-danger">*</span>@endif</label>
                    <select id="inputState" class="form-control" name="{{$question['id']}}">
                        @foreach($question['variants'] as $variant)
                            <option value="{{$variant}}">{{$variant}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 text-center">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-1"></div>
@endsection
