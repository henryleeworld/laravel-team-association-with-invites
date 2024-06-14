@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{ trans('frontend.teams.members.statement') }}"{{$team->name}}"
                    <a href="{{route('teams.index')}}" class="btn btn-sm btn-secondary pull-right">
                        <i class="fa fa-arrow-left"></i> {{ trans('frontend.teams.members.content.back') }}
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('frontend.teams.members.content.name') }}</th>
                                <th>{{ trans('frontend.teams.members.content.action') }}</th>
                            </tr>
                        </thead>
                        @foreach($team->users AS $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @if(auth()->user()->isOwnerOfTeam($team))
                                    @if(auth()->user()->getKey() !== $user->getKey())
                                    <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i> {{ trans('frontend.teams.members.content.delete') }}
                                        </button>
                                    </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">{{ trans('frontend.teams.members.content.pending_invitations') }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ trans('frontend.teams.members.content.email') }}</th>
                                <th>{{ trans('frontend.teams.members.content.action') }}</th>
                            </tr>
                        </thead>
                        @foreach($team->invites AS $invite)
                        <tr>
                            <td>{{$invite->email}}</td>
                            <td>
                                <a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-envelope-o"></i> {{ trans('frontend.teams.members.content.resend_invite') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-header">{{ trans('frontend.teams.members.content.invite_to_team') }}"{{$team->name}}"</div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                        {!! csrf_field() !!}
                        <div class="mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('frontend.teams.members.content.email_address') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" />

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-envelope-o"></i>{{ trans('frontend.teams.members.content.invite_to_team') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
