@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{ __('Members of team :team_name', ['team_name' => $team->name]) }}
                    <a href="{{route('teams.index')}}" class="btn btn-sm btn-secondary pull-right">
                        <i class="fa fa-arrow-left"></i> {{ __('Back') }}
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        @foreach($team->users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                @if(auth()->user()->isOwnerOfTeam($team))
                                    @if(auth()->user()->getKey() !== $user->getKey())
                                    <form style="display: inline-block;" action="{{route('teams.members.destroy', [$team, $user])}}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i> {{ __('Delete') }}
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
                <div class="card-header">{{ __('Pending invitations') }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('E-Mail') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        @foreach($team->invites as $invite)
                        <tr>
                            <td>{{$invite->email}}</td>
                            <td>
                                <a href="{{route('teams.members.resend_invite', $invite)}}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-envelope-o"></i> {{ __('Resend invite') }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-header">{{ __('Invite to team :team_name', ['team_name' => $team->name]) }}</div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{route('teams.members.invite', $team)}}">
                        {!! csrf_field() !!}
                        <div class="mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ __('E-Mail Address') }}</label>

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
                                <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-envelope-o"></i>{{ __('Invite to team') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
