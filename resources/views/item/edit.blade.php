@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ URL::route('index') }}">{{ Lang::get('item.form.dashboard') }}</a> > {{ Lang::get('item.edit.title') }}</div>
                    <div class="card-body">
                           <div class="row">
                                <div class="panel panel-primary">
                                @include('partial.alerts.success')
                                @include('partial.alerts.error')
                                    @php
                                        $itemCategory = $item->getAttribute('category');
                                        $itemStatus = $item->getAttribute('status');
                                        $itemPlacement = $item->getAttribute('placement');
                                    @endphp
                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('item.update', $item) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <label>{{ Lang::get('item.form.category') }}: </label>
                                        <select class="custom-select {{ $errors->has('category_id') ? 'has-error' : '' }}" name="category_id">
                                            @if(isset($item['category']))
                                            <option value="{{ $itemCategory->getKey() }}" selected>{{ $itemCategory->getAttribute('name') }}</option>
                                            @else
                                            <option value="" selected></option>
                                            @endif
                                            <option disabled="disabled">-------------------------</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->getKey() }}">{{ $category->getAttribute('name') }}</option>
                                            @endforeach
                                        </select>

                                        <label>{{ Lang::get('item.form.placement') }}: </label>
                                        <select class="custom-select {{ $errors->has('placement_id') ? 'has-error' : '' }}" name="placement_id">
                                            @if(isset($item['placement']))
                                            <option value="{{ $itemPlacement->getKey() }}" selected>{{ $itemPlacement->getAttribute('name') }}</option>
                                            @else
                                            <option value="" selected></option>
                                            @endif
                                            <option disabled="disabled">-------------------------</option>
                                            @foreach ($placements as $placement)
                                            <option value="{{ $placement->getKey() }}">{{ $placement->getAttribute('name') }}</option>
                                            @endforeach
                                        </select>

                                        <label>{{ Lang::get('item.form.status') }}: </label>
                                        <select class="custom-select {{ $errors->has('status_id') ? 'has-error' : '' }}" name="status_id">
                                        @if(isset($item['status']))
                                        <option value="{{ $itemStatus->getKey() }}" selected>{{ $itemStatus->getAttribute('name') }}</option>
                                        @else
                                        <option value="" selected></option>
                                        @endif
                                        <option disabled="disabled">-------------------------</option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->getKey() }}">{{ $status->getAttribute('name') }}</option>
                                            @endforeach
                                        </select>

                                        <label>{{ Lang::get('item.form.price') }}: </label>
                                        <input class="form-control {{ $errors->has('price') ? 'has-error' : '' }}" type="number" step="0.01" min="0" lang="en" name="price" value="{{ $item->getAttribute('price') }}">

                                        <label>{{ Lang::get('item.form.model') }}: </label>
                                        <input class="form-control {{ $errors->has('model') ? 'has-error' : '' }}" type="text" name="model" value="{{ $item->getAttribute('model') }}">

                                        <label>{{ Lang::get('item.form.comment') }}: </label>
                                        <textarea class="form-control {{ $errors->has('comment') ? 'has-error' : '' }}" name="comment" rows="5" id="text">{{ $item->getAttribute('comment') }}</textarea>

                                        <label>{{ Lang::get('item.form.placement_comment') }}: </label>
                                        <textarea class="form-control {{ $errors->has('placement_comment') ? 'has-error' : '' }}" name="placement_comment" rows="5" id="text">{{ $item->getAttribute('placement_comment') }}</textarea>

                                        <label>{{ Lang::get('item.form.p_date') }}: </label>
                                        @if(isset($item->purchased_at))
                                        <input id="datepicker" class="datepicker {{ $errors->has('purchased_at') ? 'has-error' : '' }}" name="purchased_at" value="{{ $item->getAttribute('purchased_at')->format('Y-m-d') }}">
                                        @else
                                        <input id="datepicker" class="datepicker {{ $errors->has('purchased_at') ? 'has-error' : '' }}" name="purchased_at" value="">
                                        @endif
                                        <button type="submit" class="btn bg-teal form-control">{{ Lang::get('general.word.save') }}</button>
                                    </form>

                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('item.destroy', $item) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger form-control">
                                            <i class="fa fa-btn fa-trash"></i>{{ Lang::get('general.word.delete') }}
                                        </button>
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
