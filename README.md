На сайте созда тип материала "Новости" в который загружен основной контент. Для разделения контента по категориям создан словарь таксономии "Категории", который выводится в материал с помощью соответствующего поля. 

Главная страница сайта: 
простой вывод блока views 6 последних записей
На главной странице представлено поле фильтра по категориям. При выборе категории, происходит перенаправление на страницу new_news с выводом материалов нужной категории

Тестовые материалы созданы при помощи модуля NewNodes. При запросе на страницу newnodes генериррует по 100 материало для каждой категории.

Api реализован модулем queryapi
Необходимо отправить GET запрос на страницу querybse
Параметры:
getcategory - возвращает id и имя категории
category=all - возвращает все новости
category=id-категории - возвращает все новости по заданной категории
category=all&date=YYYY-MM - возвращает все новости за указанный месяц
category=id&date=YYYY-MM - возвращает все новости за указанный месяц по указанной категории
