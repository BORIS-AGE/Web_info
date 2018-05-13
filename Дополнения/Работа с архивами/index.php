<?php require_once "pclzip.lib.php";

 $timer = new PclZip("timer.zip"); // создание образа класса с архивом 

 $timer->extract(); // распаковка

 $timer->extract(PCLZIP_OPT_PATH, 'zz'); // распаковка в папку


  $var = $timer->extract( // в переменную запишуться все значения файлов ( размер вес, посмотреть через var_damp
        PCLZIP_OPT_BY_PREG, '/\.js/', // поиск по регулярке 
        PCLZIP_OPT_PATH, 'zz'
        PCLZIN_OPT_SET_CHMOD, '0777' // только для чтения
        PCLZIP_OPT_REMOVE_ALL_PATH // открыть без папок, все файлы наружу
        PCLZIP_OPT_REMOVE_PATH, 'js' // из конкретной папки все в корень 
        PCLZIP_CB_PRE_EXTRACT, 'my_func', // вызов функции до распаовки архива
        PCLZIP_CB_POST_EXTRACT, 'my_func2' // вызов функции после  распаовки архива
        функции принимают 2 параметра $p_event - хз $p_header - все элементы архива, вернуть 1 при конце функции 
    );

$arh = new PclZip("archive.zip"); // создаь архив
$arh->create(
    'pclzip.lib.php', // имя файла, который нжо поместить
    'arh', // папка для этого файла 
    PCLZIP_OPT_NO_COMPRESSION, // добавть без сжатия
    PCLZIP_OPT_ADD_PATH, 'one'
    PCLZIP_OPT_REMOVE_ALL_PATH // сохранить без папок, все файлы наружу
    PCLZIP_OPT_COMMENT,'Add comment'// добавляет комментарий 
    PCLZIP_CB_PRE_ADD, 'my_func', // вызов функции до создания архива
    PCLZIP_sCB_POST_ADD, 'my_func2' // вызов функции после  создания архива
      
);
$arh->listContent(); // возвращает массив с характеристиками файлов, с которыми работает

$arh->properties(); // сатус архива 

$arh->add(
        array("index.php"), // добавить массив элементов
        PCLZIP_OPT_COMMENT, 'add_comment1',// сохдание комментария
        PCLZIP_OPT_ADD_COMMENT, 'new comment2', // добавление комметария
        PCLZIP_OPT_PREPEND_COMMENT, 'prev comment2', // добавление комметария перед остальными
        PCLZIP_OPT_NO_COMPRESSION, // добавть без сжатия
        PCLZIP_OPT_ADD_PATH, 'one' // добавление в папку
        
);







