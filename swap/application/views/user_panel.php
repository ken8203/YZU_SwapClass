<?php 
    include ('_site_header.php') ; 
    include ('_user_match.php') ; ?>
<div class="page secondary">
    <a href="<?=site_url('/')?>" class="button bg-color-blue">HOME</a>
    <table class="hovered">
        <tr>
            <td><input type="checkbox" id="allcheck"> 刪?</td>
            <td>狀態</td>
            <td class="right">欲拋出</td>
            <td class="right">評等</td>
            <td class="right">換取</td>
            <td class="right">評等</td>
        </tr>
        <? foreach ($result as $article) { ?>
        <tr class="<? echo $article->bgcolor ?>">
            <td> <input type="checkbox" value="<? echo $article->id ?>"></td>
            <td><? echo $article->status ?></td>
            <td class="right"><? echo $article->classID1 ?></td>
            <td>爽課 <div class="rating small" data-role="rating" data-param-vote="off"></div> 實用 <div class="rating small" data-role="rating" data-param-vote="off"></div></td>
            <td class="right"><? echo $article->classID2 ?></td>
            <td>爽課 <div class="rating small" data-role="rating" data-param-vote="off"></div> 實用 <div class="rating small" data-role="rating" data-param-vote="off"></div></td>
        </tr>
        <? } ?>
    </table>
</div>
<?php include ('_site_footer.php') ; ?>