<?php include ('_site_header.php') ;
if (isset($alreadyRegist)) 
{
    include ('_user_post.php') ;
?>
<a href="<?=site_url('user/panel')?>" class="button bg-color-blue">USER</a>
<? } else { ?>
<a href="<?php echo $url ; ?>" class="uibutton confirm large">Login with Facebook</a>
<? } ?>
    
<?php 
    include ('_swap_info.php') ;
    include ('_site_footer.php') ; 
?>