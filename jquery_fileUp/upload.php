<?php
/*
 * jQuery File Upload Plugin PHP Example
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * https://opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

$_GET['mode'] = 'file';//test

if(isset($_GET['mode']) && $_GET['mode'] == 'file' ){
    $folder = '/files/';
    $options = array(
        'inline_file_types' => '/\.(zip|7z|rar|doc|docx|xls|xlsx|xml|txt|rtf|gif|pdf|jpe?g|png)$/i',
        'image_file_types' => '/\.(zip|7z|rar|doc|docx|xls|xlsx|xml|txt|rtf|gif|pdf|jpe?g|png)$/i',
        'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']) .$folder,
        'upload_url' => dirname($_SERVER['SCRIPT_NAME']) .$folder
    );

}
else{
    $folder = '/images/';
    $options = array(
        // 'script_url' => $this->get_full_url().'/'.$this->basename($this->get_server_var('SCRIPT_NAME')),
        // 'input_stream' => 'php://input',
        // 'user_dirs' => false,
        // 'mkdir_mode' => 0755,
        // 'param_name' => 'files',
        // 'readfile_chunk_size' => 10 * 1024 * 1024, // 10 MiB
        'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
        'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
        // 'max_file_size' => null,
        // 'min_file_size' => 1,
        // 'max_number_of_files' => null,
        'image_file_types' => '/\.(gif|jpe?g|png)$/i',
        // 'max_width' => null,
        // 'max_height' => null,
        // 'min_width' => 1,
        // 'min_height' => 1,
        'image_versions' => array(
            '' => array(
                'auto_orient' => true
            ),
            // 'medium' => array(
            //     'max_width' => 800,
            //     'max_height' => 600
            // ),
            'thumbnail' => array(
                //'upload_dir' => dirname($this->get_server_var('SCRIPT_FILENAME')).'/thumb/',
                //'upload_url' => $this->get_full_url().'/thumb/',
                // 'auto_orient' => true,
                // 'crop' => true,
                // 'jpeg_quality' => 70,
                // 'no_cache' => true, (there's a caching option, but this remembers thumbnail sizes from a previous action!)
                // 'strip' => true, (this strips EXIF tags, such as geolocation)
                'max_width' => 100, // either specify width, or set to 0. Then width is automatically adjusted - keeping aspect ratio to a specified max_height.
                'max_height' => 100 // either specify height, or set to 0. Then height is automatically adjusted - keeping aspect ratio to a specified max_width.
            )
        ),
        'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']) .$folder,
        'upload_url' => dirname($_SERVER['SCRIPT_NAME']) .$folder
        //'print_response' => true
    );
}
// print_r(dirname($_SERVER['SCRIPT_FILENAME']));
// print_r(dirname($_SERVER['SCRIPT_NAME']));
//print_r($folder);

$upload_handler = new UploadHandler($options);
