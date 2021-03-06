@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-header float-left">{{ Lang::get('user.title') }}</div>
                        <a  href="{{ URL::route('user.create') }}" class="btn add_item float-right">
                            <i class="icon-plus3"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('partial.alerts.success')
                    <table class="table datatable-basic entities users"
                           data-ajax-source="{!! URL::route('user.list') !!}">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>{{ Lang::get('user.index.table.headers.first_name') }}</th>
                            <th>{{ Lang::get('user.index.table.headers.last_name') }}</th>
                            <th>{{ Lang::get('user.index.table.headers.email') }}</th>
                            <th>{{ Lang::get('user.index.table.headers.is_admin') }}</th>
                            <th>{{ Lang::get('user.index.table.headers.is_blocked') }}</th>
                            <th>{{ Lang::get('user.index.table.headers.edit') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
