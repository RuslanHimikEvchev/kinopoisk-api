<?php

error_reporting(1);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';


$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$method = $request->get('method');
$params = $request->get('params');

$server = \Kinopoisk\Type\ServerEndpointType::SERVER_PRODUCTION;
$blueprint =  new \Kinopoisk\Blueprint('blueprint.json');
//$blueprint
//    ->addMethod('getFilm', [
//        'params' => [
//            'filmID', 'page'
//        ],
//        'description' => 'Получить фильм'
//    ])
//    ->addMethod('getGallery', [
//        'params' => [
//            'filmID', 'page'
//        ],
//        'description' => 'Кадры фильма'
//    ])
//    ->addMethod('getStaff', [
//        'params' => [
//            'filmID', 'page'
//        ],
//        'description' => 'Режисеры, актеры, операторы'
//    ])
//    ->addMethod('getSimilar', [
//        'params' => [
//            'filmID', 'page'
//        ],
//        'description' => 'Похожие фильмы'
//    ])
//    ->addMethod('getGenres', [
//        'params' => ['page'],
//        'description' => 'Список жанров'
//    ])
//    ->addMethod('getTopGenre', [
//        'params' => ['page'],
//        'description' => 'ТОП жанров',
//        'alert' => 'АРГУМЕНТЫ НЕИЗВЕСТНЫ, ПОВЕДЕНИЕ НЕ ПРОВЕРЕНО'
//    ])
//    ->addMethod('getReviews', [
//        'params' => [
//            'filmID', 'page'
//        ],
//        'description' => 'Список отзывов'
//    ])
//    ->addMethod('getReviewDetail', [
//        'params' => [
//            'reviewID'
//        ],
//        'description' => 'Полный отзыв'
//    ])
//    ->addMethod('getPeopleDetail', [
//        'params' => [],
//        'description' => 'Информация о пользователе'
//    ])
//    ->addMethod('getTodayFilms', [
//        'params' => ['genreID'],
//        'description' => 'Фильмы в прокате'
//    ])
//    ->addMethod('getCinemas', [
//        'params' => ['page'],
//        'description' => 'Список кинотеатров'
//    ])
//    ->addMethod('getCinemaDetail', [
//        'params' => [
//            'cinemaID', 'page'
//        ],
//        'description' => 'Информация о кинотеатре'
//    ])
//    ->addMethod('getSeance', [
//        'params' => [
//            'filmID', 'page'
//        ],
//        'description' => 'Сеансы на фильм'
//    ])
//    ->addMethod('searchGlobal', [
//        'params' => [
//            'keyword', 'page'
//        ],
//        'description' => 'Глобальный поиск'
//    ])
//    ->addMethod('searchFilms', [
//        'params' => [
//            'keyword', 'page'
//        ],
//        'description' => 'Поиск фильмов'
//    ])
//
//;
//
//$blueprint->dumpIntoFile();

$api = new \Kinopoisk\Api\Gateway($server, $blueprint);
$response = $api->call($method, $params);

print_r($response);