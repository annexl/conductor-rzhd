<?php
					$response = json_encode([
                    'version' => '1.0',
					
					'session' => [
                        'session_id' => $data['session']['session_id'],
                        'message_id' => $data['session']['message_id'],
                        'user_id' => $data['session']['user_id']
                    ],
                    'response' => [
                        'text' => 'Ты можешь заказать:
1 - Еду
2 - Напитки
3 - Товары и услуги
4 - Подобрать попутчика
5 - Чат попутчиков',

                        'tts' => 'Здесь ты можешь заказать еду, напитки и услуги не выходя из своего купэ, а так же пригласить любого попутчика в ресторан.',
						'type' => 'SimpleUtterance',
						'buttons' => [['title'=>'Чат', 'hide'=>true, 'url'=>$user_id], ['title'=>'Напитки', 'hide'=>true]]
						
                    ]
                ]);
