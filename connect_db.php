<?php # CONNECT TO MySQL DATABASE.

# Connect  on 'localhost' for user 'mike' with password 'easysteps' to database 'site_db'.
$dbc = @mysqli_connect ( 'rei.cs.ndsu.nodak.edu', 'martinsb', 'D5XCgK5zyx3zWSQ', 'martinsb' )

# Otherwise fail gracefully and explain the error. 
OR die ( mysqli_connect_error() ) ;

# Set encoding to match PHP script encoding.
mysqli_set_charset( $dbc, 'utf8' ) ;
?>