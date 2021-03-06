<header class="banner">
        <ul class="social_links_header text-center m-0 p-0">
            <li class="d-inline list-unstyled">
                <a href="https://www.linkedin.com/company/sanlucar-fruit-s-l-/" target="_blank" class="social">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </li>
            <li class="d-inline list-unstyled">
                <a href="https://www.facebook.com/sanlucarfruit/" target="_blank" class="social">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="d-inline list-unstyled">
                <a href="https://www.youtube.com/user/SanLucar2009" target="_blank" class="social">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
            <li class="d-inline list-unstyled">
                <a href="https://www.instagram.com/sanlucarfruit/" target="_blank" class="social">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        </ul>


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
	        <?php
	        $args = array(
		        'theme_location' => 'primary_right_nav',
		        'depth' => 0,
		        'container_class'=>'mr-auto test',
		        'menu_class'  => 'nav',
		        'walker'  => new BootstrapNavMenuWalker()
	        );
	        wp_nav_menu($args);
	        ?>
        </div>






    </nav>

    <div id="utilities_wrapper" >
        <form class="navbar-form navbar-right navbar-form-search float-left mr-3" role="search" action="<?php echo home_url( '/' ); ?>">
            <div class="search-form-container hdn" id="search-input-container">
                <div class="search-input-group">
                    <a class="close-button" id="hide-search-input-container"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search for..." name="s">
                    </div>
                </div>
            </div>
            <a  class="d-none d-md-block" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
        </form>
        <div class="dropdown show navbar-right float-right">


			<?php
			$languages = icl_get_languages('skip_missing=0&orderby=code');
        /*    echo "<pre>";
			var_dump($languages);
			echo "</pre>";
			exit;*/
			$custom_languages = [];
			foreach ($languages as  $l){
				if($l['active']!=0) {
					$custom_languages[] = $l;
                }
			}

			foreach ($languages as  $l){
				if($l['active']==0) {
					array_push($custom_languages, $l);
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

						echo '<a class="dropdown-item" href="'.$language['url'].'"><span class="float-left">'.$language['native_name'].'</span><img class="ml-3 rounded-circle float-right" src="'.$language['country_flag_url'].'" width="30" height="30"></a>';
					}
				}
				?>
            </div>
        </div>
    </div>
</header>

