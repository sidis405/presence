@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>This is the dashboard data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Who's In ({{ count($in) }})</div>
                </div>

                <div class="box-body">
                  <ul class="list-group">
                    @forelse($in as $employeeIn)
                      <li class="list-group-item">{{ $employeeIn->name }}</li>
                    @empty
                      <li class="list-group-item">There is no one here.</li>
                    @endforelse
                  </ul>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Who's Out ({{ count($out) }})</div>
                </div>

                <div class="box-body">
                  <ul class="list-group">
                    @forelse($out as $employeeOut)
                      <li class="list-group-item">{{ $employeeOut->name }}</li>
                    @empty
                      <li class="list-group-item">Everyone is here.</li>
                    @endforelse
                  </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">

          @if(count($dirty))
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Did not clock out</div>
                </div>


                <div class="box-body">
                  <ul class="list-group">
                    @forelse($dirty as $dirtyClose)
                      <li class="list-group-item">
                        <u>{{ $dirtyClose->employee->name }}</u> did not close session started on <u>{{ $dirtyClose->created_at->format('H:i d/m/Y') }}</u>
                        <a href="{{ route('crud.presences.edit', $dirtyClose) }}" class="btn btn-xs btn-success pull-right"><i class="fa fa-close"></i> Override</a>
                      </li>
                    @empty
                      <li class="list-group-item">Everyone is here.</li>
                    @endforelse
                  </ul>
                </div>
            </div>
                @endif
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>

                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>
@endsection
