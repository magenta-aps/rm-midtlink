<?php

$filter = array('offset' => 0, 'limit' => 50,'sort' => 'last_visit DESC');

$department = isset($Params['user_parameters_unordered']['department']) && is_numeric($Params['user_parameters_unordered']['department']) ? (int)$Params['user_parameters_unordered']['department'] : false;
if ($department !== false){
	$filter['filter']['dep_id'] = $department;
}

$items = erLhcoreClassModelChatOnlineUser::getList($filter);

$returnItems = array();

foreach ($items as $item) {
			if ($item->lat != 0 && $item->lon != 0) {
				$returnItems[] = array (
					"Id" => (string)$item->id,
					"Latitude" => $item->lat,
					"Longitude" => $item->lon,
					"icon" => $item->chat_id > 0 ? erLhcoreClassDesign::design('images/icons/home-chat.png') :  ($item->operator_message == '' ? erLhcoreClassDesign::design('images/icons/home-unsend.png') : erLhcoreClassDesign::design('images/icons/home-send.png'))
				);
			}
}

echo json_encode(array('result' => $returnItems));

exit();