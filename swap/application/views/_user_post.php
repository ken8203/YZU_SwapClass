<form method="POST" action="<?=site_url('/user/post')?>">
<div class='page secondary'>
    <input type="text" class="border-color-yellow span6" id="search" name="search" />
    <ul class="dropdown-menu" id="searchMenu">
    </ul>
</div>
 <label class="input-control radio">
     <input type="radio" name="r1" checked>
     <span class="helper" >換課</span>
</label>
<label class="input-control radio">
     <input type="radio" name="r1">
     <span class="helper">放水流</span>
</label>
<div class='page secondary'>
    <input type="text" class="border-color-yellow span6" id="search2" name="search2"/>
    <ul class="dropdown-menu" id="searchMenu2">
    </ul>
</div>
<input type="submit" value="POST" class="bg-color-pink fg-color-white" />
</form>