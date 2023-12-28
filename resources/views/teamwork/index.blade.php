@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        {{ trans('frontend.teams.title') }}
                        <a class="pull-right btn btn-light btn-sm" href="{{route('teams.create')}}">
                            <i class="fa fa-plus"></i> {{ trans('frontend.teams.create.title') }}
                        </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ trans('frontend.teams.create.content.name') }}</th>
                                    <th>{{ trans('frontend.teams.create.content.status') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{$team->name}}</td>
                                        <td>
                                            @if(auth()->user()->isOwnerOfTeam($team))
                                                <span class="label label-success">{{ trans('frontend.teams.content.owner') }}</span>
                                            @else
                                                <span class="label label-primary">{{ trans('frontend.teams.content.member') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(is_null(auth()->user()->currentTeam) || auth()->user()->currentTeam->getKey() !== $team->getKey())
                                                <a href="{{route('teams.switch', $team)}}" class="btn btn-sm btn-light">
                                                    <i class="fa fa-sign-in"></i> {{ trans('frontend.teams.content.switch') }}
                                                </a>
                                            @else
                                                <span class="label label-default">{{ trans('frontend.teams.content.current_team') }}</span>
                                            @endif

                                            <a href="{{route('teams.members.show', $team)}}" class="btn btn-sm btn-light">
                                                <i class="fa fa-users"></i> {{ trans('frontend.teams.content.members') }}
                                            </a>

                                            @if(auth()->user()->isOwnerOfTeam($team))

                                                <a href="{{route('teams.edit', $team)}}" class="btn btn-sm btn-light">
                                                    <i class="fa fa-pencil"></i> {{ trans('frontend.teams.content.edit') }}
                                                </a>

                                                <form style="display: inline-block;" action="{{route('teams.destroy', $team)}}" method="post">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE" />
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ trans('frontend.teams.content.delete') }}</button>
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
