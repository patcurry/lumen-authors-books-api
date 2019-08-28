<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Find Authors

$router->get('/authors', ['uses' => 'AuthorController@showAllAuthors']);

$router->get('/authors/{author_id}', ['uses' => 'AuthorController@showOneAuthor']);

// Author CRUD

$router->post('/authors', ['uses' => 'AuthorController@createAuthor']);

$router->put('/authors/{author_id}', ['uses' => 'AuthorController@updateAuthor']);

$router->delete('/authors/{author_id}', ['uses' => 'AuthorController@deleteAuthor']);

// Find Books

$router->get('/books', ['uses' => 'BookController@showAllBooks']);

$router->get('/authors/{author_id}/books/{book_id}', ['uses' => 'BookController@showOneBook']);

// Book CRUD

$router->post('/authors/{author_id}/books', ['uses' => 'BookController@createBook']);

$router->put('/authors/{author_id}/books/{book_id}', ['uses' => 'BookController@updateBook']);

$router->delete('/authors/{author_id}/books/{book_id}', ['uses' => 'BookController@deleteBook']);

