# PHP Games Project
## Инструкции за инсталация
Първоначално е нужно да имате .env файл. В проекта е включен .env.example - копирате го и го преименувате на само .env а в него променяте стойността на APP_KEY на "base64:wyJUmqsU2+4V/h7TmuukulbvdpW6xQBrXxuhDDNAxTI=" (без кавичките). Стойността на DB_DATABASE трябва да отговаря на името на празна таблица във вашият phpMyAdmin. След това е нужно да инсталирате composer към проекта. Това става като изпълните командата
~~~bash
composer install
~~~
в директорията на проекта.

За изпълнение на миграциите стартирайте командата
~~~bash
php artisan migrate
~~~

За изпълнение на сийдовете стартирайте командата
~~~bash
php artisan db:seed
~~~

Ако има проблем с визуализацията на изображения стартирайте командата
~~~bash
php artisan storage:link 
~~~
## Начин на работа
Създаване на нов обект, промяна, преглед или изтриване на съществуващ такъв става чрез админ панела - /admin след URL на сайта. За достъп до админ панела се изисква логин или регистрация.
### Функционалност
Приложението съдържа информация за игри, техните производители и жанрове :

Игри - име, година, производител, жанрове и лого ;

Производители - име и година ;

Жанрове - име ;

Публичната част съдържа информация за игри, като има възможност за търсене по име на игра, име на производител, година на създаване на играта.

## Създаване на проекта

### Проектът е създаден чрез помощтта на:

Composer – Dependency Manager

Laravel – PHP Framework

Backpack for Laravel – Admin Panel

При създаването на проекта чрез composer е важно да уточним че искаме да инсталираме и Laravel което става чрез командата 
~~~bash
composer create-project --prefer-dist laravel/laravel PROJECTNAME 
~~~
където PROJECTNAME е името на проекта. Това автоматично ще добави Laravel и всички нужни за него пакети.

След това, за да добавим и Backpack Admin Panel към проекта трябва да създадем база данни в phpMyAdmin, чието име да съвпада с името на базата данни към която е описана връзка в .env файла на новосъздадения ни проект. Когато това е готово изпълняваме 4 команди:
~~~bash
 composer require backpack/crud
~~~
~~~bash
composer require backpack/generators --dev
~~~
~~~bash
composer require laracasts/generators --dev
~~~
и накрая 
~~~bash
php artisan backpack:install
~~~
Админ панелът вече е създаден и можем да се регистрираме в него.

Следваща стъпка е да създадем обектите в базата данни, с които ще работим. Първо си създаваме миграция с командата php artisan make:migration create_NAME_table където NAME е името с което искаме да създадем таблицата. Всяка миграция има 2 основни метода: Up и Down.
Up метода е отговорен за създаването на таблицата, а Down за изтриването и. Първоначално таблицата има 3 колони: Id, Created_At и Updated_At. Можем да променим това в метода като за всяка допълнителна колона добавим нов ред от типа
~~~php
 $table->TYPE(‘NAME’);
 ~~~
където е TYPE тъипът, а NAME – името. По този начин създаваме по една миграция за всеки от обектите, в нашия случай:

Жанрове – с допълнителна колона за име на жанра,

Производители – с допълнителни колони за име на производителя и година на създаване,

Игри – с допълнителни колони за име, година, производител и снимка,

Междинна таблица за игри и жанрове – с допълнителни колони за id на жанр и id на игра.

За да изпълним миграциите и те да създадат обектите в базата данни е нужно да изпълним командата php artisan migrate . Базата данни е готова.

След като създадем таблиците е време да създадем и CRUD за всеки от обектите. Това става с командата 
~~~bash 
php artisan backpack:crud NAME 
~~~  
където NAME е името на таблицата в единствено число. Backpack автоматично създава controller, model, request и route вързани с дадения обект от базата данни. Правим това за всички таблици, освен междинната.
Сега е време да опишем и връзките между обектите ни. В нашия случай връзките са:

Игра – Жанр : Много към много с междинна таблица,

Игра – Производител : Едно към много.
За да се получи това, в модела, създаден ни към таблица Игри добавяме две нови функции – по една за всяка връзка. 
Функцията за връзка Много към Много трябва да връща 
~~~php
$this->belongsToMany(CLASS::class, ‘PIVOT’ ,'OWN', 'FOREIGN');
~~~
където CLASS е името на модела към когото искаме да свържем конкретния модел, PIVOT е името на междинната таблица, OWN е името на колоната отговаряща на ключа на конкретния модел, а FOREIGN е името на колоната отговаряща на ключа на модела към когото искаме да свържем конкретния модел.
Функцията за връзка Едно към Много трябва да връща 
~~~php
$this->belongsTo(CLASS::class,'FOREIGN','OWN');
~~~
където CLASS е името на модела към когото искаме да свържем конкретния модел, FOREIGN е името на колоната в конкретния модел, отговаряща на ключа на модела към когото искаме да свържем конкретния модел, а OWN е името на колоната отговаряща на ключа на модела с когото искаме да свържем.

Връзките са готови, но за да можем да избираме жанрове и производители от вече добавените записи в таблиците при създаване на обекти в админ панела трябва да добавим метода getFieldsData в crud контролера на Игрите. Този метод позволява ръчно да настроим кои стойности как да бъдат вземани от моделите и представяни при създаване на нов обект. В нашият случай за да добавим полета жанр добавяме : 
~~~php
     'label'     => "Genres",
                'type'      => ($show ? "select": 'select2_multiple'),
                'name'      => 'genres',
                'entity'    => 'genres', 
                'model'     => "App\Models\Genre",
                'attribute' => 'name', 
                'pivot'     => true,
~~~
където label е какво ще изписва над полето за попълване, type е начинът по който ще се добавя информацията (текст, дропдаун меню и т.н.), name е името на таблицата, от която ще идват възможностите, entity е името на метода, описващ връзката между моделите, model е моделът на външната таблица, attribute e колоната от външната таблица, чиито стойности ще се показват за избор и pivot е дали връзката използва междинна таблица.
Същото правим за производител, като обаче там типът не е select2_multiple, а е само select2. Тук трябва да добавим информация и за добавянето на снимки. Това става по същия начин:
~~~php
     'label' => "Logo",
                'name' => "image",
                'type' => 'image',
                'crop' => true,
                'aspect_ratio' => 1
~~~
където crop е дали да имаме възможност за изрязване на снимката след качване и ако да чрез aspect_ratio обозначаваме съотношението на изрязване. За да укажем на приложението да използва нашите настройки трябва и да променим setupListOperations метода на:
~~~php
protected function setupListOperation()
{
$this->crud->set('show.setFromDb', false);
$this->crud->addColumns($this->getFieldsData(TRUE));
} 
~~~
Това премахва автоматичното генериране от базата данни и включва създаденото от нас.
За да можем да запазваме и качваме снимки трябва да добавим още 2 функции в контролерът на игрите. Първата е:

~~~php
public static function boot()
{
parent::boot();
static::deleting(function($obj) {
Storage::delete(Str::replaceFirst('storage/','public/', $obj->image));
~~~
При изтриване на запис от базата тя изтрива и снимката от файловете.
Втората функция е:
~~~php
public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $destination_path = "public/games";
        if ($value==null) {
            Storage::delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('jpg', 90); 
            $filename = md5($value.time()).'.jpg'; 
            Storage::put($destination_path.'/'.$filename, $image->stream());
            Storage::delete(Str::replaceFirst('storage/','public/', $this->{$attribute_name}));
            $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
~~~
Тя декодира снимката от базата данни и я запазва във временна директория.
	Следващата стъпка е да си създадем view. Можем да използваме тема по избор. Вътре добавяме:
~~~html
<form  method="GET" role="search">
        <input type="text" name="q" placeholder="Search games">
            <button type="submit">Search</button>
</form>
~~~
Този формуляр ще изпозваме за създаване на функционалност на търсене.
Чрез командата php artisan make:controller IndexController създаваме нов контролер. В него добавяме функцията: 
~~~php
public function index() {
            $q = Input::get ( 'q' );
            if ($q){
 $game = Game::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'manufacturer', 'LIKE', '%' . $q . '%' )->orWhere ( 'year_released', 'LIKE', '%' . $q . '%' )
            ->orderBy('created_at','desc')->get ();
            if (count ( $game ) > 0)
                return view ( 'index.index' )->withDetails ( $game )->withQuery ( $q );
            else
 return view ( 'index.index' )->withMessage ( 'No Details found. Try to search again !' );
               }
               $games  = Game::orderBy('created_at','desc')->get();
               return view('index.index', ['games' => $games]);
               } 
~~~
която при наличие на стойност във формуляра връща записите от таблица игри, отговарящи на тази стойност,  а при липса на стойност във формуляра връща всички записи от таблицата с игри.
Последно остава да добавим в routes/web.php:
~~~php
Route::get('/',[IndexController::class,'index']);
~~~
което при зареждане на началната страница ще извиква новосъздаденият контролер.
