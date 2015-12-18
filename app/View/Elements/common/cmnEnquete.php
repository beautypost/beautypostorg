<h2><!--
                     --><img src="<?php echo $this->webroot?>common-img/side-enquete-head-full.png" width="882" height="192" class="fitimg-w rsp-ooox" alt="美活アンケート実施中！"><!--
                     --><img src="<?php echo $this->webroot?>common-img/side-enquete-head.png" width="480" height="128" class="fitimg-w rsp-xxxo" alt="美活アンケート実施中！"><!--
                 --></h2>
                 <form method="post" action="<?php echo WEBROOT?>Question/Vote">
                <section class="mt0">
                    <h2 class="enquete-head"><i class="fa fa-chevron-circle-right">&#8203;</i> 第<?php echo $Questions[0]['Question']['number']?>回美容アンケート投票中</h2>
                    <div class="round-contents-body">
                        <p>
                        <?php echo $Questions[0]['Question']['title']?><br /><br />
                        </p>
                        <ul>
                        <?php foreach($Questions[0]['QuestionValue'] as $k => $v):?>
                            <li><input type="radio" name="data[question_value_id]" value="<?php echo $v['id']?>"><?php echo $v['value']?></li>
                        <?php endforeach;?>
                        </ul>
                        <footer>
                            <ul class="clearfix">
                                <li class="fll"><input type="submit" class="button btn-pk" value="投票する"></li>
                                <li class="flr"><a href="<?php echo $this->webroot?>Question/detail/<?php echo $Questions[0]['Question']['id']?>" class="button btn-gd">結果を見る</a></li>
                            </ul>
                        </footer>
                    </div><!-- /.round-contents-body -->
                </section>
                <input type="hidden" name="data[question_id]" value="<?php echo $Questions[0]['Question']['id']?>">
            </form>
            <?php if(isset($Questions[1])):?>
                <section>
                    <h2 class="enquete-head"><i class="fa fa-chevron-circle-right">&#8203;</i> 第<?php echo $Questions[1]['Question']['id']?>回美容アンケート結果発表</h2>
                    <div class="round-contents-body">
                        <p><?php echo $Questions[1]['Question']['title']?></p>
                        <div class="answer">
                            <p>総回答数：<span class="txt-c-pk"><?php echo $Questions[1]['Question']['totalpoints']?></span>件</p>
                            <table>
                                <?php foreach($Questions[1]['QuestionValue'] as $k => $v):?>
                                <tr>
                                    <th><span><?php echo $v['value']?></span></th>
                                    <td><span class="bar" style="width:<?php if($Questions[1]['Question']['totalpoints'] !=0){echo floor(($v['points'] / $Questions[1]['Question']['totalpoints']) * 100);}else{echo '0';}?>%">&#8203;</span></td>
                                    <td><span><span class="txt-c-pk"><?php echo $v['points']?></span>件</span></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                        </div><!-- /.answer -->
                        <footer>
                            <a href="<?php echo $this->webroot?>Question/Index" class="button btn-block btn-gd">さらに過去のアンケート結果を見る</a>
                        </footer>
                    </div><!-- /.round-contents-body -->
                </section>
                <?php endif;?>