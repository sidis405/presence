@extends('layouts.app')

@section('content')
    <div class="container">
            @foreach($employees->chunk(2) as $row)
                <div class="row">
                @foreach($row as $employee)
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3"><img class="img-circle" style="height:50px" src="{{ $employee->avatar }}"></div>
                            <div class="col-md-8">{{ $employee->name }}</div>
                            <div class="col-md-2">
                                <form action="/movements" method="POST">
                                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                    {{ csrf_field() }}
                                    @if(!$employee->lastMovement || $employee->lastMovement->type == 'out')
                                        <input type="hidden" name="type" value="in">
                                        <button type="submit" class="btn btn-danger">OUT</button>
                                    @else
                                        <input type="hidden" name="type" value="out">
                                        <button type="submit" class="btn btn-success btn-block">IN</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @endforeach
    </div>
@stop
