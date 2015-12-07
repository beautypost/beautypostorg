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
        <?php foreach($GenreKisyu as $Item):?>
            <tr>
            <td><?php echo $Item['Genre']['id']?></td>
            <td><?php echo $Item['Genre']['title']?></td>
            <td>
            <a class="btn-sm btn-success" href="<?php echo WEBROOT.$this->name?>/edit/?id=<?php echo $Item['Genre']['id']?>">編集</a>
            </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
    </div>

</div>

