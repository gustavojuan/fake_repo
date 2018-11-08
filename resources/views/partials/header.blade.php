<header class="banner">
    <nav class="navbar navbar-expand-lg">
        <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
          <?php
	        $args = array(
		        'theme_location' => 'primary_left_nav',
		        'depth' => 0,
		        'container_class'=>'ml-auto test',
		        'menu_class'  => 'nav',
		        'walker'  => new BootstrapNavMenuWalker()
	        );
	        wp_nav_menu($args);
	        ?>

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






    </nav>

    <div id="utilities_wrapper" >
        <form class="navbar-form navbar-right navbar-form-search float-left mr-3" role="search">
            <div class="search-form-container hdn" id="search-input-container">
                <div class="search-input-group">
                    <a class="close-button" id="hide-search-input-container"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                    </div>
                </div>
            </div>
            <a  class="d-none d-md-block" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
        </form>
        <div class="dropdown show navbar-right float-right">


			<?php
			$languages = icl_get_languages('skip_missing=0&orderby=code');
			$custom_languages = [];
			foreach ($languages as  $l){
				if(!$l['active']){
					array_push($custom_languages,$l);
				}else{
					$custom_languages[0] = $l;
				}
			}
			?>
            <a class="dropdown-toggle text-uppercase" href="<?=$custom_languages[0]['url']?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?= substr($custom_languages[0]['native_name'],0,2)?>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
				<?php
				foreach ($custom_languages as $key => $language){
					if ($key > 0){

						echo '<a class="dropdown-item" href="'.$language['url'].'">'.$language['native_name'].'<img class="ml-3 rounded-circle" src="'.$language['country_flag_url'].'" width="30" height="30"></a>';
					}
				}
				?>
            </div>
        </div>
    </div>
</header>

