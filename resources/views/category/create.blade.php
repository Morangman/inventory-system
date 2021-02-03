@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ URL::route('index') }}">{{ Lang::get('category.form.dashboard') }}</a> > <a href="{{ URL::route('category.index') }}">{{ Lang::get('category.title') }}</a> > {{ Lang::get('category.create.title') }}</div>
                    <div class="card-body">
                           <div class="row">
                                <div class="panel panel-primary">
                                @include('partial.alerts.success')
                                @include('partial.alerts.error')
                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('category.store') }}">
                                        {{ csrf_field() }}

                                        <label>{{ Lang::get('category.form.name') }}: </label>
                                        <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" type="text" name="name" value="">

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
