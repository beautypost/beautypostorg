<div class="main-content">
    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>

        <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
    <h4>機種マスタ&nbsp;&nbsp;
        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
        <a href="<?php echo WEBROOT?>Adminmaster/input/?genreID=<?php echo $GenreKisyu[0]['Genre']['genre_id']?>&groupID=<?php echo $GenreKisyu[0]['Genre']['group_id']?>">新規作成</a>
    </h4>

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center">ID</th>
                <th>タイトル</th>
                <th>設定</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($GenreKisyu as $Item):?>
            <tr>
            <td><?php echo $Item['Genre']['id']?></td>
            <td><?php echo $Item['Genre']['title']?></td>
            <td>
            <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminmaster/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
        &nbsp;&nbsp;
            <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminmaster/delete/?id=<?php echo $Item['Genre']['id']?>">削除</a>
            </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
    </div>

    <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
        <h4>用途マスタ&nbsp;&nbsp;
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            <a href="<?php echo WEBROOT?>Adminmaster/input/?genreID=<?php echo $GenrePurposes[0]['Genre']['genre_id']?>&groupID=<?php echo $GenrePurposes[0]['Genre']['group_id']?>">新規作成</a>
        </h4>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>タイトル</th>
                    <th>設定</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($GenrePurposes as $Item):?>
                <tr>
                    <td><?php echo $Item['Genre']['id']?></td>
                    <td><?php echo $Item['Genre']['title']?></td>
                    <td>
                        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminmaster/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
            &nbsp;&nbsp;
                        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminmaster/delete/?id=<?php echo $Item['Genre']['id']?>">削除</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>


    <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
        <h4>部位マスタ&nbsp;&nbsp;
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            <a href="<?php echo WEBROOT?>Adminmaster/input/?genreID=<?php echo $GenrePurposes[0]['Genre']['genre_id']?>&groupID=<?php echo $GenrePurposes[0]['Genre']['group_id']?>">新規作成</a>
        </h4>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>部位カテゴリ</th>
                    <th>タイトル</th>
                    <th>設定</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($GenrePoints as $Item): ?>
                <tr>
                    <td><?php echo $Item['Genre']['id']?></td>
                    <td><?php echo $PointGenre[$Item['Genre']['group_id']]?></td>
                    <td><?php echo $Item['Genre']['title']?></td>
                    <td>
                        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminmaster/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
                        &nbsp;&nbsp;
                        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminmaster/delete/?id=<?php echo $Item['Genre']['id']?>">削除</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>


    <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
        <h4>メーカーマスタ&nbsp;&nbsp;
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            <a href="<?php echo WEBROOT?>Adminmaster/input/?genreID=<?php echo $GenrePurposes[0]['Genre']['genre_id']?>&groupID=<?php echo $GenrePurposes[0]['Genre']['group_id']?>">新規作成</a>
        </h4>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>タイトル</th>
                    <th>設定</th>
                </tr>
            </thead>
            <tbody>


            <?php foreach($GenreMakers as $Item):?>
                <tr>
                    <td><?php echo $Item['Genre']['id']?></td>
                    <td><?php echo $Item['Genre']['title']?></td>
                    <td>
                        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminmaster/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
                        &nbsp;&nbsp;
                        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminmaster/delete/?id=<?php echo $Item['Genre']['id']?>">削除</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>


    <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
        <h4>ブログジャンルマスタ&nbsp;&nbsp;
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            <a href="<?php echo WEBROOT?>Adminmaster/input/?genreID=5&groupID=10">新規作成</a>
        </h4>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>タイトル</th>
                    <th>設定</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($GenreBlogs as $Item):?>
                <tr>
                    <td><?php echo $Item['Genre']['id']?></td>
                    <td><?php echo $Item['Genre']['title']?></td>
                    <td>
                        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminmaster/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
                        &nbsp;&nbsp;
                        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminmaster/delete/?id=<?php echo $Item['Genre']['id']?>">削除</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>



    <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
        <h4>コラムジャンルマスタ&nbsp;&nbsp;
            <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
            <a href="<?php echo WEBROOT?>Adminmaster/input/?genreID=6&groupID=10">新規作成</a>
        </h4>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">ID</th>
                    <th>タイトル</th>
                    <th>設定</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach($GenreColumns as $Item):?>
                <tr>
                    <td><?php echo $Item['Genre']['id']?></td>
                    <td><?php echo $Item['Genre']['title']?></td>
                    <td>
                        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminmaster/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
                        &nbsp;&nbsp;
                        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminmaster/delete/?id=<?php echo $Item['Genre']['id']?>">削除</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>


    </div>

