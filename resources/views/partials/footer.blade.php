<footer class="content-info">
  <div class="container">
    <div class="row">

      <div class="col-12">
        <ul class="social_links text-center m-0 p-0">
          <li class="d-md-inline list-unstyled"><a href="" class="social">M</a></li>
          <li class="d-md-inline list-unstyled"><a href="" class="social">M</a></li>
          <li class="d-md-inline list-unstyled"><a href="" class="social">M</a></li>
        </ul>
      </div>

      <div class="col-12">
        @if (has_nav_menu('footer_nav'))
          {!! wp_nav_menu(['theme_location' => 'footer_nav', 'menu_class' => '']) !!}
        @endif
      </div>
    <div class="col-12">
      <p class="text-center"><small class="font-weight-bold">&copy;2018 SanLucar Fruit S.L.</small></p>
    </div>
    </div>
  </div>

</footer>
