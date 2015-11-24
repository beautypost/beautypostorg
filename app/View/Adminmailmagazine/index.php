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
			<th>タイトル</th>
			<th>配信日時(予定)</th>
			<th>配信済み</th>
			<th>編集</th>
                            </tr>
                        </thead>
                        <tbody>

<?php foreach($Mailmagazines as $Item):?>
<tr>
			<td ><?php echo $Item['Mailmagazine']['id'];?></td>
			<td class=""><?php echo $Item['Mailmagazine']['title'];?></td>
			<td class=""><?php echo $Item['Mailmagazine']['send_date'];?></td>
			<td class=""><?php echo $Item['Mailmagazine']['send_flag'];?></td>
			<td class="">
			<?php if($Item['Mailmagazine']['send_flag'] !=1):?>
			<a href="<?php echo WEBROOT?>Adminmailmagazineedit/?mailmagazineID=<?php echo $Item['Mailmagazine']['id']?>" class="btn btn-success">編集</a>
			<?php endif;?>
			</td>
</tr>
<?php endforeach?>
    </tbody>
    </table>
<h4 class="pink">
    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
    <a href="<?php echo WEBROOT?>Adminmailmagazineedit/">新規作成</a>
</h4>
                </div>
            </div>




        </div>
    </div>
</div>
