<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 14:47
 */
class Create_Setup {

    /**
     * Edit Setup-Pages
     *
     * @param $f3
     * @param $param
     */
    function sets( $f3, $param ) {
        // vars
        $template = $param[ 'templ' ];
        $setup = $param[ 'set' ];
        $imgPath = 'app/data/' . $template . '/setup/';

        // check original
        $title = 'Set Name';
        $desc = 'klicke auf ein Icon um mehr Informationen zu bekommen oder ein neues Icon zu erstellen.';

        if ( $setup == "topStandalone" )
        {
            $title = 'Button Standalone';
            $desc = 'Dieser Button ist für die Toolbar und steht für sich alleine.';
            $icon = 'setup_' . $setup;
        }
        elseif ( $setup == "topLeft" )
        {
            $title = 'Button Left';
            $desc = 'Dieser Button ist für die Toolbar und eröffnet eine Button-Area.';
            $icon = 'setup_' . $setup;
        }
        elseif ( $setup == "topMiddle" )
        {
            $title = 'Button Middle';
            $desc = 'Dieser Button ist für die Toolbar und erweitert eine Button-Area.';
            $icon = 'setup_' . $setup;
        }
        elseif ( $setup == "topRight" )
        {
            $title = 'Button Right';
            $desc = 'Dieser Button ist für die Toolbar und beendet eine Button-Area.';
            $icon = 'setup_' . $setup;
        }
        else
        {
            $title = 'ERROR';
            $desc = '-- KEINE INFORMATIONEN VORHANDEN! --';
            $icon = '';
        }

        // meta data
        $f3->set( 'title', $title );
        $f3->set( 'desc', $desc );
        $f3->set( 'image', $imgPath . $icon );

        // content page
        $f3->set( 'templ', $template );
        $f3->set( 'set', $setup );
        $f3->set( 'navi', 'setup' );
        $f3->set( 'area', 'Set -' );
        $f3->set( 'content', 'pages/view/page-setup.htm' );

        // output
        echo View::instance()->render( 'pages/layout.htm' );

    }

    /**
     * Setzt ein Set-Bild zurück
     *
     * @param $f3
     * @param $param
     */
    function setBackImage( $f3, $param ) {
        $templates = $param[ 'templ' ];
        $setup = $param[ 'set' ];
        $path = 'app/data/' . $templates;

        $back = new Create_Templates();
        $back->copy_set( $setup, $path, 'setup');

        //redirect: templates
        header( "location: " . '/template/' . $templates . '/setup/' . $setup . '/create' );
    }
}