Простая обертка над api Кинопоиска (http://docs.kinopoiskapi.apiary.io/#reference/0)

Установка:

```git
    git clone https://github.com/RuslanHimikEvchev/kinopoisk-api.git
```

```composer
    composer install
```

Использование:

`test.php`

Опционально получаем запрос из GET (`/test.php?method=searchFilms&params[keyword]=первый&params[page]=3`)

```php
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
 $method = $request->get('method');
 $params = $request->get('params');
 ```
 
 Инициализируем Blueprint (список методов API)
 
 ```php
 $blueprint =  new \Kinopoisk\Blueprint('blueprint.json');
 ```
 
 Опционально, методы можно переопределять.
 
 ```php
 $blueprint
      ->addMethod('getFilm', [
          'params' => [
              'filmID', 'page'
          ],
          'description' => 'Получить фильм'
      ])
 ```
      
 Если необходимо пересохранить метод в чертеже
 
 ```php
 $blueprint->dumpIntoFile();
 ```
 
 Выбираем сервер
 
 ```php
 $server = \Kinopoisk\Type\ServerEndpointType::SERVER_PRODUCTION;
 ```
 
 Инициализируем шлюз API
 
 ```php 
 $api = new \Kinopoisk\Api\Gateway($server, $blueprint);
 $response = $api->call($method, $params);
 ```
 
 В переменной `$response` - наш ответ от API