@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="row">
                @foreach($doors as $door)
                    <div class="col-md-6">
                        <form method="POST" action="/doors">
                            {{ csrf_field() }}
                            <input type="hidden" name="door_id" value="{{ $door->id }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">{{ $door->name }}</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop
