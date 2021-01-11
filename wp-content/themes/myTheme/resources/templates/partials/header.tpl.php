<header class="header">
    <h2><?= $title ?></h2>
    <p><?= $lead ?></p>

    <?php
        /**
         * Functions hooked into `theme/header/end` action.
         *
         * @hooked Tonik\Theme\App\Structure\render_documentation_button - 10
         */
        do_action('theme/header/end');




        //--------------------------------------------------------------------------------------------------/
        // my Person test with shortcodes
        echo '<br>';
        echo do_shortcode('[foobar]');
        echo '<br>';
        echo do_shortcode('[bartag foo="ciao " bar=" Dima" ]');
        echo '<br>';
        echo do_shortcode('[caption] Ho 31 anni [/caption]');
        echo '<br>';
        echo do_shortcode('[caption_with_atts class="where"] Vivo a Roma [/caption_with_atts]');
        
        //--------------------------------------------------------------------------------------------------/
        // my Person test with php compact() function
        echo '<br>';
        $firstname = "Peter";
        $lastname = "Griffin";
        $age = "41";
        
        $name = array('first' => 'Massimo', 'last' => 'La Spina');
        print_r($name);
        echo '<br>';
        $result = compact("name", "age");
        
        echo '<br>';
        print_r($result);
        echo '<br>';
        print_r($result['age']);
        echo '<br>';
        print_r($result['name']['first']);
    ?>
</header>
