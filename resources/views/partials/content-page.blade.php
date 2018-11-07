<?php
   $post_slug = get_post_field( 'post_name', get_post() );
   $partial = 'partials.pages.content-'.$post_slug;
?>

<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<div class="row page_bg" id="{{$post_slug}}" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
    <img src="" alt="">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2 blank_bg">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>@php the_title() @endphp</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-5 py-2">
                        @include($partial)
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
