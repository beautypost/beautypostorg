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
			<th>ID</th>
            <th>配信日時</th>
			<th>タイトル</th>
            <th>編集</th>
            <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>

            <?php foreach($Mailmagazines as $Item):?>
                <tr>
    			<td ><?php echo $Item['Mailmagazine']['number'];?></td>
                <td class=""><?php echo $Item['Mailmagazine']['send_date'];?></td>
    			<td class=""><?php echo $Item['Mailmagazine']['title'];?></td>

    			<td class="">
    			<a href="<?php echo WEBROOT?>Adminmailmagazine/edit/?id=<?php echo $Item['Mailmagazine']['id']?>" class="btn-sm btn-success">編集</a>
    			</td>
                <td>
                    <a href="#" class="btn-sm btn-danger" onClick="dispCheck('<?php echo WEBROOT.$this->name?>/delete/?id=<?php echo $Item['Mailmagazine']['id']?>')">削除</a>
                </td>

                </tr>
            <?php endforeach?>
            </tbody>
            </table>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT?>Adminmailmagazine/input">新規作成</a>
</h4>
                </div>
            </div>




        </div>
    </div>
</div>
