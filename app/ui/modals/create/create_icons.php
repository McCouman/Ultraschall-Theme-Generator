<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 14:47
 */
class Create_Icons {

    /**
     * Edit Icon-Pages
     *
     * @param $f3
     * @param $param
     */
    function icons( $f3, $param ) {
        // vars
        $template = $param[ 'templ' ];
        $icons = $param[ 'icon' ];
        $imgPath = 'app/data/' . $template;

        // check original
        $title = 'Icon Name';

        if ( $icons == "zoom" )
        {
            $title = 'Zoom';
        }
        elseif ( $icons == "rippleon" )
        {
            $title = 'Ripple On';
        }
        elseif ( $icons == "rippleall" )
        {
            $title = 'Ripple All';
        }
        elseif ( $icons == "marker" )
        {
            $title = 'Marker Chapter';
        }
        elseif ( $icons == "glue" )
        {
            $title = 'Marker Edit';
        }
        elseif ( $icons == "cut" )
        {
            $title = 'Cut';
        }
        elseif ( $icons == "remove" )
        {
            $title = 'Remove';
        }
        elseif ( $icons == "mute" )
        {
            $title = 'Mute';
        }
        else
        {
            $title = 'KEINE INFORMATIONEN VORHANDEN!';
        }

        // meta data
        $f3->set( 'title', $title );
        $f3->set( 'image', $imgPath . '/icons/icons_' . $icons );
        $f3->set( 'usImage', $imgPath . '/generated/toolbar_' . $icons );

        // content page
        $f3->set( 'templ', $template );
        $f3->set( 'icons', $icons );
        $f3->set( 'navi', 'icons' );
        $f3->set( 'area', 'Icon -' );
        $f3->set( 'content', 'pages/view/page-icons.htm' );

        // output
        echo View::instance()->render( 'pages/layout.htm' );

    }

    /**
     * Setzt ein Icon zurück
     *
     * @param $f3
     */
    function iconBackImage( $f3, $param ) {
        // vars
        $templates = $param[ 'templ' ];
        $icon = $param[ 'icon' ];
        $type = $param[ 'type' ];
        $path = 'app/data/' . $templates;

        $back = new Create_Templates();
        $back->copy_set( $icon, $path, $type );

        //redirect: templates
        header( "location: " . '/template/' . $templates . '/icons/' . $icon . '/create' );
    }
}