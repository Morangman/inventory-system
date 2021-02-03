@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-header float-left">{{ Lang::get('placement.title') }}</div>
                        <a  href="{{ URL::route('placement.create') }}" class="btn add_item float-right">
                            <i class="icon-plus3"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('partial.alerts.success')
                    <table class="table datatable-basic entities users"
                           data-ajax-source="{!! URL::route('placement.list') !!}">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>{{ Lang::get('placement.index.table.headers.name') }}</th>
                            <th>{{ Lang::get('placement.index.table.headers.edit') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
