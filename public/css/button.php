<?php header('Content-Type: text/css; charset=utf-8'); 
?>

.seat_mini{
    margin: 0;
    padding: 10px;
    width: 5px;
    height: 5px;
    border-color: black;
}
<?php 
/*  use DB;
    $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
    $user_id_seat = $user_id_seat->id; */
?>

.seat_mini<?php var_dump($user_id_seat); ?> {
    background-color: black;
}
