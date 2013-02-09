$(document).ready(function()
{
    $('#search').bind('keyup input paste' , function()
    {
        data = 'search=' + $(this).val() ;
        $.getJSON('/swap/index.php/user/getSearch', data , function(json)
        {
            $('#searchMenu').html('') ;
            if (typeof json[0].className == 'undefined' || $('#search').val() == '')
                $('#searchMenu').removeClass('open') ;
            else
            {
                $('#searchMenu').addClass('open') ;
                for (var i = 0  ; i < json.length ; i++)
                    $('#searchMenu').append('<li><a href="#" onClick="textinput(this)">' + json[i].classID + "  " + json[i].classTime + "  " +json[i].className + '</li>') ;
                //$('#searchMenu').append('<li><a href="#">' + json.className + '</li>') ;
            }
        }) ;
    }) ;
    $('#search2').bind('keyup input paste' , function()
    {
        data = 'search=' + $(this).val() ;
        $.getJSON('/swap/index.php/user/getSearch', data , function(json)
        {
            $('#searchMenu2').html('') ;
            if (typeof json[0].className == 'undefined' || $('#search2').val() == '')
                $('#searchMenu2').removeClass('open') ;
            else
            {
                $('#searchMenu2').addClass('open') ;
                for (var i = 0  ; i < json.length ; i++)
                    $('#searchMenu2').append('<li><a href="#" onClick="textinput2(this)">' + json[i].classID + "  " + json[i].classTime + "  " +json[i].className + '</li>') ;
                //$('#searchMenu').append('<li><a href="#">' + json.className + '</li>') ;
            }
        }) ;
    }) ;
});

function textinput (obj)
{
        $('#search').val(obj.innerHTML) ;
        $('#searchMenu').removeClass('open') ;
};

function textinput2 (obj)
{
        $('#search2').val(obj.innerHTML) ;
        $('#searchMenu2').removeClass('open') ;
};