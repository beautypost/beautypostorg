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
                                <th>日付</th>
                                <th>商品</th>
                                <th>ユーザー名</th>
                                <th>タイトル</th>
                                <th>コメント</th>
                                <th>レビュー</th>
                                <th>status</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($Items as $Item):?>
<tr>
    <td><?php echo $Item['ItemsMonitor']['id']?></td>
    <td><?php echo $Item['ItemsMonitor']['created']?></td>
    <td><a href="<?php echo WEBROOT?>Collection/detail/<?php echo $Item['ItemsMonitor']['item_id']?>" target="_"><?php echo $Item['ItemsMonitor']['item_id']?></a></td>
    <td><?php echo $Item['ItemsMonitor']['user_username']?></td>
    <td><?php echo $Item['ItemsMonitor']['title']?></td>
    <td><?php echo $Item['ItemsMonitor']['comment']?></td>
    <td>
    <?php echo $Item['ItemsMonitor']['point1']?> /
    <?php echo $Item['ItemsMonitor']['point2']?> /
    <?php echo $Item['ItemsMonitor']['point3']?> /
    <?php echo $Item['ItemsMonitor']['point4']?> /
    <?php echo $Item['ItemsMonitor']['point5']?> /
    </td>

    <td>
        <a class="btn-sm btn-warning" href="<?php echo WEBROOT.$this->name?>/valid/?id=<?php echo $Item['ItemsMonitor']['id']?>&valid=<?php echo $Item['ItemsMonitor']['valid']?>">表示<?php if($Item['ItemsMonitor']['valid'] == 1):?>不<?php endif;?>可</a>
    </td>
    <td>
        <a href="#" class="btn-sm btn-danger" onClick="dispCheck('<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['ItemsMonitor']['id']?>')">削除</a>
    </td>
</tr>
<?php endforeach?>
    </tbody>
    </table>
                </div>
            </div>

<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT.$this->name?>/input/">新規作成</a>
</h4>



        </div>
    </div>
</div>
