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
        <div class="col-md-2">
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

        <div class="col-md-10">

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
                    <div class="box-title">Current Week</div>
                </div>

                <div class="box-body">
                  <table class="table table-responsive table-bordered table-striped">
                    <thead>
                      <th>Name</th>
                      @foreach(array_keys($reportDates) as $date)
                        <th class="vertical">{{ date('D d/m', strtotime($date)) }}</th>
                      @endforeach
                    </thead>
                    <tbody>
                      @foreach($reportData as $employee)
                        <tr>
                          <td>{{$employee['name']}}</td>
                          @foreach($employee['workedHours'] as $date => $hours)
                            <td>{{ ($hours != '00:00') ? $hours : '' }}</td>
                          @endforeach
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Some Chart</div>
                </div>

                <div class="box-body">
                  {!! $chart->html() !!}
                </div>
            </div>
        </div>
    </div>
            {!! Charts::scripts() !!}
        {!! $chart->script() !!}
@endsection
