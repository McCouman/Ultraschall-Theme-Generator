<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 05.11.16
 * Time: 22:57
 */
class View_Templates {

    /**
     * Generate the startpage
     *
     * @param $f3
     */
    function welcome( $f3 ) {
        //vars
        $f3->set( 'content', 'pages/view/templates.htm' );
        $f3->set( 'folder', $this->read_folder_array() );
        //template vars
        $f3->set( 'navi', 'templates' );
        $f3->set( 'title', 'Templates' );
        //output
        echo View::instance()->render( 'pages/layout.htm' );
    }

    /**
     * Helper function:
     *
     * @return string
     */
    function read_folder_array() {
        $ordner = 'app/data/';
        $alledateien = scandir( $ordner, 1 ); // Sortierung Z-A mit scandir($ordner, 1)

        $folder = array();
        foreach ( $alledateien as $datei )
        {
            $files = pathinfo( $ordner . "/" . $datei );
            if ( $datei != "." && $datei != ".." && $datei != ".DS_Store" && $files[ 'extension' ] != 'md' )
            {
                $folder[] = $files[ "filename" ];
            }
        }

        //output
        $html = '';
        foreach ( $folder as $templates )
        {
            $html .= '<div>';
            $html .= '<div style="float: left;"><h3><i class="uk-icon-file-archive-o"></i> ' . $templates . '</h3></div>';
            $html .= '<div style="float: right;">';

            // edit background set
            $html .= '<a href="/template/' . $templates . '/setup/topLeft/create" title="Set Edit">';
            $html .= '<i class="uk-icon-button uk-icon-th"></i>';
            $html .= '</a>';

            // create or edit button icons
            $html .= '<a href="/template/' . $templates . '/icons/zoom/create" title="Icons Edit">';
            $html .= '<i class="uk-icon-button uk-icon-picture-o"></i>';
            $html .= '</a>';

            // download as *test.zip
            $html .= '<a href="/template/' . $templates . '/download" title="Download">';
            $html .= '<i class="uk-icon-button uk-icon-cloud-download"></i>';
            $html .= '</a>';

            // delete template
            $html .= '<a href="/template/' . $templates . '/delete" title="Delete">';
            $html .= '<i class="uk-icon-button uk-icon-close"></i>';
            $html .= '</a>';

            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div style="clear: both;"></div><hr>';
        }

        return $html;
    }
}
