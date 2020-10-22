{{ trans('frontend.teams.emails.statement') }}{{$team->name}}.<br>
{{ trans('frontend.teams.emails.content.click_here_to_join') }}<a href="{{route('teams.accept_invite', $invite->accept_token)}}">{{route('teams.accept_invite', $invite->accept_token)}}</a>
