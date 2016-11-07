<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 12:32
 */
class Delete_Templates {

    /**
     * Löschen eines Templates
     *
     * @param $f3
     */
    function templateItem( $f3, $params ) {
        // vars
        $path = 'app/data/' . $params[ 'templ' ];

        $fileIcons = $this->delete_templateFiles( $path, 'icons' );
        $this->delete_templateFolder( $path, $fileIcons, 'icons' );

        $fileSet = $this->delete_templateFiles( $path, 'setup' );
        $this->delete_templateFolder( $path, $fileSet, 'setup' );

        $fileGen = $this->delete_templateFiles( $path, 'generated' );
        $this->delete_templateFolder( $path, $fileGen, 'generated' );

        $fileTem = $this->delete_templateFiles( $path, '' );
        $this->delete_templateFolder( $path, $fileTem, '' );

        //redirect: templates
        header( "location: " . '/templates' );
    }

    /**
     * delete all files in folder: templates
     *
     * @param $typePath
     *
     * @return string
     */
    public function delete_templateFiles( $typePath, $type ) {

        // check type
        if ( $type == 'setup' )
        {
            $path = $typePath . '/' . $type;
        }
        elseif ( $type == 'icons' )
        {
            $path = $typePath . '/' . $type;
        }
        elseif ( $type == 'generated' )
        {
            $path = $typePath . '/' . $type;
        }
        else
        {
            $path = $typePath;
        }

        // start delet files
        $handle = opendir( $path );

        // delete all files
        while ( ( $file = readdir( $handle ) ) !== false )
        {
            if ( $file != '.' && $file != '..' )
            {
                $filepath = $path . '/' . $file;
                echo $filepath . '<br />';

                if ( is_dir( $filepath ) )
                {
                    rmdir( $filepath );
                    recursive_readdir( $filepath );
                }
                else
                {
                    unlink( $filepath );
                }
            }
        }
        closedir( $handle );

        return $file;
    }

    /**
     * @param $typePath
     * @param $file
     */
    public function delete_templateFolder( $typePath, $file, $type ) {

        // check type
        if ( $type == 'setup' )
        {
            $path = $typePath . '/' . $type;
        }
        elseif ( $type == 'icons' )
        {
            $path = $typePath . '/' . $type;
        }
        elseif ( $type == 'generated' )
        {
            $path = $typePath . '/' . $type;
        }
        else
        {
            $path = $typePath;
        }

        // delete Folder
        $del = opendir( $path );
        while ( ( $file = readdir( $del ) ) !== false )
        {
            if ( is_dir( $path ) )
            {
                rmdir( $path );
            }
        }
        closedir( $del );
    }

}