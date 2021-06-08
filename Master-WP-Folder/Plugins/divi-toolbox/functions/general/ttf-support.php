<?php

function dtb_font_files_check( $types, $file, $filename, $mimes ) {

    if ( false !== strpos( $filename, '.ttf' ) ) {
        $types['ext']  = 'ttf';
        $types['type'] = 'font/ttf|application/font-ttf|application/x-font-ttf|application/octet-stream';
    }
    
    if ( false !== strpos( $filename, '.otf' ) ) {
        $types['ext']  = 'otf';
        $types['type'] = 'font/otf|application/font-otf|application/x-font-otf|application/octet-stream';
    }

    return $types;
}
add_filter( 'wp_check_filetype_and_ext', 'dtb_font_files_check', 10, 4 );


function dtb_allow_font_file_types( $mimes ) {
        $mimes['ttf'] = 'font/ttf|application/font-ttf|application/x-font-ttf|application/octet-stream';
        $mimes['otf'] = 'font/otf|application/font-otf|application/x-font-otf|application/octet-stream';
        return $mimes;
}
add_filter( 'upload_mimes', 'dtb_allow_font_file_types' );