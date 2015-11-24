            <!-- /section:basics/sidebar -->
<div class="main-content">
        <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">ID</th>
                                <th>日付</th>
                                <th>タイトル</th>
                                <th>link先</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($AdminKeywords as $Item):?>
<tr>
    <td><?php echo $Item['AdminKeyword']['id']?></td>
    <td><?php echo $Item['AdminKeyword']['created']?></td>
    <td><?php echo $Item['AdminKeyword']['title']?></td>
    <td><?php echo $Item['AdminKeyword']['url']?></td>
    <td>
        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminkeyword/edit/?id=<?php echo $Item['AdminKeyword']['id']?>">編集</a>
        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Adminkeyword/delete/?id=<?php echo $Item['AdminKeyword']['id']?>">削除</a>
    </td>
</tr>
<?php endforeach?>
    </tbody>
    </table>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT?>Adminkeyword/input/">新規作成</a>
</h4>
                </div>
            </div>




        </div>
    </div>
</div>
