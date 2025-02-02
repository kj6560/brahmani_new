@extends('layouts.site')
@section('content')
<?php $page_content = $settings['page_data']->page_desc; ?>
{{$page_content??""}}
@endsection