@extends('_layouts.default')

@section('main')
    <p>    {{Notification::showAll()}}
{{--    <?php
    	sleep(2);
    	Redirect::route('login');
	?>--}}
    </p>


@stop
