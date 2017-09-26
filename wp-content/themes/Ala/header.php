<!DOCTYPE html>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="./wp-content/themes/ala19/css/swiper.min.css">

    <!-- FIX HTML STYLES IE9 -->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->

    <!-- FIX HTML JS-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="https://use.fontawesome.com/70f3ac0a74.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/basic.js"></script>

    <?php wp_enqueue_script("jquery"); ?>
</head>

<body>
    <header>

    </header>
    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide menu">Menu slide</div>
        <div class="swiper-slide content">
          <div id="mainContainer" class="menu-button">
            <div class="bar "></div>
            <div class="bar "></div>
            <div class="bar "></div>
          </div>
          <div class="logo-header">
            <div class="img-div">
              <img src="wp-content/themes/Ala/assets/logo.png" alt="Ala19 Logo">
            </div>
            <div class="sm-div">test</div>
          </div>
          Content slide
        </div>
      </div>
    </div>
    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var toggleMenu = function(){
        if (swiper.previousIndex == 0)
          swiper.slidePrev()
      }
        , menuButton = document.getElementsByClassName('menu-button')[0]
        , swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto'
        , initialSlide: 1
        , resistanceRatio: .00000000000001
        , onSlideChangeStart: function(slider) {
          if (slider.activeIndex == 0) {
            menuButton.classList.add('cross')
            menuButton.removeEventListener('click', toggleMenu, false)
          } else
            menuButton.classList.remove('cross')
        }
        , onSlideChangeEnd: function(slider) {
          if (slider.activeIndex == 0)
            menuButton.removeEventListener('click', toggleMenu, false)
          else
            menuButton.addEventListener('click', toggleMenu, false)
        }
        , slideToClickedSlide: true
      })
    </script>