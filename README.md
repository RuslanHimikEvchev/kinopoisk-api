Простая обертка над api Кинопоиска (http://docs.kinopoiskapi.apiary.io/#reference/0)

Использование:

`test.php`

Опционально получаем запрос из GET (`/test.php?method=searchFilms&params[keyword]=первый&params[page]=3`)

`$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
 $method = $request->get('method');
 $params = $request->get('params');
 `
 
 Инициализируем Blueprint (список методов API)
 
 ``$blueprint =  new \Kinopoisk\Blueprint('blueprint.json');``
 
 Опционально, методы можно переопределять.
 
 `$blueprint
      ->addMethod('getFilm', [
          'params' => [
              'filmID', 'page'
          ],
          'description' => 'Получить фильм'
      ])`
      
 Если необходимо пересозранить метод в чертеже
 
 `$blueprint->dumpIntoFile();`
 
 Выбираем север
 
 `$server = \Kinopoisk\Type\ServerEndpointType::SERVER_PRODUCTION;`
 
 Инициализируем шлюз API
 
 `$api = new \Kinopoisk\Api\Gateway($server, $blueprint);
 $response = $api->call($method, $params);
 `
 
 В переменной `$response` - наш ответ от API