@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-header float-left">{{ Lang::get('item.title') }}</div>
                        <a  href="{{ URL::route('item.create') }}" class="btn add_item float-right">
                            <i class="icon-plus3"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('partial.alerts.success')
                    <table class="table datatable-basic entities users"
                           data-ajax-source="{!! URL::route('item.list') !!}">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>{{ Lang::get('item.index.table.headers.category') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.status') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.placement') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.model') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.price') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.placement_comment') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.comment') }}</th>
                            <th>{{ Lang::get('item.index.table.headers.p_date') }}</th>
                            <th>{{ Lang::get('general.word.edit') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
