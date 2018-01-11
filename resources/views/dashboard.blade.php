@extends('layouts.app')

@section('content')
    <div class="container mx-auto flex flex-wrap">
                @foreach($employees as $employee)
                <div class="flex lg:w-1/2 md:w-full sm:w-full xs:w-full  w-full">
                    <div class="inline-block mx-1 my-1 w-full bg-white border-t border-b sm:border-l sm:border-r sm:rounded shadow">
                        <div class="flex items-center justify-between px-2 py-2">
                            <div class="flex items-center">
                                <img class="rounded-full inline-block h-18 w-18 " src="{{ $employee->avatar }}">
                                <div class="ml-4 block uppercase text-xl">{{ $employee->name }}</div>
                            </div>

                            <div class="float-right">
                                <form action="/movements" method="POST">
                                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                    {{ csrf_field() }}
                                    @if(!$employee->lastMovement || $employee->lastMovement->type == 'out')
                                        <input type="hidden" name="type" value="in">
                                        <button type="submit" class="w-32 px-2 py-2 bg-red-dark text-white rounded float-right">OUT</button>
                                    @else
                                        <input type="hidden" name="type" value="out">
                                        <button type="submit" class="w-32 px-2 py-2 bg-green-dark text-white rounded float-right">IN</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    </div>
@stop

