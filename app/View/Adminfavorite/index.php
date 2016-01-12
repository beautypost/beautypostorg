            <!-- /section:basics/sidebar -->
<div class="main-content">
        <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
    <div class="row">
        <div class="col-xs-12">
            <?php if(isset($message)):?>
    <div class="alert alert-danger">
        <?php echo $message?>
    </div>
    <?php endif;?>
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">ID</th>
                                <th>タイトル</th>
                                <th>Status</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($Favorites as $Item):?>
<tr>
    <td><?php echo $Item['Favorite']['id']?></td>
    <td><?php echo $Item['Favorite']['title']?></td>

    <td>
        <a class="btn-sm btn-success" href="<?php echo WEBROOT?>Adminfavorite/edit/?id=<?php echo $Item['Favorite']['id']?>">編集</a>
&nbsp;&nbsp;
        <a class="btn-sm btn-warning" href="<?php echo WEBROOT.$this->name?>/valid/?id=<?php echo $Item['Favorite']['id']?>&valid=<?php echo $Item['Favorite']['valid']?>">表示<?php if($Item['Favorite']['valid'] == 1):?>不<?php endif;?>可</a>
    </td>
    <td>
        <a href="#" class="btn-sm btn-danger" onClick="dispCheck('<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['Favorite']['id']?>')">削除</a>
    </td>

</tr>
<?php endforeach?>
    </tbody>
    </table>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT?>AdminFavorite/input/">新規作成</a>
</h4>
                </div>
            </div>




        </div>
    </div>
</div>
