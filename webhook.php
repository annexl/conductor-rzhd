<?php
$host="localhost";
$user="host1400948_rzd";
$password="43439201+-";
$db="host1400948_rzd";
mysql_connect($host, $user, $password); 
mysql_select_db($db); 
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER SET 'utf8'");
setlocale(LC_CTYPE,'ru_RU.utf8');
mb_internal_encoding("utf8");

$dataRow = file_get_contents('php://input');
header('Content-Type: application/json');

$SkillName = 'ФИРМЕННЫЙ навык РДЖ';
include 'buttons.php';

try{
    if (!empty($dataRow)) {
        $data = json_decode($dataRow, true);
        if (!isset($data['request'], $data['request']['command'], $data['session'], $data['session']['session_id'], $data['session']['message_id'], $data['session']['user_id'])) {
            $result = json_encode([]);
        } else {
            $text = $data['request']['command'];
			$user_id_in = $data['session']['user_id'];
			$user_id = "https://sm-73.ru/rzd/chat/index.php?user_id_alice=$user_id_in";
            session_id($data['session']['session_id']); 
            session_start();

            $textToCheck = strtolower($text);

            if (empty($text) || $text == 'Назад')  {
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Привет, я фирменный навык РЖД. Я помогу тебе на вокзале и в дороге.
Вы на вокзале или уже в вагоне?',
                        'tts' => 'Привет, я фирменный навык РЖД. Я помогу тебе на вокзале и в дороге.
Вы на вокзале или уже в вагоне?',
                        'buttons' => $buttons_start
                    ]
                ]);
			}
			elseif($text == 'назад') {
				            $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Привет, я фирменный навык РЖД. Я помогу тебе на вокзале и в дороге.
Вы на вокзале или уже в вагоне?',

                        'tts' => 'Привет, я фирменный навык РЖД. Я помогу тебе на вокзале и в дороге.
Вы на вокзале или уже в вагоне?',
                        'buttons' => $buttons_start
                    ]
                ]);
            }
			elseif($text == 'уже в вагоне') {
				include 'in_train.php';
            }
			elseif(strpos($text, 'купе') !== false) {
				include 'in_train.php';
            }
			///Напитки
			elseif($text == 'чай') {
				
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
					'response' => [
                        'text' => 'Куда доставить? Например - вагон 3, место 10.',
                        'tts' => 'Куда доставить? Например - вагон 3, место 10.',
                        'buttons' => [['title'=>'Назад', 'hide'=>true]]
                    ]
                ]);
            }

			elseif(strpos($text, 'место')!== false) {
				
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
					'response' => [
                        'text' => 'Чай',
                        'tts' => 'Ароматный чай',
						'card'=> [
						'type' => 'BigImage',
						'image_id' => '937455/009d11746202206dcbba',
						'title' => 'Чай, черный  премиум с сахаром и лимоном ',
						'description' => 'Стоимость - 159 руб.',
						'button' => [
							'text' => 'Купить',
							'url' => 'https://cent.app/transfer/Ok703Kkl2q',
								]
							],
                        'buttons' => [['title'=>'Назад', 'hide'=>true]]
                    ]
                ]);
            }
			elseif($text == 'напитки') {
				
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
					'response' => [
                        'text' => 'Меню с напитками:
1 - Чай',
                        'tts' => 'Меню с напитками - просто скажите что вы хотите',
                        'buttons' => [['title'=>'Чай', 'hide'=>true]]
                    ]
                ]);
            }
			///Поиск города
			elseif(strpos($text, 'город')!== false) {
				if(strpos($text, 'москва')!== false) {
					 
					 $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Хороший город, показать справку по Казанскому вокзалу?',
                        'tts' => 'Хороший город, показать справку по Казанскому вокзалу?',
                        'buttons' => [['title'=>'Назад', 'hide'=>true], ['title'=>'Справка', 'hide'=>true]]
                    ]
                ]);
					
				} else {
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Этого города я еще не знаю',
                        'tts' => 'Этого города я еще не знаю',
                        'buttons' => [['title'=>'Назад', 'hide'=>true], ['title'=>'Помощь', 'hide'=>true]]
                    ]
                ]);
				}
            }
	
			elseif($text == 'на вокзале') {
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Уточните вокзал или город. Например - Город Москва.',
                        'tts' => 'Уточните вокзал или город. Например - Город Москва.',
                        'buttons' => $buttons_city
                    ]
                ]);
            }

			elseif(strpos($text, 'Помощь', 'Справка')!== false) {
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Фирменный навык РЖД поможет Вам с информацией о вокзале отправления, выбранном поезде и вагоне, товарах и услугах, 
входящих в стоимость проезда и предлагаемых  дополнительно, облегчит и ускорит коммуникацию с проводником и другими сервисными службами РЖД',
                        'tts' => 'Фирменный навык РЖД поможет Вам с информацией о вокзале отправления, выбранном поезде и вагоне, товарах и услугах, 
входящих в стоимость проезда и предлагаемых  дополнительно, облегчит и ускорит коммуникацию с проводником и другими с+ервисными службами РЖД',
                        'buttons' => $buttons_help
                    ]
                ]);
            } 	elseif($text == 'выход') { 
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Приятного путешествия',
                        'tts' =>  'Приятного путешествия',
                        'buttons' => [],
                        'end_session' => true 
                    ]
                ]);
            }

				elseif($text == 'чат') {
				
                $response = json_encode([
                    'version' => '1.0',
                    'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Идём в чат',
						'type' => 'SimpleUtterance',
                        'tts' => 'Идём в чат',
                        'buttons' => [['title'=>'Чат', 'hide'=>true, 'url'=>$user_id], ['title'=>'Назад', 'hide'=>true]]
                    ]
                ]);
            }
			else {



            }
        }
    } else {
        $response = json_encode([
            'version' => '1.0',
            'session' => 'Error',
            'response' => [
                'text' => 'Отсутствуют данные',
                'tts' =>  'Отсутствуют данные'
            ]
        ]);
    }

    echo $response;
} catch(\Exception $e){
    echo '["Error occured"]';
}
