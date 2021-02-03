@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ URL::route('index') }}">{{ Lang::get('item.form.dashboard') }}</a> > {{ Lang::get('item.create.title') }}</div>
                    <div class="card-body">
                           <div class="row">
                                <div class="panel panel-primary">
                                @include('partial.alerts.success')
                                @include('partial.alerts.error')
                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('item.store') }}">
                                        {{ csrf_field() }}

                                        <label>{{ Lang::get('item.form.category') }}: </label>
                                        <select class="custom-select {{ $errors->has('category_id') ? 'has-error' : '' }}" name="category_id">
                                            <option value="" selected>-</option>
                                            <option disabled="disabled">-------------------------</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->getKey() }}">{{ $category->getAttribute('name') }}</option>
                                            @endforeach
                                        </select>

                                        <label>{{ Lang::get('item.form.placement') }}: </label>
                                        <select class="custom-select {{ $errors->has('placement_id') ? 'has-error' : '' }}" name="placement_id">
                                            <option value="" selected>-</option>
                                            <option disabled="disabled">-------------------------</option>
                                            @foreach ($placements as $placement)
                                            <option value="{{ $placement->getKey() }}">{{ $placement->getAttribute('name') }}</option>
                                            @endforeach
                                        </select>

                                        <label>{{ Lang::get('item.form.status') }}: </label>
                                        <select class="custom-select {{ $errors->has('status_id') ? 'has-error' : '' }}" name="status_id">
                                        <option value="" selected>-</option>
                                        <option disabled="disabled">-------------------------</option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->getKey() }}">{{ $status->getAttribute('name') }}</option>
                                            @endforeach
                                        </select>

                                        <label>{{ Lang::get('item.form.price') }}: </label>
                                        <input class="form-control {{ $errors->has('price') ? 'has-error' : '' }}" type="number" step="0.01" min="0" lang="en" name="price" value="">

                                        <label>{{ Lang::get('item.form.model') }}: </label>
                                        <input class="form-control {{ $errors->has('model') ? 'has-error' : '' }}" type="text" name="model" value="">

                                        <label>{{ Lang::get('item.form.comment') }}: </label>
                                        <textarea class="form-control {{ $errors->has('comment') ? 'has-error' : '' }}" name="comment" rows="5" id="text"></textarea>

                                        <label>{{ Lang::get('item.form.placement_comment') }}: </label>
                                        <textarea class="form-control {{ $errors->has('placement_comment') ? 'has-error' : '' }}"  name="placement_comment" rows="5" id="text"></textarea>

                                        <label>{{ Lang::get('item.form.p_date') }}: </label>
                                        <input id="datepicker" class="datepicker {{ $errors->has('purchased_at') ? 'has-error' : '' }}" name="purchased_at" value="">

                                        <button type="submit" class="btn bg-teal form-control">{{ Lang::get('general.word.add') }}</button>
                                    </form>

                                    <p class="text-center"><a href="{{ URL::previous() }}">{{ Lang::get('general.word.cancel') }}</a></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
