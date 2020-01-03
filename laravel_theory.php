<?php

install composer 
download laravel: 
install laravel project:  composer create-project --prefer-dist laravel/laravel blog
set routes

=======================================db Database ============================================================
What is locking in MySQL?
					
MyISAM:
		default MySQL storageengine
		
EC2N1HN3RF
InnoDB : 
		alternative engine built-in to MySQL intended for high-performance databases

=======================================Route ============================================================
C:\xampp\htdocs\Blog_Site\routes\web
									Route::get('test', "home@index1");
									Route::get('testing', "home@hello");
									Route::get('list', "home@list");
									Route::get('layout', "home@layout");
									Route::get('index_file', "home@index_file");
					
Route::view('/waqar1', 'welcome');		//The view method accepts a URI as its first argument and a view name as its second argument
Route::view('/waqar2', 'welcome', ['name' => 'Taylor']);		//an array of data to pass to the view as an optional third argument:												
class product_model extends Model{
	protected $table = "products";
	protected $primaryKey = "product_id";
	protected $fillable = ['sku','name','description','regular_price','discount_price','quantity','taxable'];
	public $timestamps = false;
					
}														

=======================================Controller ============================================================
C:\xampp\htdocs\Blog_Site\app\Http\Controllers

php artisan make:controller name 
	function index(){
		return view('hello');	
	}
	return view('product/list', ['name' => 'James']);
php artisan make:controller name --resource
temp:
		 <div class="control-group">
                <label class="control-label">Enable</label>
                  <div class="controls">
                       <input type="text" name="status" id="status" value="{{ $categoryDetails->status }}"> 
                       <span class="help-inline">Note: 0 Means Disable 1 Means Enable</span> 
                  </div>                       
              </div>
===========================================Views========================================================
project\resources\views   

<link rel="stylesheet" type="text/css" href="{{ URL('assets/css/bootstrap.min.css')}}">
{{ URL('images/backend_images/				')}}
===================================================================================================
set route->direct text 
set route->view
set route->controller->view
set route->controller->view pe variable bhejna
set route->controller->view pe array bhejna



=============================Controller to view send variables ===========================================
Project\app\Http\Controllers		yahan se route set honge..
								controller can be created through cmd php artisan make:controller name
								class home extends Controller
								
								class home extends Controller{

									function index1(){
											return "indeex function";			direct return msg 
										}
									}
									function hello(){
										return view("hello");					view pe bhejo hello.blade.php pe 
									}
									function list(){
										return view("product.list");			view ke andar folder he product uske andar list.blade.php pe bhejo 
									}
									function list1(){
										$ProductList = array("IPhone 11","IPhone 10", "IPhone 9")
										return view("product/list", ProductList)
									}

								}	
								
Controller  se view pe bhejne ke tareeqe:

--------------------way 1------------------------------------------------		
	function list1(){
		
		$data['heading'] = "Welcome to Home Page";
		$data['ProductList'] = array("IPhone 11","IPhone 10", "IPhone 9");
		$data['ProductList1'] = array("IPhone 11","IPhone 10", "IPhone 9");
		$data['ProductList2'] = array("IPhone 11","IPhone 10", "IPhone 9");
		return view("product/list", $data);
	}
	recieve at view: 
							<?php 
									echo "<h1>".$heading."</h1>"
							
										foreach($ProductList as $product){
											echo "<li>".$product."<li>";
										}

										foreach($ProductList1 as $product1){
											echo "<li>".$product1."<li>";
										}

										foreach($ProductList2 as $product2){
											echo "<li>".$product2."<li>";
										}
							?>
							
--------------------way 2------------------------------------------------	
	function list1(){	
		$heading = "Product Listing Page";
		$productList = array("iPhone 11", "iPhone 10", "iPhone 9");
		return view("product/list")->with("productList", $productList);
	}
	recieve at view: 
							<?php 
									echo "<h1>".$heading."</h1>"
							?>
							



	
--------------------envivonment------------------------------------------------		
	video 7:  2:00
--------------------JSON ------------------------------------------------		
	video 7:  5:00
					
=================laravel common commands =======================================================
php artisan down         ;this will show user 503 service un available, means site is in maintenance
php artisan up         ;this will show reset, means set app live
app/http/middleware/RedirectIfAuthenticated:
									redirect if authenticated

public function __construct(){
	$this->middleware('auth')->except('index');   //except index function
}

public function __construct(){
	$this->middleware('auth')->only('index');   //only index function
}

=================weakness =======================================================
registeration
bootstrap/javascript
jquery

=================laravel 6 updates =======================================================


login/register
		php artisan migrate 

		composer require laravel/ui --dev
		php artisan ui vue --auth

		if css is not working :
								cmd: npm installation   if not working then download (nodejs.org) and set environment path
								cmd: npm run dev


Auth:
		it creates: views
		it creates: controllers in Auth folder
		it creates middleware

validation:
			'fname' => 'required|max:255',
			'lname' => 'required|max:255',
			'email' => 'required|email|unique:users|max:255',   ;users is table in db
			'pass' => 'required|confirmed|max:255',

			confirmed       name=pass name=password_confirm 
			then validate me name="pass" ko confirmed add karna required ke sath to wo khud hi
			match karke error dega agar pass cpassword_confirm ke sath match na hue 
			if($error>0){
				foreach
			}

=================mysql=======================================================
class 8 

login/register 
create 
update 


alter table product id product_id int;
relationship https://www.youtube.com/watch?v=qc4JZcxlLyc
php artisan make:migration this command is for create/update/delete/drop queries

php artisan make:migration this command is for create/update/delete/drop queries

php artisan make:migration permission
			this command will create a file at project\database\migrations
			this file include up and down function 
			there are already 2 class exists user_table and password_reset
			
		you cant communicate direct with db in laravel, 
		even if you have to create any table
		
		//create a table with users, including fields id, name, email should be unique 
									// password, rememberToken and timestamps which have created at and updated at 
		public function up(){
			Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
		//dont create if exist
	    public function down(){
		   Schema::dropIfExists('users');
		}
		The up method is used to add new tables, columns, or indexes to your database, while the down method should reverse the operations performed by the up method.
		now to execute this permission file this will create tabe as per above query 
php artisan make:migration 	name	this command will create a file at project\database\migrations
php artisan migrate:install 	this command will run a up function /create table 
php artisan migrate
error: 
	[Illuminate\Database\QueryException]
	SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email))

solve: 
	add this code in AppServiceProvider.php 
		use Illuminate\Support\Facades\Schema;

		public function boot(){
			Schema::defaultStringLength(191);
		}
	now execute php artisan migrate, your migrations will be run and create table according to your migration 
	
php artisan migrate:rollback 	this command will run a down function /drop that table 



id	name	email	password
#1 create migration 	php artisan make:migration
#2 execute migration 	php artisan migrate:refresh


=======================================admin multi users=======================================
https://pusher.com/tutorials/multiple-authentication-guards-laravel
=======================================Middleware=======================================
					
create middleware: 	
---------------------------------------
		php artisan make:middleware CheckAge


add in kernel       
---------------------------------------
https://www.youtube.com/watch?v=CQyNDnMhf8U
		protected $middleware:			for single
		'checkhome' => \App\Http\Middleware\checkhome::class,
		
		
		protected $middlewareGroups:	for group
		'checkhome' => \App\Http\Middleware\checkhome::class,
		Route::group(['middleware'=>['auth']], function(){
				Route::get('admin/dashboard', 'AdminController@dashboard');
				Route::get('admin/settings', 'AdminController@settings');
		});	
		

		protected $routemiddleware:	for group
		'checkhome' => \App\Http\Middleware\checkhome::class,
		Route::view('about', 'about')->middleware('checkhome');



		protected $middlewarePriority:	for group
		'checkhome' => \App\Http\Middleware\checkhome::class,
		
middleware function:
			public function handle($request, Closure $next){
				if(now()->format('s') % 2){
					return $next($request);
				}
				return response('Not Allowed');
			}

for single 
---------------------------------------
		Route::get('portfolio', 'Home@portfolio')->middleware('checkhome');

---------------------------------------
add dd('hit');   //to check if middleware is working properly


way1 for all: 	
---------------------------------------
 		add $this->middleware('checkhome'); 		in __construct



way2 for all	Middleware Groups	
---------------------------------------
			Route::group(['middleware'=>['auth']], function(){
				Route::get('admin/dashboard', 'AdminController@dashboard');
				Route::get('admin/settings', 'AdminController@settings');
			});	



how middle ware work:
---------------------------------------


			C:\xampp\htdocs\laravel_5.5\app\Http\kernel.php  
			http ke andar 1 file he kernel.php ye laravel ki backbone he 
			iske andar middleware ko ye pick kar raha he,
			middleware ke andar 1 auth ki class he 
			'auth' => \App\Http\Middleware\Authenticate::class,
			jo authentication ka kaam kar ri he 
			is file ke andar 1 function hota he handle 
			jo ke ye verify karta he ke bunda login ho ke araha he ya direct 


multiple middleware to the route:
---------------------------------------
			Route::get('/', function () {
			    //
			})->middleware('first', 'second');






// ================================ laravel 6 Login/Register/Auth process ===========================

#1 composer require laravel/ui --dev
#2 php artisan ui vue --auth		this will show you views login/register nd create table 

#3


------------------------------------------------------------									
 Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes")
		to solve this error go to laravel_6\app\Providers\AppServiceProvider.php 
		add 		Schema::defaultStringLength(191); in boot function 
		also add 	use Illuminate\Support\Facades\Schema;
		note: if this error occur then drop all the related table nd 
		run php artisan migrate commandd again, this will create 4 tables at db 

email confirmation:
			.env
			MAIL_DRIVER=smtp
			Mail_host=mailtrap.io
			mail_port=2525
			mail_username=null
			mail_password=null
			mail_encryption=null

			log is saved in storage/logs




		
=========================================HTTP/Request=========================================									

Route Parameters
-------------------------------
		Route::put('user/{id}', 'UserController@update');


path(); 
-------------------------------
		$uri = $request->path(); 				//e.g output contact_us



url()
-------------------------------					
		// Without Query String...          	//e.g output	http://localhost:90/Blog_Site/public/about_us
		url = $request->url();			




fullUrl()
-------------------------------
		// With Query String...          		//e.g output	http://localhost:90/Blog_Site/public/about_us
		url = $request->fullUrl();



isMethod('post')
-------------------------------------
		if ($r->isMethod('post')) {				//e.g output 	true 
			return "post method";
		}else{	
			return "get method";
		}	

all()
------------------------------------
        $input = $request->all();				//this return all request attributes



==================================HTTP Retrieving Input ==================================================

Retrieving All Input Data
------------------------------------
			$input = $request->all();




Retrieving An Input Value
------------------------------------	
			$name = $request->input('name');					//output name value
			$name = $request->input('name', 'Sally');			////output Sally if name is empty
			$name = $request->input('products.0.name');			//use "dot" notation to access the arrays
			$names = $request->input('products.*.name');
			$input = $request->input();							//Retrieve all of the input values as an associative array:


Retrieving Input From The Query String
------------------------------------




Retrieving Input Via Dynamic Properties		$name = $request->name;
Retrieving JSON Input Values $name = $request->input('user.name');
The has method returns true if the value is present on the request: if ($request->has(['name', 'email'])) {}
The hasAny method returns true if any of the specified values are present: if ($request->hasAny(['name', 'email'])) {}
If you would like to determine if a value is present on the request and is not empty, you may use the filled method: if ($request->filled('name')) {}



------------------------------------------------------------									
way1:  first check unique or if fail then check max 
validate:
		$validatedData = $request->validate([
		        'title' => 'required|unique:posts|max:255',
		        'body' => 'required',
		]);

way2 first check unique and if fail then stop here 

		$validatedData = $request->validate([
		    'title' => ['required', 'unique:posts', 'max:255'],
		    'body' => ['required'],
		]);	
way1: best practie
	$validator = Validator::make($request->all(), [
			'title' => 'required|unique:posts|max:255',
			'email' => 'required|:posts|max:255',
			'password' => 'required:posts|min:20',
			'body' => 'required',
	]);
	if ($validator->fails()) {
		return redirect('login')
					->withErrors($validator)
					->withInput();
	}
way2:
	$validatedData = $request->validate([
		'title' => 'required|unique:posts|max:255',
		'email' => 'required|:posts|max:255',
		'password' => 'required:posts|min:20',
		'body' => 'required',
	]);	
echo error on html: 
		way1: 
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
		way2:
			@if(Session::has('status'))
				
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
						<strong>{!! session('status') !!}</strong>
				</div>
			@endif
	
HAsh 
	use hash;
	$registerData['password'] = Hash::make($postedData['password']);	//Hash::make($value);
	
=============================session=============================
-------------------------------
$request_url = $request->url(); 
$aa = explode("/",$request_url);
echo $aa[5];  //index5 output

set session:
-------------------------------
working:
Session::put('adminSession', $name);	
{{ Session::get('adminSession') }}

get session:
-------------------------------
			Session::get('variableName');



Retrieving All Session Data
-------------------------------
			$data = $request->session()->all();				


Storing Data
-------------------------------
		$request->session()->put('key', 'value');		// Via a request instance...
		session(['key' => 'value']);					// Via the global helper...



// Via a request instance...
$request->session()->put('key', 'value');

// Via the global helper...
session(['key' => 'value']);

$request->session()->push('user.teams', 'developers');

$value = $request->session()->pull('key', 'default');


To determine if an item is present in the session, even if its value is null, you may use the exists method. The exists method returns true if the item is present:
-------------------------------
		if ($request->session()->exists('users')) {						//users ke naam ka variable session me he bhi ya nahi
		    //
		}



To determine if an item is present in the session, you may use the has method. The has method returns true if the item is present and is not null:
-------------------------------
		if ($request->session()->has('users')) {						//users ke naam ka jo variable session me he uske andar value he to true
		    //	
		}



Pushing To Array Session Values:
-------------------------------
		$request->session()->push('user.teams', 'developers');			 //push a new value onto a session value that is an array




Retrieving & Deleting An Item:
-------------------------------
$value = $request->session()->pull('key', 'default');					//The pull method will retrieve and delete an item from the session in a single statement:



Flash Data
-------------------------------
$request->session()->flash('status', 'Task was successful!');


=============================ASKING=============================
	
question ask:    
			login karte waqt pass match 
			how to solve console error
			chunk query in db 				https://laravel.com/docs/6.x/queries#chunking-results
	       	 middleware me jo close he wo kis kaam ka he ?			 return $next($request);
	       	 PSR-7 Requests in HTTP RESQUEST
	       	 error:			Trying to get property 'headers' of non-object
	       	 				code:
	       	 						       if ($request->is('contact_us')) {
									            return "contact_us";
									        }else{
									            return "false";
									        }
			
			what is  Query String in HTTP Response



=============================SUBLIME EDITOR=============================
Sublime Editor:
				type html and press tab, this will generate basic code 
				ctrl+shift+d = duplicate 
				ctrl duba ke jahan jahan cursor enter karte jaoge wahan wahan jo bhi ap type karoge edit hota rahega 
				shift+right click = mouse ko pakarh ke jahan tk le ke jaunga wo wo select hota jaega 
				ctrl+shift+upper arrow 
				ctrl+shift+k = line delete 
				ctrl+k+k = jahan pe cursor he us se aage ki puri wo line delete 
				ctrl+/ = comment
				jub 2 file ko 1 sath view karna ho, view me ja ke layout then column 2
				then 2nd tab ko pakarh ke 2nd column me le jao 
				ctrl+shift+p = command pellete
				ctrl+d =        jo bhi select hua wa hoga wahi next next karke select hota jaega

		>	div>p>h1>p   1 div ho uske andar paragraph, then uske andar h1, then 	 	 uske andar again paragraph, ye div>p>h1>p likh ke tab press 
		+	div+p: 1 div create ho or uske forun bad pargraph 
			ul+li
		*   div*10:     10 div create hojaengi 
	> and * ul>li*10    1 ul create ho or uske andar 10 list 
	.       1      		div create hogi jisme class hogi empty 
	.container 1   		div create hogi jiske andar class container hogi
	#contriner 1   		div create ho jiski id contrianer ho 
	ul>li.item*10  		1 ul create ho or uske bad 10 list nd unki class
						container ho        


keyboard shortkeys:
				VIRTUAL desktop
					win+ctrl+D = new fresh deskptop
					win+ctrl+arrow = left arrow means pichli wali desktop and right means current
					win+ctrl+f4 =  jub koi desktop faultu hojaye to usey close karne ke liye
					ctrl+shift+A = select all div work

					win+1 = app1
					win+2 = app2
					win+3 = app3
					split 2 app and work on them
					==========================
							win+left arrow = is se left pe 1 app open hojaega
							win+right arrow = is se right pe 1 app open hojaega
					ctrl+alt+tab = show all running app
					win+tab = show all running app
					window magnifire = win+ | win-
					win+i = window setting
					white collar
				
//============================GITHUB======================:
git config --global user.name "username"
git config --global user.email "email"
git init:	first time it will give your an error: initialized is empty git repository
ls:  check files in directory
git add .	this will update branch master, means ready to connect to git
git commit -m "My First Commit"  this create connection
git status     this will show, if the connection is success, nothing to commit, working tree clean
git remote add origin https://github.com/waqar321/projectName.git
git push -u origin master

update:
		ls   check directory
		git status:			this will show you which file is not updated
		git add .			this will update branch master, means ready to connect to git
		git status 			this time status will show you your branch is up to date
		git commit -m "editted testing html"  a last commit to your repository, this shows what you changed
		git status        if success, this shows nothing to commit
		git log          this shows your detial
		git push origin master  this will finaly uploads yours filesgit





//============================DATABASE QUERY======================:

		SELECT:
		------------------------------------------------------------------------------------------------------------	
			$all = product_model::all();											select * from products
			return $all;				return all rows

			$product_id = product_model::find(1);									select * from products where product_id=1
			return $product_id;			

			$user = product_model::where('product_id', 2)->first();					select first_row from products where product_id=2
			return $user;			

			$user = product_model::where('name', 'Waqar Mughal')->first();			select first_row from products where name='Waqar Mughal'
			return $user;				

			$search_detail = form_data::where('name', 'LIKE', '%waqar%')->get();   name ke column me jahan jahan waqar he wahan ki puri row utha ke le ao 

			$id = product_model::where('name', 'Waqar Mughal')->value('product_id'); 		select product_id from products where name='WAQAR MUGHAL'
			$user = product_model::where('name', 'Waqar Mughal')->value('name');
			$discount_price = product_model::where('name', 'Waqar Mughal')->value('discount_price');
			
			--------------------------------------------------------------------
			//eloquent:
			
    		$productDetails = Product::with('attributes')->where(['id' => $id])->first();  
    		//select firstRow from Product table where id=$id and attribute is a function in which we have define
    		// Product has hasMany relationship with ProductAttributes table
    		//this is gonna give output like product table and all the fields of ProductAttirubes table
    		// integrated with the table data 

			--------------------------------------------------------------------
    		select ascending or descending:
    				    	$productsAll = Product::orderBy('id','desc')->get();

			--------------------------------------------------------------------
    		random show:
    						$productsAll = Product::inRandomOrder()->get();

			--------------------------------------------------------------------
			TRUNCATE TABLE categories;

			return $id
			return $discount_price
			return $user

			--------------------------------------------------------------------
			$search_detail = form_data::where('category', 'LIKE', '%'.$search_value.'%')
				->orWhere('type', 'LIKE', '%'.$search_value.'%')
				->orWhere('city', 'LIKE', '%'.$search_value.'%')
				->orWhere('country', 'LIKE', '%'.$search_value.'%')
				->orWhere('contact', 'LIKE', '%'.$search_value.'%')
				->orWhere('category', 'LIKE', '%'.$search_value.'%')
				->orWhere('type', 'LIKE', '%'.$search_value.'%')
				->orWhere('bugdet', 'LIKE', '%'.$search_value.'%')
				->orWhere('floor', 'LIKE', '%'.$search_value.'%')
				->orWhere('sq_ft', 'LIKE', '%'.$search_value.'%')
				->orWhere('banglow_sq_yd', 'LIKE', '%'.$search_value.'%')
				->orWhere('nature_of_buying', 'LIKE', '%'.$search_value.'%')
				->orWhere('Time_to_call', 'LIKE', '%'.$search_value.'%')
				->orWhere('choosen_location', 'LIKE', '%'.$search_value.'%')->get();

			foreach($search_detail as $search_detail1){
				echo $search_detail1->name;
			}

			--------------------------------------------------------------------
			whereIn:
					$collection = collect([
					    ['product' => 'Desk', 'price' => 200],
					    ['product' => 'Chair', 'price' => 100],
					    ['product' => 'Bookcase', 'price' => 150],
					    ['product' => 'Door', 'price' => 100],
					]);

					$filtered = $collection->whereIn('price', [150, 200]);

					$filtered->all();
			--------------------------------------------------------------------
			show better db retrieved code:
	    $print = json_decode(json_encode($Categories));
		PLUCK			
		------------------------------------------------------------------------------------------------------------	
			$titles = product_model::pluck('name');				products ke table me name ke column ki sari value utha ke le ao 

			foreach ($titles as $title) {
			    echo $title."<br>";
			}

		COUNT()
		------------------------------------------------------------------------------------------------------------	
			$count = product_model::count();
			return  "Numbers of recorsd in products table".$count;					;return total records
		
		MAX()
		------------------------------------------------------------------------------------------------------------	
			$max_price = product_model::max('regular_price');
			return  "maximum price of products".$max_price;
		
		AVG()
		------------------------------------------------------------------------------------------------------------	
			$avg_price = product_model::avg('regular_price');
			return  "Average price of products".$avg_price;
		
		EXIST()
		------------------------------------------------------------------------------------------------------------	
			return "Exist         ".product_model::where('product_id', 24)->exists(); 						if record exist, it return 1 

		EXIST()
		------------------------------------------------------------------------------------------------------------	
			return "Not Exist         ".product_model::where('product_id', 24)->doesntExist();				if record does not exist, it return 1

		GET()	
		------------------------------------------------------------------------------------------------------------	
			$user = product_model::select('name', 'regular_price')->get();									get all the name nd price
			foreach($user as $userName){	
				echo $userName->name."            ".$userName->regular_price."<br>";	
			}

	if ( ! isset($parts[1])) {
   		$parts[1] = null;
	}
		INSERT:
		------------------------------------------------------------------------------------------------------------	

				insert single 
						$insert = testing::insert([
							'name' => 'waqar', 
							'email' => 'john@example.com'
						]);
						return "insert query           ".$insert;

				insert miltiple records:
						$insert = testing::insert([
						    ['name' => 'waqar1', 'email' => 'waqarmughal1@gmail.com'],
						    ['name' => 'waqar2', 'email' => 'waqarmughal2@gmail.com'],
						    ['name' => 'waqar3', 'email' => 'waqarmughal3@gmail.com']
						 
						]);
						return "insert query           ".$insert;

				insertOrIgnore
					$insert = testing::insertOrIgnore([
					    ['name' => 'waqar1','email' => 'waqarmughal1@gmail.com'],
					    ['name' => 'waqar2','email' => 'waqarmughal2@gmail.com']
					]);


					return "insert query           ".$insert;
		
		db queries: https://freek.dev/1182-searching-models-using-a-where-like-query-in-laravel

		UPDATE:
		------------------------------------------------------------------------------------------------------------	
				Update record
					$affected = testing::where('id', 1)->update(['name' => 'updated']);
					return "insert query           ".$affected;

				$affected = testing::updateOrInsert(						name nd email check karega, agar dono hen to wahan ki id ko 11 karde
			        ['name' => 'updated', 'email' => 'john@example.com'],
			        ['id' => '11']
	  		  	);	


		Increment & Decrement
		------------------------------------------------------------------------------------------------------------	
					testing::increment('id', 12);   increment in all values of column
					testing::decrement('id', 12);   decrement in all values of column
		
					testing::increment('id', 12, ['name' => 'waqar1']);
					//jahan name waqar1 he wahan ki id me 12 increment kardo, or name ke column ki values sari hi waqar1 kardo

	gitcode:
https://www.youtube.com/redirect?q=https%3A%2F%2Fgithub.com%2Fstackdevelopers%2Fmake-admin-panel-in-laravel-5.6&stzid=UgysT2ykx60f8As4LeB4AaABAg.90E0R6nt2-E90EIqgb83c4&event=comments&redir_token=jUC-nY4hEkJmDPQ_ZFZUSnc4Rzd8MTU3MjUxNTU0M0AxNTcyNDI5MTQz

what is admin panel:
		The admin panel (usually logged into from /wp-admin) is where new posts, categories, tags, pages, links and custom post types are created.

		It's also where theme files are changed, widgets are added, plugins are activated or updated, and reading/writing/general settings are changed.

		In short, the admin panel is where the content is created and the website is managed. This is the key to how a content management system (CMS) works.

		Essentially, a CMS is just a series of forms that take the place of manually creating files and uploading them to the server. They simplify that process.

		The admin panel is just another series of forms that let you do all of the things explained above without having to manually edit files and upload them.


erors: 
1 - Trying to get property 'wd' of non-object   
	bhund: 
			@foreach($names as $name)
				{{$name->wd}}
    		@endforeach
	fix:
    		@foreach($names as $name)
    				{{$name}}
    		@endforeach



?>
					
//============================intervention image ======================:
1 - composer  require intervention/image 

2 - 
	config/app.php

	 'providers' => [
	 Intervention\Image\ImageServiceProvider::class
	 ],

	 'aliases' => [
	 'Image' => Intervention\Image\Facades\Image::class
	 ] 

3 -  
	"require": {
        "php": "^7.2",
        "fideloper/proxy": "^4.0",
        "intervention/image": "^2.5",
        "laravel/framework": "^6.0",
        "laravel/tinker": "^1.0"
    },

4- <form enctype="multipart/form-data" method="post">

5 -  request()->validate([
			      'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	 ]);

	 if ($files = $request->file('product_image')) {
	 	echo $files; 		//if the output is like C:\xampp\tmp\phpB3D9.tmp this means image is coming properly
	 						// this is a kind of checking
	 }
	 //working code
	 if($request->isMethod('post')){
		 	
    	 	//==============validation================
    	 		request()->validate([
			      'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);

    	 	//==============inserting================

    		$data= $request->all();
    		$product = new Product;
    		$product->category_id = $data['category_id'];
    		$product->product_name = $data['product_name'];
    		$product->product_code = $data['product_code'];
    		$product->product_color = $data['product_color'];
    		$product->description = $data['description'];
    		$product->price = $data['product_price'];
    	
    		//==============imageWork================
    		if ($files = $request->file('product_image')) {			    

			    // for save original image
			    $ImageUpload = Image::make($files);
			    $originalPath = 'images/backend_images';		//this will save original size
			    $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
			    
			    // for save small image
			    $thumbnailPath = 'images/backend_images/products/small/';
			    $ImageUpload->resize(100,125);					//this will save small size
			    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
  				
  				// for save medium image
			    $thumbnailPath = 'images/backend_images/products/medium/';
			    $ImageUpload->resize(300,125);					//this will save medium size
			    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
				
				// for save large image
			    $thumbnailPath = 'images/backend_images/products/large/';
			    $ImageUpload->resize(500,125);					//this will save large size
			    $ImageUpload = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());

			    $product->image = time().$files->getClientOriginalName();  //this will save in db
			    $product->save();
	   	    }

			  $image = Product::latest()->first(['image']);			//first(['image'] where image is table field
			  // return Response()->json($image);
    		
    		// return redirect()->back()->with('status', 'Product has been Added successfully');
			  return redirect('admin/view-products')->with('status', "Product has been Added successfully");
    	}   


https://www.tutsmake.com/laravel-6-intervention-package-with-upload-image-using-ajax/

e-commerce tutorial:

Set Admin Dashboard | Header | Footer      						
https://youtu.be/bzYBu0iez3s?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #6

Display Error Message on Login Failure | Logout Process
https://youtu.be/Y-e4vp-CqhY?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #7

Protect Admin Routes | Secure Dashboard Route
https://youtu.be/6kIqINVNS30?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #8

 Settings Page | Update Password Form
 https://youtu.be/TILCwtTtmWA?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7 #9

 Check Current Password with JQuery/Ajax
 https://youtu.be/Nn9qkHCb8GA?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7 #10

 Update Admin Password
 https://youtu.be/GFL49oZBR8g?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #11

 Admin Panel | Categories | Migrations | CRUD
 https://youtu.be/DpUf75HH-_o?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #1

 Admin Panel | Display Categories with Datatables
 https://youtu.be/-YBGa17v2MQ?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#2

 Admin Panel | Edit Categories
 https://youtu.be/2bhKD-FsCRI?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#3


 Admin Panel | Delete Categories
 https://youtu.be/LYfJWU3vSj0?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#4

 Admin Panel | Add Sub Categories to Categories
 https://youtu.be/vd_z8LlUhBE?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7 	#5

 Admin Panel | Products Section | Laravel Migrations
 https://youtu.be/reumQcj7jvU?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #6

  Admin Panel | Add Product | Validations
  https://youtu.be/VEekoRmxIjs?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#7

  Admin Panel | Add Product Image | Intervention Package
  https://youtu.be/xtBG62Ct-hc?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7 #8

  Admin Panel | View Products | Datatables
  https://youtu.be/njzUr__aEWo?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#9

  Admin Panel | Product Details | Modal Pop-up
  https://youtu.be/qBjqFVra7kQ?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#10

  Admin Panel | Edit Products
  https://youtu.be/k11fbAG-YfE?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#11

 Admin Panel | Show, Update, Delete Product Images
 https://youtu.be/MjslADxdvkI?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#12

 Admin Panel | Delete Products | SweetAlert
 https://youtu.be/0FoTmAjc4bM?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#13

 SweetAlert for Categories Deletion
 https://youtu.be/GOEl_TheF_8?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7  #14

 Admin Panel | Products Attributes
 https://youtu.be/KZ_59Nn0vuU?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#15

 Admin Panel | Products Attributes
 https://youtu.be/4P3TUkPuj5M?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#16

 Admin Panel | Products Attributes
 https://youtu.be/pe66n9d5uhg?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7   #17

 Admin Panel | Products Attributes
https://youtu.be/7XZSSXs_Y7g?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#18

Products Attributes | Delete | SweetAlert
https://youtu.be/oqeyvWTyUSE?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#19

Admin Panel | Download Free E-Shop Template
https://youtu.be/LnX9IkjFhsw?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#20

 Admin Panel | Set E-Shop Template HTML in Laravel
 https://youtu.be/O5-hF35W0d4?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#21

 Admin Panel | Show Products in Home Page
 https://youtu.be/JTd6xIH4YPs?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#22
 
 Admin Panel | Display Categories at Left Sidebar
 https://youtu.be/VGAK3JBesgY?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#23

Admin Panel | Category / Listing Pages
https://youtu.be/k18N5UpnOyM?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#24

Admin Panel | Header Menu
https://youtu.be/yB-WxuQU04o?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#25

Show Sub Categories Products in Main Categories
https://youtu.be/AkH12FA0xMU?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#26

Display 404 Page | Page Not found | URL not exists
https://youtu.be/1vIRXv58Pe8?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#27

Enable/Disable Categories
https://youtu.be/RFXBSnvhP1M?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#28

 Delete Products Images from folders	
 https://youtu.be/V0jmWlj_GWI?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#29

 Product Detail Page
 https://youtu.be/48f90gaSDKo?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#30

 Product Detail Page Attributes - Size/Price
 https://youtu.be/KA5TBbSKLRA?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7   #31

Product Detail Page - Description, Care, Delivery
https://youtu.be/O0SFDrPkQQ4?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#32

Detail Page - Correct Attributes Issues | Font Awesome Path
https://youtu.be/iS_tZ7MVD6o?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#33

Products Alternate Images
https://youtu.be/tR417H4RP_M?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#34

 Admin - Products Alternate Images
 https://youtu.be/k2u7p3zwCXI?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#35

 Products Detail Page Alternate Images
 https://youtu.be/agSRLNxRnrQ?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#36

 Products Detail Page Zoom Images | Easy Zoom
 https://youtu.be/UrGaDYYIv3Y?list=PLLUtELdNs2ZY5drPxIWzpq5crhantlzp7	#37


//===================delete image from folder=============

if(file_exists(public_path('images/backend_images/products/small/1574811011adidas_yello_shoes.jpg'))){

			      unlink(public_path('images/backend_images/products/small/1574811011adidas_yello_shoes.jpg'));
			      echo "deleted";

		    }else{

		      dd('File does not exists.');

		    }
			    die;

$productImage = Product::where(['id'=>$id])->first();
    		
    		 $small_image = 'images/backend_images/products/small/';
			 $mediun_image = 'images/backend_images/products/medium/';
			 $large_image = 'images/backend_images/products/large/';

			if(file_exists(public_path($small_image.$productImage->image))){
			      unlink(public_path($small_image.$productImage->image));
			}
			if(file_exists(public_path($mediun_image.$productImage->image))){
			      unlink(public_path($mediun_image.$productImage->image));		    
		    }
			if(file_exists(public_path($large_image.$productImage->image))){
			      unlink(public_path($large_image.$productImage->image));
			}
		    else{
		    		dd('File does not exists.');  die;
		    }
		    
//============================Vue JS======================:
		
JS Libraries:
				jquery			DOM operation   form validation
				yahoo ui
				angular
				coffeescript
				typescript
				reactjs
				reactnative
				and now we are doing vue js
--------------------------------------------------
			installation karte waqt vue.min.js ko call karen
			ya pura folder utha ke rakh den public me f
			what is DOM operation?						https://www.w3schools.com/js/js_htmldom.asp
			what is v-bind? 
			v-for me key ka kia kaam he ?
			send value to session or db?
			

			run time me apki value ke hisab se apni html ko adjust krta he ya upgrdate krta he runtime me value to 
			ye kaam only vuejs and reactjs me hosakta he 


how to use VUEJS:
				download development version file vue.js from https://vuejs.org/v2/guide/installation.html
				and production version vue.min.js from https://vuejs.org/v2/guide/installation.html
				and add  <script src="address"></script>

variable in vuejs:
				{{ variableName }}

variable in laravel:
				{{ $variableName }}

attribute binding:
				
				v-bind:
					  <img v-bind:src="image">
				v-bind:
					  <img :src="image">

				
Conditional Rendering
				<p v-if="inventory > 10">In stock</p>
				<p v-else-if="inventory <= 10 && inventory > 0">Almost sold, less stock</p>
				<p v-else>Out of stock</p>

loop:
			<ul>
				<li v-for="spec in specifications">{{ spec }}</li>
			</ul>

			specifications: ["64 GB", "2GB RAM","5.5 Inch Display"],

			<div v-for="color in variantColors" :key="color.colorID">
				<p>{{ color.colorOption }}</p>
			</div>
evend binding: 
				onchange	An HTML element has been changed
				onclick	The user clicks an HTML element
				onmouseover	The user moves the mouse over an HTML element
				onmouseout	The user moves the mouse away from an HTML element
				onkeydown	The user pushes a keyboard key
				onload	The browser has finished loading the page
				e.g:  
					v-on:click="addToCart"

					<div>
						<button v-on:click="addToCart">Add to cart</button>
					</div>					
					
method:
			methods: {
				addToCart()
				{
					this.cart += 1
				}
			}
			note: this is necessary to define to identify this variable is from vue
direct change value:
			<div>
				<button v-on:click="cart+=1">Add to cart</button>
			</div>	

send value to session or db:
			ajax(){

			}		

Now play with css:
			:disabled="!inStock"
			:class="{ disbaledButton: !inStock }">

//========================== weakness ==============================

javascript labraries
sweetalert();
ajax
video #28: 	checkbox show nahi horaha, show ho ke hide hoajta he




 public function AddAttribute(Request $request, $id=null){
    		$productDetail = Product::with('Attributes')->where(['id'=>$id])->first();
    		$productDetail = json_decode(json_encode($productDetail));
 			// 	echo "<pre>";
				// print_r($productDetail);
				// echo "</pre>";
				// die;
     		if($request->isMethod('post')){
				$data = $request->all();
				dd($data); die;
     			foreach($data['sku'] as $key => $val){
     					if (!empty($val)) {
						 	$ProductAttributes = new ProductAttributes();   
						 	$ProductAttributes->product_id = $data['productID'];							
						 	$ProductAttributes->sku = $val;							
						 	$ProductAttributes->size = $data['size'][$key]; 							
						 	$ProductAttributes->price = $data['price'][$key]; 							
						 	$ProductAttributes->stock = $data['stock'][$key]; 			
						 	$ProductAttributes->save();
     					}
     			}
						 	 return redirect('admin/view-products')->with('status', "Product Attributes has been Added successfully");
     			die;

     		}
    		$productDetail = Product::where(['id'=>$id])->first();
     		return view('admin.products.add_attributes')->with(compact('productDetail'));
     }
/===============show categories=================
foreach($Categories as $cat){
						$categories_menu .= "<div class='panel-heading'>
												<h4 class='panel-title'>
													<a data-toggle='collapse' data-parent='#accordian' href='#".$cat->id."'>
														<span class='badge pull-right'><i class='fa fa-plus'></i></span>
														".$cat->name."
													</a>
												</h4>
											</div>
											<div id='".$cat->id."' class='panel-collapse collapse'>
												<div class='panel-body'>
													<ul>";
													$sub_categories = Category::where(['parent_id' => $cat->id])->get();
													foreach($sub_categories as $sub_cat){
														$categories_menu .= "<li><a href='#".$sub_cat->url."'>".$sub_cat->name." </a></li>";
													}
														$categories_menu .= "</ul>
												</div>
											</div>";		
		}
page not found:
		location: 
			just use function : 		 abort(404);
			custom message: 			 vendor/laravel/framework/src/Illuminate/Foundation/Exceptions/views/404.blade.php
 		    my dir: 			 C:\xampp\htdocs\laravel_6\vendor\laravel\framework\src\Illuminate\Foundation\Exceptions\views

//============================================================
    PDF generate:
                composer require barryvdh/laravel-dompdf
            
                add service:
                                    Barryvdh\DomPDF\ServiceProvider::class,
                add alias:
                                    'PDF' => Barryvdh\DomPDF\Facade::class,
    
                1 - Route::get('generate-pdf','PDFController@generatePDF');
                2-  PDFController
                            <?php
                                    namespace App\Http\Controllers;

                                    use Illuminate\Http\Request;
                                    use PDF;

                                    class PDFController extends Controller
                                    {
                                        /**
                                         * Display a listing of the resource.
                                         *
                                         * @return \Illuminate\Http\Response
                                         */
                                        public function generatePDF()
                                        {
                                            $data = ['title' => 'Welcome to ItSolutionStuff.com'];
                                            $pdf = PDF::loadView('myPDF', $data);

                                            return $pdf->download('itsolutionstuff.pdf');
                                        }
                                    }
                                ?>
                3 - BLADe
                            <!DOCTYPE html>
                            <html>
                            <head>
                                <title>Hi</title>
                            </head>
                            <body>
                                <h1>Welcome to ItSolutionStuff.com - {{ $title }}</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </body>
                            </html>

