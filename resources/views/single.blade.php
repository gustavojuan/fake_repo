@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );?>
  <div class="row page_bg page-height " id="{{$post_slug}}"
       style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
    <img src="" alt="">
    <div class="container">
      <div class="row h-100">
        <div class="col-12 col-md-8 offset-md-2 blank_bg">
          <div class="row">
            <div class="col-12 text-center">
              <h1><?=the_title()?></h1>
            </div>
          </div>
          <div class="row">
            <div class="col-12 px-5 py-2">
              {{--@include($partial)--}}
              <?php the_content()?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  @endwhile
@endsection

