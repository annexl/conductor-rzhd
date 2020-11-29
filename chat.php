<head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<LINK REL=STYLESHEET TYPE="text/css" HREF="/rzd/chat/style.css">
<script type="text/javascript">

	
	function send()
	{
		var mess=$("#mess_to_send").val();
       $.ajax({
                type: "POST",
                url: "add_mess.php",
                data:"mess="+mess,
                success: function(html)
				{
					load_messes();
					$("#mess_to_send").val('');
                }
        });
	}
	
	function load_messes()
	{
		$.ajax({
                type: "POST",
                url:  "load_messes.php",
                data: "req=ok",
                success: function(html)
				{
					$("#messages").empty();
					$("#messages").append(html);
					$("#messages").scrollTop(90000);
                }
        });
	}
</script>

</head>
<div><img style="width: 50%; margin: 0 0 0 25%;" src="/rzd/chat/logo.png"></div>
<p class="text-title">Чат пассажиров фирменного поезда №21 Москва-Ульяновск 28.11.2020</p>
<table class="text">
<tr>
<td>
<div id="messages">
</div>
</td>
</tr>
<tr>
<td>
<form class="form" action="javascript:send();">
<input class="text-input" type="text" id="mess_to_send">
<div class="div-send"><input class="send-buttom " type="submit" value="Отправить"></div>
</form>
</td>
</tr>
</table>

<script>
load_messes();
setInterval(load_messes,3000);
</script>
