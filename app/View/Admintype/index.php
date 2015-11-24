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
                                <th>カテゴリ</th>
                                <th>タイトル</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($Types as $Item):?>
<tr>
    <td><?php echo $Item['Type']['id']?></td>
    <td><?php echo $this->Useful->ViewselectValue($GenreTypes,$Item['Type']['category'])?></td>
    <td><?php echo $Item['Type']['title']?></td>

    <td>
        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Admintype/edit/?id=<?php echo $Item['Type']['id']?>">編集</a>
        <a class="btn-sm btn-danger" href="<?php echo WEBROOT?>Admintype/delete/?id=<?php echo $Item['Type']['id']?>">削除</a>
    </td>
</tr>
<?php endforeach?>
    </tbody>
    </table>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT?>Admintype/input/">新規作成</a>
</h4>
                </div>
            </div>




        </div>
    </div>
</div>
