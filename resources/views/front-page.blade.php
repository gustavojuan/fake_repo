@extends('layouts.app')
@section('content')
    @while(have_posts()) @php the_post() @endphp
    @endwhile
    @include('partials.content-frontpage')
@endsection