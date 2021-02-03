@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ URL::route('index') }}">{{ Lang::get('user.form.dashboard') }}</a> > <a href="{{ URL::route('user.index') }}">{{ Lang::get('user.title') }}</a> > {{ Lang::get('user.edit.title') }}</div>
                    <div class="card-body">
                           <div class="row">
                                <div class="panel panel-primary">
                                @include('partial.alerts.success')
                                @include('partial.alerts.error')
                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('user.update', $user) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}

                                        <label>{{ Lang::get('user.form.first_name') }}: </label>
                                        <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" type="text" name="first_name" value="{{ $user->getAttribute('first_name') }}">

                                        <label>{{ Lang::get('user.form.last_name') }}: </label>
                                        <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" type="text" name="last_name" value="{{ $user->getAttribute('last_name') }}">

                                        <label>{{ Lang::get('user.form.email') }}: </label>
                                        <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" type="text" name="email" value="{{ $user->getAttribute('email') }}">

                                        <label>{{ Lang::get('user.form.is_admin') }}: </label>
                                        <input type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" name="is_admin" value="{{ $user->getAttribute('is_admin') ? '1' : '0' }}" {{ $user->getAttribute('is_admin') ? 'checked' : ''}}>

                                        <label>{{ Lang::get('user.form.is_blocked') }}: </label>
                                        <input type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" name="is_blocked" value="{{ $user->getAttribute('is_blocked') ? '1' : '0' }}" {{ $user->getAttribute('is_blocked') ? 'checked' : ''}}>

                                        <button type="submit" class="btn bg-teal form-control">{{ Lang::get('general.word.save') }}</button>
                                    </form>

                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('user.destroy', $user) }}">
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
