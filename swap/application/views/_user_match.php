<div class="page secondary">
 <? if (isset($match100)) { ?>
    <span class="bg-color-blue fg-color-white">100% match</span>
    <table class="hovered">
        <tr>
            <td><input type="checkbox" /> 配對</td>
            <td class="right">欲拋出</td>
            <td class="right">評等</td>
            <td class="right">換取</td>
            <td class="right">評等</td>
        </tr>
        <? foreach ($match100 as $article) { ?>
        <tr>
            <td><input type="checkbox" /></td>
            <td class="right"><? echo $article->classID1 ?></td>
            <td>爽課 <div class="rating small" data-role="rating" data-param-vote="off"></div> 實用 <div class="rating small" data-role="rating" data-param-vote="off"></div></td>
            <td class="right"><? echo $article->classID2 ?></td>
            <td>爽課 <div class="rating small" data-role="rating" data-param-vote="off"></div> 實用 <div class="rating small" data-role="rating" data-param-vote="off"></div></td>
        </tr>
        <? } ?>
    </table>
 <? } ?>
</div>