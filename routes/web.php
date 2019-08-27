<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('/authors', ['uses' => 'AuthorController@showAllAuthors']);

$router->get('/authors/{author_id}', ['uses' => 'AuthorController@showOneAuthor']);

$router->post('/authors', ['uses' => 'AuthorController@createAuthor']);

$router->put('/authors/{author_id}', ['uses' => 'AuthorController@updateAuthor']);

$router->delete('/authors/{author_id}', ['uses' => 'AuthorController@deleteAuthor']);

/*

$router->get('/books', function () use ($router) {
    return response('Show book list on this page.', 200);
});

$router->get('/authors/{author_id}', function ($author_id) {
    return response('Show the author with ID number '.$author_id.' on this page.', 200);
});

$router->get('/authors/{author_id}/books', function ($author_id) {
    return response('Show the books written by author with ID number '.$author_id.' on this page.', 200);
});

$router->get('/authors/{author_id}/books/{book_id}', function ($author_id, $book_id) {
    return response('Show the book with ID number '.$book_id.' written by the author with ID number '.$author_id.' on this page.', 200);
});


// create author

// update author

// delete author

// create book 

// update book

// delete book

 */
