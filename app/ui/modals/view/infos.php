<?php
/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 05.11.16
 * Time: 22:57
 */

class Infos {

    /**
     * Read markdown from readme.md file.
     *
     * @param $f3
     */
    function info_page($f3) {
        $f3->set( 'content', 'pages/view/infos.htm' );
        echo View::instance()->render( 'pages/layout.htm' );
    }
}
