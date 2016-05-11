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
        $popular = Item::where('tags','!=','')->orderBy('tags', 'asc')->take(4)->get();
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
                $post->photos = Gallery::where('post_id', $post->id)->orderBy('created_at', 'desc')->paginate(40);
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
        $errors = 'При отправку формы произошла ошибка, попробуйте еще раз или
        позвоните нам по телефону ' . Setting::where('name', 'phone')->first()->value;

        $rules = array(
            'name' => 'required|min:2|max:255',
        );

        $validator = Validator::make($all, $rules);



        if ( $validator -> fails() ) {
            return Redirect::back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('message_error', 'Ошибка, пожалуйста заполните форму');
        }
        $data = [
            'name' => $all['name'],
            'email' => (!empty($all['email']) ? $all['email']:''),
            'phone' => (!empty($all['phone']) ? $all['phone']:''),
            'text' => (!empty($all['text']) ? $all['text']:''),
            'slug_for' => (!empty($all['slug_for']) ? $all['slug_for']:''),
            'item_id' => (!empty($all['item_id']) ? $all['item_id']:''),
        ];

        $post = new Requests();
        $post->fill($data);
        $post->save();

        $mail = Setting::where('name', 'email')->first()->value;

        if(empty($mail)) {return  Redirect::back()->with('message_error', $errors);}

        $messages =  '<h1>Cообщение с сайта <a href="numidal.ru">numidal.ru</a></h1>';
        $messages .= '<b>Пользователь: </b>'.$all['name'].'<br>';
        if(!empty($all['text'])) {
            $messages .= '<b>Сообщение: </b>' . $all['text'] . '<br>';
        }
        if(!empty($all['item_id'])) {
            $item = Item::find($all['item_id']);
            $messages .= '<b>Со страницы элемента: </b>'.$item->name.'<br>';
        }
        if(!empty($all['slug_for'])) {
            $messages .= '<b>URL: </b>'.$all['slug_for'].'<br>';
        }
        $messages .= '<b>Контактные данные: </b>'.'<br>';
        if(!empty($all['phone'])) {
            $messages .= '<i>Телефон: </i>' . $all['phone'] . '<br>';
        }
        if(!empty($all['email'])) {
            $messages .= '<i>Емайл: </i>' . $all['email'] . '<br>';
        }

        Mail::send('emails.message',
            array('messages' => $messages ),
            function ($message) use ($mail)  {
                $message->to($mail)->subject('numidal.ru: сообщение с сайта');
            }
        );

        return Redirect::back()
                ->with('message_sent', 'Ваше сообщение отправлено, с вами свяжутся наши сотрудники.');
    }

    public function getMorePhotos()
      {

        if (Request::ajax()) {
            $all = Input::all();
            $post = new Post();
            $post->photos = Gallery::where('post_id', $all['postId'])->orderBy('created_at', 'desc')->skip($all['offset'])->take(40)->get();
//            var_dump('<pre>',$post->gallerie[0]->id); die();
            return View::make('home.gallery-more')->with('post', $post); //делаем запрос в базу данных, получаем статьи в которых нет id из массива $ids
        }


      }
}
