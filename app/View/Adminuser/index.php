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
                                <th>名前</th>
                                <th>ニックネーム</th>
                                <th>Status</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($Snsusers as $Item):?>
<tr>
    <td><?php echo $Item['Snsuser']['id']?></td>
    <td><?php echo $Item['Snsuser']['created']?></td>
    <td><?php echo $Item['Snsuser']['name']?></td>
    <td><?php echo $Item['Snsuser']['username']?></td>
    <td>
        <a class="btn-sm btn-success" href="<?php echo WEBROOT.$this->name?>/edit/?id=<?php echo $Item['Snsuser']['id']?>">編集</a>
&nbsp;&nbsp;
        <a class="btn-sm btn-warning" href="<?php echo WEBROOT.$this->name?>/valid/?id=<?php echo $Item['Snsuser']['id']?>&valid=<?php echo $Item['Snsuser']['valid']?>">ログイン<?php if($Item['Snsuser']['valid'] == 1):?>不<?php endif;?>可</a>
    </td>
    <td>
        <a href="#" class="btn-sm btn-danger" onClick="dispCheck('<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['Snsuser']['id']?>')">削除</a>
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
