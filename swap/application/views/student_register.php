<?php include ('_site_header.php') ; ?>
<form action="<?=site_url('/main/register')?>" method="post">
    <div class="input-control text span4">
        <input type="text" name="studentNumber" placeholder="s + 您的學號" />
        <input type="text" name="confirm" placeholder="再次輸入您的學號" />
        <button class="helper"></button>
        <input id="register" type="submit" value="登記" />
    </div>
</form>
<?php include ('_site_footer.php') ; ?>