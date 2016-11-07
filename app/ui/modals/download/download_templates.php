<?php


/**
 * Created by Wikibyte.org
 * User: McCouman
 * Date: 06.11.16
 * Time: 12:32
 */
class Download_Templates {

    /**
     * download the generated <template>.zip file about browser
     *
     * @param $f3
     */
    function downloadTemplateItem( $f3, $param ) {
        // vars
        $file = $param[ 'templ' ];
        header( "location: " . '/app/data/' .$file . '/' . $file . '.zip' );
    }

    /**
     * generating a <template>.zip file
     */
    function downloadGenerator( $f3, $param ) {
        $file = $param[ 'templ' ];
        if ( $file )
        {
            $path = 'app/data/' . $file . '/generated/';
            $savePath = 'app/data/' . $file . '/' . $file . '.zip';

            $sourcePath = realpath( $path );
            $archiv = new ZipArchive();
            $archiv->open( $savePath, ZipArchive::CREATE );
            $dirIter = new RecursiveDirectoryIterator( $sourcePath );
            $iter = new RecursiveIteratorIterator( $dirIter );
            foreach ( $iter as $element )
            {
                $dir = str_replace( $sourcePath, '', $element->getPath() ) . '/';
                if ( $element->isDir() )
                {
                    $archiv->addEmptyDir( $dir );                       // Ordner erstellen
                }
                elseif ( $element->isFile() )
                {
                    $files = $element->getPath() . '/' . $element->getFilename();
                    $fileInArchiv = $dir . $element->getFilename();
                    $archiv->addFile( $files, $fileInArchiv );          // Datei dem Archiv hinzufügen
                }
            }
            // Kommentar mitspeichern
            $archiv->setArchiveComment( 'Template von ' . $sourcePath );
            $archiv->close();
        }

        header( "location: " . '/template/' . $file . '/download/load' );
    }
}
