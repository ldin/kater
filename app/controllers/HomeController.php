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
        $popular = Item::where('image','!=', '')->orderBy('created_at', 'desc')->take(4)->get();
        $view = array(
            'gallery'=>$gallery,
            'categories'=>$categories,
            'popular'=>$popular,
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
//            var_dump('<pre>',$t);
            foreach ($posts as $key => $post) {
                $post->gallerie = Gallery::where('post_id', $post->id)->get();
//                var_dump('<pre>',$post->galleries);
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
        else if($type_post->template=='portfolio'){
            $posts = Post::where('type_id',$type_post->id)->where('status',1)->where('parent',0)->orderBy('order', 'asc')->get();
            foreach ($posts as $key => $post) {
                $post->galleries = Gallery::where('post_id', $post->id)->get();
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
            if($type_post->template=='category' && $slug == ''){
//                $row = $posts[0];
                return Redirect::to($type.'/'. $posts[0]->slug);
            }
        }

//        var_dump('<pre>',$posts);

        $view = array(
            'type'=>$type_post,
            'posts'=>$posts,
            'posts_child' => $posts_child,            
            'row' => $row,
            'galleries' => $galleries,
        );
        return View::make('home.'.$type_post->template, $view);
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

    public function autocomplete($type, $street_id=''){
        $term = Input::get('term');

        $results = array();

        if($type == 'street'){

            $queries = DB::connection('mysql_address')->table('common_street')
                ->where('name', 'LIKE', '%'.$term.'%')
                ->select('name', 'id')
                ->take(5)->get();
            foreach ($queries as $query)
                {
                    $results[] = [ 'id' => $query->id, 'value' => $query->name ];
                }


        }
        else if($type == 'house'){
            $queries = DB::connection('mysql_address')->table('common_house')
                ->where('street', $street_id)
                ->where('house', 'LIKE', '%'.$term.'%')
                ->select('house as name', 'id', 'flag_t', 'flag_p' )
                ->take(5)->get();

            foreach ($queries as $query)
            {
                $results[] = [ 'id' => $query->id, 'value' => $query->name, 'flag'=>$query->flag_t ];
            }
        }
        else{
            return false;
        }

        return Response::json($results);
    }


    public function getRate($slug=''){

        $type=Type::where('type', 'rate')->first();
        $posts = Post::where('type_id', '=', $type->id)->where('status',1)->where('parent', '=', '0')->orderBy('created_at', 'desc')->get();
        $posts_child = Post::where('type_id', '=', $type->id)->where('status',1)->where('parent', '!=', '0')->orderBy('created_at', 'desc')->get();
        if(!empty($slug)){
            $row = Post::where('slug', $slug)->first();
            $posts_child = Post::where('type_id', '=', $type->id)->where('parent', $row->id)->where('status',1)->orderBy('created_at', 'desc')->get();
            $blade = 'home.page-menu-title';
        }
        else{
            $tv = Rate::where('type', 'tv')->where('status', 1)->orderBy('position', 'asc')->get();
            $inet = Rate::where('type', 'inet')->first();
            $inetOption = Rate::where('type', 'inetOption')->where('status', 1)->orderBy('position', 'asc')->get();
            $row = array(
                'inet'=>json_decode($inet->description),
                'inetOption'=>$inetOption,
                'tv'=>$tv,
            );
            $blade = 'home.page-rate';
        }

        $view = array(
            'posts' => $posts,
            'posts_child' => $posts_child,
            'type' => $type,
            'row'=> $row,
        );
        return View::make($blade, $view);
    }

    public function postConnect( $slug=''){
        var_dump(Input::all());die();


        $view = array(

        );
        return View::make('home.index', $view);
    }
}
