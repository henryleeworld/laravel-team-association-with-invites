@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Teams') }}
                    <a class="pull-right btn btn-secondary btn-sm" href="{{route('teams.create')}}">
                        <i class="fa fa-plus"></i> {{ __('Create team') }}
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>
                                    @if(auth()->user()->isOwnerOfTeam($team))
                                    <span class="label label-success">{{ __('Owner') }}</span>
                                    @else
                                    <span class="label label-primary">{{ __('Member') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                    <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-sign-in"></i> {{ __('Switch') }}
                                    </a>
                                    @else
                                    <span class="label label-default">{{ __('Current team') }}</span>
                                    @endif

                                    <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-users"></i> {{ __('Members') }}
                                    </a>

                                    @if(auth()->user()->isOwnerOfTeam($team))

                                    <a href="{{route('teams.edit', $team)}}" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-pencil"></i> {{ __('Edit') }}
                                    </a>

                                    <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i> {{ __('Delete') }}
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
