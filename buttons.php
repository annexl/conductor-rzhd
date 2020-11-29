<?php
$butt_start_arr= array('На вокзале', 'Уже в вагоне', 'Помощь', 'Выход');

foreach ($butt_start_arr as $buttons_start_select) {
    $buttons_start[] = [
        'title'=>$buttons_start_select,
        'hide'=>true
    ];
}
$butt_help_arr= array('Назад');

foreach ($butt_help_arr as $buttons_help_select) {
    $buttons_help[] = [
        'title'=>$buttons_help_select,
        'hide'=>true
    ];
}
$butt_city_arr= array('Назад', 'Я уже в купе');

foreach ($butt_city_arr as $buttons_city_select) {
    $buttons_city[] = [
        'title'=>$buttons_city_select,
        'hide'=>true
    ];
}
$butt_in_train_start_arr= array('Назад');

foreach ($butt_in_train_start_arr as $buttons_in_train_start_select) {
	
		$buttons_in_train_start[] = [
				'title'=>$buttons_in_train_start_select,
				'hide'=>true,
				
    ];
	
}

$butt_back_arr= array('Назад');

foreach ($butt_back_arr as $buttons_back_select) {
    $buttons_back[] = [
        'title'=>$buttons_back_select,
        'hide'=>true
    ];
}
$butt_chat_url[] = [
				'title'=>'Чат',
				'hide'=>true,
				'type' => 'ButtonPressed',
				'url'=>$user_id
	];
								
							




