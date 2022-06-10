<?php
/*
* ディレクトリ操作
*/

// ディレクトリ作成
function makeDirectory($dirName, $outerDir = '') {
    $dir = get_stylesheet_directory() . $outerDir . '/' . $dirName;
    if(!file_exists($dir)) mkdir($dir);
}

// ディレクトリリスト取得
function getDirectoryList($dir = '') {
    $dirs = [];
    foreach(glob(get_stylesheet_directory() . $dir . '/*') as $path) {
        if(!is_file($path)) $dirs[] = $path;
    }
    return $dirs;
}

// ディレクトリ削除
// https://stackoverflow.com/questions/3349753/delete-directory-with-files-in-it
function deleteDirectory($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

/*
* ファイル操作
*/

// ファイル作成
function makeFile($filePath) {
    touch(get_stylesheet_directory() . '/' . $filePath);
}

// ファイルアップロード
function upload($nameAttribute, $uploadDir = '') {
    $upfile = $_FILES[$nameAttribute];
    $uploadDir .= '/';
    $uploadPath = get_stylesheet_directory() . $uploadDir . basename($upfile['name']);
    move_uploaded_file($upfile['tmp_name'], $uploadPath);
}

// ファイルリスト取得
function getFileList($dir = '') {
    $files = [];
    foreach(glob(get_stylesheet_directory() . $dir . '/*') as $path) {
        if(is_file($path)) $files[] = $path;
    }
    return $files;
}

