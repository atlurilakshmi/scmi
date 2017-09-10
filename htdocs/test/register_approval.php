<script language="javascript" type="text/javascript">
function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

var page = 'approval_action.php?'+'<?php echo $_SERVER['QUERY_STRING']; ?>';
PopupCenter(page, 'ScimoresApprovalAction', 400, 400);
</script>