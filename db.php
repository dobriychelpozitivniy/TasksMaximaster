<?php
require_once __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/config.php';
class_alias('\RedBeanPHP\R', '\R');

R::setup(  // Записываем данные для подключения к БД
  "mysql:host=$dbhost;port=$dbport;dbname=$dbname",
  "$dblogin",
  ''
);
if (!R::testConnection()) { // Проверяем подключение к БД
  exit('Нет соединения с базой данных');
}


function AddCommentInDB() // Добавить запись в БД
{/*  */
  $text = trim($_POST['textForm']);
  $name = trim($_POST['nameForm']);
  $date = date("Y-m-d H:i:s");
  $response = [];
  if ($text) {
    try {
      $name = $name ?: 'Anonim';
      $comment = R::dispense('gBook'); // Получает шаблон таблицы или создает его 
      $comment->text = $text; // Поле text таблицы
      $comment->name = $name; // Поле name таблицы
      $comment->date = $date; // Поле date таблицы
      R::store($comment); // Отправляем новую запись в БД
      R::close(); // Закрываем соединение

      $response = ["green", "Вы успешно добавили запись"];
      echo json_encode($response);
    } catch (\Throwable $th) {
      throw $th;
    }
  } else if (!$text) {
    $response = ["red", "Вы не заполнили поле с текстом"];
    echo json_encode($response);
    exit;
  }
}

function GetLastThreeComments() // Возвращает массив последних трех записей в БД
{
  try {
    $assocComments = R::getAll('SELECT date,name,text FROM gBook ORDER BY `id` DESC LIMIT 3');
    return ($assocComments);
    R::close();
  } catch (\Throwable $th) {
    throw $th;
  }
}
