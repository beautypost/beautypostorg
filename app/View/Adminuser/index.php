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
                                <th>User名</th>
                                <th>ニックネーム</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($Snsusers as $Item):?>
<tr>
    <td><?php echo $Item['Snsuser']['id']?></td>
    <td><?php echo $Item['Snsuser']['created']?></td>
    <td><?php echo $Item['Snsuser']['first_name']?><?php echo $Item['Snsuser']['last_name']?></td>
    <td><?php echo $Item['Snsuser']['name']?></td>
    <td>
        <a class="btn-sm btn-success" href="<?php echo WEBROOT.$this->name?>/edit/?id=<?php echo $Item['Snsuser']['id']?>">編集</a>
&nbsp;&nbsp;
        <a class="btn-sm btn-warning" href="<?php echo WEBROOT.$this->name?>/invalid/?id=<?php echo $Item['Snsuser']['id']?>">ログイン不可</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a class="btn-sm btn-danger" href="<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['Snsuser']['id']?>">削除</a>
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
