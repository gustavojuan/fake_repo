<header class="banner">
    <nav class="navbar navbar-expand-lg">
        <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
            @if (has_nav_menu('primary_left_nav'))
                {!! wp_nav_menu(['theme_location' => 'primary_left_nav', 'menu_class' => 'nav','container_class'=>'ml-auto']) !!}
            @endif
        </div>

        <div class="mx-auto my-2 order-0 order-md-1 position-relative brand-wrapper" >
            <a class="brand" href="{{ home_url('/') }}">
                <img src="<?=  get_template_directory_uri()  .  '/../dist/images/logo.png';  ?>" width="130" class="d-block">
            </a>
        </div>

        <button class="navbar-toggler position-absolute" type="button" data-toggle="collapse" data-target=".dual-collapse2" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 dual-collapse2 order-2 order-md-2">
            @if (has_nav_menu('primary_right_nav'))
                {!! wp_nav_menu(['theme_location' => 'primary_right_nav', 'menu_class' => 'nav']) !!}
            @endif
        </div>
        <form class="navbar-form navbar-right navbar-form-search position-absolute" role="search" style="right: 1em;">
            <div class="search-form-container hdn" id="search-input-container">
                <div class="search-input-group">
                    <button type="button" class="btn btn-default" id="hide-search-input-container"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></button>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-default d-none d-md-block" id="search-button"><span class="glyphicon glyphicon-search" aria-hidden="true">M</span></button>
        </form>


    </nav>
</header>

