<div class="page secondary">
    <table class="hovered">
        <tr>
            <td>狀態</td>
            <td class="right">欲拋出</td>
            <td class="right">評等</td>
            <td class="right">換取</td>
            <td class="right">評等</td>
            
        </tr>
        <? foreach ($result as $article) { ?>
        <tr class="<? echo $article->bgcolor ?>">
            <td><? echo $article->status ?></td>
            <td class="right"><? echo $article->classID1 ?></td>
            <td>爽課 <div class="rating small" data-role="rating" data-param-vote="off"></div> 實用 <div class="rating small" data-role="rating" data-param-vote="off"></div></td>
            <td class="right"><? echo $article->classID2 ?></td>
            <td>爽課 <div class="rating small" data-role="rating" data-param-vote="off"></div> 實用 <div class="rating small" data-role="rating" data-param-vote="off"></div></td>
        </tr>
        <? } ?>
    </table>
</div>  