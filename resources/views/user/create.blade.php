@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{ URL::route('index') }}">{{ Lang::get('user.form.dashboard') }}</a> > <a href="{{ URL::route('user.index') }}">{{ Lang::get('user.title') }}</a> > {{ Lang::get('user.create.title') }}</div>
                    <div class="card-body">
                           <div class="row">
                                <div class="panel panel-primary">
                                @include('partial.alerts.success')
                                @include('partial.alerts.error')
                                    <form class="action-form col-md-5" method="post" action="{{ URL::route('user.store') }}">
                                        {{ csrf_field() }}

                                        <label>{{ Lang::get('user.form.first_name') }}: </label>
                                        <input class="form-control {{ $errors->has('first_name') ? 'has-error' : '' }}" type="text" name="first_name" value="">

                                        <label>{{ Lang::get('user.form.last_name') }}: </label>
                                        <input class="form-control {{ $errors->has('last_name') ? 'has-error' : '' }}" type="text" name="last_name" value="">

                                        <label>{{ Lang::get('user.form.email') }}: </label>
                                        <input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" type="text" name="email" value="">

                                        <label>{{ Lang::get('user.form.password') }}: </label>
                                        <input class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" type="text" name="password" value="">

                                        <label>{{ Lang::get('user.form.is_admin') }}: </label>
                                        <input type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" name="is_admin" value="0">

                                        <label>{{ Lang::get('user.form.is_blocked') }}: </label>
                                        <input type="checkbox" onclick="$(this).val(this.checked ? 1 : 0)" name="is_blocked" value="0">

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
