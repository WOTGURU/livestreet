Плагин "File Archive" (версия 1.0.1) для LiveStreet 1.0.3


ОПИСАНИЕ

Добавляет новый тип топика "Файл".

Настройка плагина осуществляется редактированием файла "/plugins/filearchive/config/config.php".

Поддерживаемые директивы:
1) $config['text_max_length'] - Максимальное количество символов в одном топике-файле

2) $config['uploads_files'] - Путь к каталогу с файлами

3) $config['max_size'] - Максимальный размер файла, байт. По умолчанию 1 Мб.

4) $config['only_users'] - Доступ к скачиванию только пользователям. По умолчанию включено (true).

5) $config['use_limit'] - Использовать ограничение рейтинга для доступа к скачиванию (используется при
$config['only_users'] = true). По умолчанию отлючено (false).

6) $config['limit_rating'] - Порог рейтинга при котором юзер может скачивать топики (используется при
$config['only_users'] = true и $config['use_limit'] = true). По умолчанию 0.

7) $config['allow_ext'] - Разрешенные расширения для файла. По умолчанию - 'pdf', 'rar', 'zip'.

8) $config['show_info'] - Показывать число скачиваний в панели информации топика. По умолчанию включено (true).

9) $config['show_write_item'] - Добавить иконку в меню "Создать". По умолчанию отлючено (false).



УСТАНОВКА

1. Скопировать плагин в каталог /plugins/
2. Через панель управления плагинами (/admin/plugins/) запустить его активацию.



ИЗМЕНЕНИЯ
1.0.1 (19.12.2013)
- Добавлена функция isFile() - для проверки, является ли топик файлом.
- Добавлено отображение иконки и числа скачиваний.
- Добавлен параметр $config['show_info'] - Показывать число скачиваний в панели информации топика.
- Добавлена обработка тега <cut>.
- Сокращенный вывод описания в списке топиков.
- Добавлено ограничение рейтинга на скачивание.
- Добавлен параметр $config['use_limit'] - Использовать ограничение рейтинга для доступа к скачиванию.
- Добавлен параметр $config['limit_rating'] - Порог рейтинга при котором юзер может скачивать топики.



АВТОР
Александр Вереник

САЙТ 
https://github.com/wasja1982/livestreet_filearchive
