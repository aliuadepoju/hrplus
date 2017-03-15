<?php 

function ActivityLog($action_group, $action, $comment, $ip){
	$log = new \App\ActivityLog();
	$log->user_id = \Auth::user()->id;
	$log->action_group = "$action_group";
	$log->action = $action;
	$log->ip_address = $ip;
	$log->comment = $comment;
	$log->save();
}