<div class="main-content">
        <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
    <?php if(isset($message)):?>
    <div class="alert alert-danger">
        <?php echo $message?>
    </div>
    <?php endif;?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center">ID</th>
                                                    <th>投票期間</th>
                                                    <th>状態</th>
                                                    <th>アンケートタイトル</th>
                                                    <th>合計投票数</th>
                                                    <th>status</th>
                                                    <th>削除</th>
                                                </tr>
                                            </thead>
                                            <tbody>

<?php foreach($Questions as $Item):?>
<tr>
    <td><?php echo $Item['Question']['id']?></td>
    <td><?php echo $this->Useful->setdate($Item['Question']['start'])?>〜<?php echo $this->Useful->setdate($Item['Question']['end'])?></td>
    <td><?php echo $this->Useful->checktime($Item['Question']['start'],$Item['Question']['end'])?></td>
    <td><?php echo $Item['Question']['title']?></td>
    <td><?php echo $Item['Question']['total']?></td>
    <td>
    <a class="btn-sm btn-success" href="<?php echo WEBROOT.$this->name?>/edit/?id=<?php echo $Item['Question']['id']?>">編集</a>
&nbsp;&nbsp;
        <a class="btn-sm btn-warning" href="<?php echo WEBROOT.$this->name?>/valid/?id=<?php echo $Item['Question']['id']?>&valid=<?php echo $Item['Question']['valid']?>">表示<?php if($Item['Question']['valid'] == 1):?>不<?php endif;?>可</a>
    </td>
    <td>
        <a href="#" class="btn-sm btn-danger" onClick="dispCheck('<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['Question']['id']?>')">削除</a>
    </td>
    </tr>
<?php endforeach?>
    </tbody>
    </table>
                                    <h4 class="pink">
                                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

<a href="<?php echo WEBROOT?>Adminquestion/input/">アンケート新規作成</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>