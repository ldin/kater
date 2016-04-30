<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    protected $layout = 'home.layout';

    protected function setupLayout()
    {
        $type_page=Type::where('status',1)->lists('name', 'type');
        $settings = Setting::lists('value', 'name');

        View::share([
            'settings'=>$settings,
            'type_page'=>$type_page,
        ]);
    }

    public function showWelcome()
    {
//        $slides = Slider::where('status',1)->get();
//        $news = Post::where('type_id', Type::where('type','news')->first()->id)->orderBy('created_at', 'desc')->take(4)->get(array('text', 'image', 'name', 'slug'));
//            foreach ($news as $key => $post) {
//                $preview = HomeController::previewFirstSimbol($post->text, 500);
//                $post->preview_text = $preview['text'];
//            }
        $gallery = Gallery::orderBy('created_at', 'desc')->take(6)->get();
        $categories = Post::where('type_id',3)->get(['slug', 'image', 'name', 'preview']);
        $type_id=Type::where('status',1)->lists('type', 'id');
        $popular = Item::where('image','!=', '')->orderBy('created_at', 'desc')->take(4)->get();
        foreach($popular as $item) {
            foreach ($item->properties as $property) {
                $prop[$property->slug]['name'] = $property->name;
                $prop[$property->slug]['text'] = $property->pivot->text;
                $item->prop = $prop;
            }
        }
        $view = array(
            'gallery'=>$gallery,
            'categories'=>$categories,
            'popular'=>$popular,
            'type_id'=>$type_id,
        );

        return View::make('home.index', $view);
    }

    public function getPage($type, $slug=''){

        if($type=='main'){
            return Redirect::to('/');
        }

        $type_post = Type::where('type', $type)->first();
        $posts_child = $galleries = $posts = $row = array();


        if(empty($type_post)){
            return Response::view('errors.not-found')->header('Content-Type',  '404 Not Found');
        }
        if($type_post->template=='gallery'){
            $posts = Post::where('type_id',$type_post->id)->where('status',1)->where('parent',0)->orderBy('order', 'asc')->get();
            foreach ($posts as $key => $post) {
                $post->gallerie = Gallery::where('post_id', $post->id)->paginate(20);
            }
        }

        else if($type_post->template=='news'){
            if($slug==''){
                $posts = Post::where('type_id',$type_post->id)->where('status',1)->where('parent',0)->orderBy('created_at', 'desc')->paginate(6);
            }else{
                $row = Post::where('slug', $slug)->first();            
            }
            foreach ($posts as $key => $post) {
                $preview = HomeController::previewFirstSimbol($post->text, 500);
                $post->preview = $preview['text'];
            }
        }
        else if($type_post->template=='category'){
            $posts = Post::where('type_id',$type_post->id)->where('status',1)->where('parent',0)->orderBy('order', 'asc')->get();
            if($slug!=''){
                $row = Post::where('slug',$slug)->first();
                if($row->parent!=0){
                    $parent = Post::where('id',$row->parent)->first();
                    $row->parent_title=$parent->name;
                    $row->parent_slug=$parent->slug;
                }
                foreach($row->items as $item) {
                    foreach ($item->properties as $property) {
                        $prop[$property->slug]['name'] = $property->name;
                        $prop[$property->slug]['text'] = $property->pivot->text;
                        $item->prop = $prop;
                    }
                }
            }else{
                return Redirect::to($type.'/'. $posts[0]->slug);
            }
        }

        else{
            $posts = Post::where('type_id',$type_post->id)->where('status',1)->where('parent',0)->orderBy('order', 'asc')->get();
            $posts_child = Post::where('type_id',$type_post->id)->where('status',1)->where('parent', '!=',0)->orderBy('order', 'asc')->get();

            if($slug!=''){
                $row = Post::where('slug',$slug)->first();
                if($row->parent!=0){
                    $parent = Post::where('id',$row->parent)->first();
                    $row->parent_title=$parent->name;
                    $row->parent_slug=$parent->slug;
                }

                $galleries = Gallery::where('post_id', $row->id)->get();
            }
        }


        $view = array(
            'type'=>$type_post,
            'posts'=>$posts,
            'posts_child' => $posts_child,            
            'row' => $row,
            'galleries' => $galleries,
        );
        return View::make('home.'.$type_post->template, $view);
    }

    public function getItem($type_slug, $post_slug,  $item_slug){
        $item = Item::where('slug', $item_slug)->first();
        $properties=[];
        foreach($item->properties as $property){
            $properties[$property->slug]['name']=$property->name;
            $properties[$property->slug]['text']=$property->pivot->text;
        }

        $view = array(
            'row' => $item,
            'properties' => $properties,
        );
        return View::make('home.item', $view);
    }

    //превью новостей (первые $count символов из $data)
    public function previewFirstSimbol($data, $count){
        $first_img = $text = NULL;
        if(!empty($data)){
            for($i=1; $i<4; $i++ )  {

                preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $data, $matches);  
                                           
                if(isset($matches[1][0])){
                    $first_img = $matches[1][0];
                } 
                else{
                    $first_img = null;
                }

                $txt = strip_tags($data); 
                $txt = substr($txt, 0, $count);
                $txt = substr($txt, 0, strrpos($txt, ' ' ));                
                $text = $txt.'...';                             
            }
        }
        $preview = array(
            'text' => $text,
            'img' => $first_img
        );                              
            
        return $preview;             
    }

    public function postFormRequest()
    {
            $all = Input::all();

            $rules = array(
                'name' => 'required|min:2|max:255',
                'text' => 'required|min:5',
                'email'  => 'required|email',
            );

            $validator = Validator::make($all, $rules);
            if ( $validator -> fails() ) {
                return Redirect::to('/#contact')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('message_error', 'Ошибка, пожалуйста заполните форму');
            }

            $post = new Requests();
            $post->name = $all['name'];
            $post->phone = $all['phone'];
            $post->email = $all['email'];
            $post->text = $all['text'];
            $post->save();

            $mail = Setting::where('name', 'email')->first()->value;

            $messages = '<b>Пользователь: </b>'.$all['name'].'<br>';
            $messages .= '<b>Сообщение: </b>'.$all['text'].'<br>';
            $messages .= '<b>Контактные данные: </b>'.'<br>';
            $messages .= '<i>Телефон: </i>'.$all['phone'].'<br>';
            $messages .= '<i>Емайл: </i>'.$all['email'].'<br>';

                Mail::send('emails.message',
                    array('messages' => $messages ),
                    function ($message) use ($mail)  {
                        $message->to($mail)->subject('Заказ каталога');
                    }
                );

            return Redirect::to('/#formRequest')
                    ->with('message_sent', 'Ваше сообщение отправлено, с вами свяжутся наши сотрудники.');
    }

    public function getMoreEvents()
      {
        if (Request::ajax()) {
        $ids=$_POST['ids']; // в моём случае пост запросом передается массив чисел вида [1,2,3,4...], здесь я этот массив принимаю.
        return View::make('home.more')->with('more', Model::whereNotIn('id','!=', $ids))->get(); //делаем запрос в базу данных, получаем статьи в которых нет id из массива $ids
        }
      }
}
