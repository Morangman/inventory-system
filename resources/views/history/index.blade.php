@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-header float-left">{{ Lang::get('history.title') }}</div>
                        <div class="card-header float-right">
                            <form method="post" action="{{ URL::route('history.clear') }}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-warning">
                                        {{ Lang::get('history.clear.title') }}
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('partial.alerts.success')
                    <table class="table datatable-basic entities users"
                           data-ajax-source="{!! URL::route('history.list') !!}">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>{{ Lang::get('history.index.table.headers.item_id') }}</th>
                            <th>{{ Lang::get('history.index.table.headers.field_name') }}</th>
                            <th>{{ Lang::get('history.index.table.headers.old_value') }}</th>
                            <th>{{ Lang::get('history.index.table.headers.new_value') }}</th>
                            <th>{{ Lang::get('history.index.table.headers.created_at') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
