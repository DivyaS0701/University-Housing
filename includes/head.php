<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">
		<title> UHS | University Housing System</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" href="css/fileinput.min.css">
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript">
			function valid() {
				if ( document.registration.password.value != document.registration.cpassword.value ) {
					alert( "Password and confirm password dont match!" );
					document.registration.cpassword.focus();
					return false;
				}
				return true;
			}
		</script>

<script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow( URLStr, left, top, width, height ) {
                if ( popUpWin ) {
                    if ( !popUpWin.closed ) popUpWin.close();
                }
                popUpWin = open( URLStr, 'popUpWin',
                    'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' +
                    510 + ',height=' + 430 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top +
                    '' );
            }
        </script>

<script>
        function getRoomtype(val) {
            $.ajax({
                type: "POST",
                url: "room_type.php",
                data: 'roomid=' + val,
                success: function(data) {

                    $('#room_type').val(data);
                }
            });

            $.ajax({
                type: "POST",
                url: "room_type.php",
                data: 'rid=' + val,
                success: function(data) {

                    $('#fpm').val(data);
                }
            });
        }
        </script>
