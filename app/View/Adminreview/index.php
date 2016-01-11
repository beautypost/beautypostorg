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
    <td><?php echo $Item['ItemsReview']['id']?></td>
    <td><?php echo $Item['ItemsReview']['created']?></td>
    <td><a href="<?php echo WEBROOT?>Collection/detail/<?php echo $Item['ItemsReview']['item_id']?>" target="_"><?php echo $Item['ItemsReview']['item_id']?></a></td>
    <td><a href="<?php echo WEBROOT?>Adminuser/edit/?id=<?php echo $Item['ItemsReview']['user_id']?>"><?php echo $Item['SnsUser']['name']?></a></td>
    <td><?php echo $Item['ItemsReview']['title']?></td>
    <td><?php echo $Item['ItemsReview']['comment']?></td>
    <td>
    <?php echo $Item['ItemsReview']['point1']?> /
    <?php echo $Item['ItemsReview']['point2']?> /
    <?php echo $Item['ItemsReview']['point3']?> /
    <?php echo $Item['ItemsReview']['point4']?> /
    <?php echo $Item['ItemsReview']['point5']?> /
    </td>

    <td>
        <a class="btn-sm btn-warning" href="<?php echo WEBROOT.$this->name?>/valid/?id=<?php echo $Item['ItemsReview']['id']?>&valid=<?php echo $Item['ItemsReview']['valid']?>">表示<?php if($Item['ItemsReview']['valid'] == 1):?>不<?php endif;?>可</a>
    </td>
    <td>
        <a href="#" class="btn-sm btn-danger" onClick="dispCheck('<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['ItemsReview']['id']?>')">削除</a>
    </td>
</tr>
<?php endforeach?>
    </tbody>
    </table>
                </div>
            </div>




        </div>
    </div>
</div>
