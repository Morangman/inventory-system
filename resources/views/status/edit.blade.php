@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ URL::route('index') }}">{{ Lang::get('status.form.dashboard') }}</a> > <a href="{{ URL::route('status.index') }}">{{ Lang::get('status.title') }}</a> > {{ Lang::get('status.edit.title') }}</div>
                    <div class="card-body">
                           <div class="row">
                                <div class="panel panel-primary">
                                @include('partial.alerts.success')
                                @include('partial.alerts.error')
                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('status.update', $status) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <label>{{ Lang::get('status.form.name') }}: </label>
                                        <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" type="text" name="name" value="{{ $status->getAttribute('name') }}">

                                        <button type="submit" class="btn bg-teal form-control">{{ Lang::get('general.word.save') }}</button>
                                    </form>

                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('status.destroy', $status) }}">
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
