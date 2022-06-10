<?php 
require_once (get_stylesheet_directory() . '/utility/file.control.php');

// 管理者ログインチェック
if(!wp_get_current_user() -> caps['administrator']) {
    redirectTo('/'); 
} 

// ファイルアップロード押下時
if(isset($_POST['uploadButton'])) {
    upload('upfile', $_GET['directory']);
}

// ディレクトリ作成ボタン押下時
if(isset($_POST['makeDirButton']) && !empty($_POST['dirName'])) {
    makeDirectory($_POST['dirName'], $_GET['directory']);
}

// ファイル削除ボタン押下時
if(isset($_GET['deleteFile']) && file_exists($_GET['deleteFile'])) {
    unlink($_GET['deleteFile']);
    redirectTo('/fileManager');
}

// ディレクトリ削除ボタン押下時
if(isset($_GET['deleteDir']) && file_exists($_GET['deleteDir'])) {
    deleteDirectory($_GET['deleteDir']);
    redirectTo('/fileManager');
}

// ファイルリスト・ディレクトリリスト
if(isset($_GET['directory'])) {
    $fileList = getFileList($_GET['directory']);
    $directoryList = getDirectoryList($_GET['directory']);
} else {
    $fileList = getFileList();
    $directoryList = getDirectoryList();
}
?>
<?php get_header(); ?>
<div class="container">
    <h1>File Manager</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row mb-4">
            <div class="col-8 mb-2">
                <input class="form-control" type="file" name="upfile">
            </div>
            <div class="col-4 mb-2">
                <input class="btn btn-warning" type="submit" name="uploadButton" value="アップロード">
            </div>
            <div class="col-8">
                <input class="form-control" type="text" name="dirName" placeholder="ディレクトリ名">
            </div>
            <div class="col-4">
                <input class="btn btn-danger" type="submit" name="makeDirButton" value="ディレクトリ作成">
            </div>
        </div>
    </form>
    <h2>Files</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ファイル名</td>
                <th colspan="2">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($fileList as $file): ?>
            <tr>
                <td><?php h(preg_split('/nht/', $file)[1]); ?></td>
                <td>
                    <a class="btn btn-danger disabled" data-role="delete" href="?deleteFile=<?php h($file); ?>">削除</a>
                    <label class="form-check form-switch">
                        <input class="form-check-input" data-role="enable-switch" type="checkbox"> 削除ボタンを有効化
                    </label>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Directories</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>ディレクトリ名</td>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="fileManager">ROOT</a></td>
                <td></td>
            </tr>
            <?php foreach($directoryList as $directory): ?>
            <tr>
                <td>
                    <a href="?directory=<?php h(preg_split('/nht/', $directory)[1]); ?>">
                        <?php h(preg_split('/nht/', $directory)[1]); ?>
                    </a>
                </td>
                <td>
                    <a class="btn btn-danger disabled" data-role="delete" href="?deleteDir=<?php h($directory); ?>">削除</a>
                    <label class="form-check form-switch">
                        <input class="form-check-input" data-role="enable-switch" type="checkbox"> 削除ボタンを有効化
                    </label>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
/**
 * 削除ボタンの有効化・無効化
 */
document.querySelectorAll('[data-role="enable-switch"]').forEach((enableSwitch) => {
    enableSwitch.addEventListener('change', (e) => {
        const deleteButton = e.target.parentNode.previousElementSibling;
        if(e.target.checked) {
            console.log('有効');
            deleteButton.classList.remove('disabled');
        } else {
            console.log('無効');
            deleteButton.classList.add('disabled');
        }
    });
});

/**
 * 削除確認ダイアログ
 */
document.querySelectorAll('[data-role="delete"]').forEach((deleteButton) => {
    deleteButton.addEventListener('click', (e) => {
        if(!confirm('本当に削除してよろしいですか？')) {
            e.preventDefault();
        }
    });
});
</script>
<?php get_footer(); ?>