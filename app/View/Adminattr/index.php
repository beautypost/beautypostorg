<div class="main-content">
    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>

        <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
    <h4>機種一覧&nbsp;&nbsp;
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
        <?php foreach($Attrs as $Item):?>
            <tr>
            <td><?php echo $Item['Attr']['id']?></td>
            <td><?php echo $Item['Attr']['title']?></td>
            <td>
            <a class="btn-sm btn-success" href="<?php echo WEBROOT.$this->name?>/edit/?id=<?php echo $Item['Attr']['id']?>">編集</a>
            </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT?>Adminattr/input/">新規作成</a>
</h4>

    </div>

</div>

