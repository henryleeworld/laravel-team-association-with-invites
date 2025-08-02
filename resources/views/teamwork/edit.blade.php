@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit team :team_name', ['team_name' => $team->name]) }}</div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('teams.update', $team)}}">
                        <input type="hidden" name="_method" value="PUT" />
                        {!! csrf_field() !!}

                        <div class="mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $team->name) }}" />

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>{{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
