<?php

class ProductsController extends BaseController {
	
	function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf' , array('on' => 'post' ));
	}

	public function getIndex() {

		$categories = array();


		foreach (Category::all() as $category) {
			$categories[$category->id] = $category->name;
		}

		return View::make('products.index')
		      ->with('products' , Product::all())
		      ->with('categories' , $categories);
	}

	public function postCreate() {

		$validator = Validator::make(Input::all() , Product::$rules);

		if ($validator->passes()) {
			$product = new Product;
			$product->category_id = Input::get('category_id');
			$product->title = Input::get('title');
			$product->description = Input::get('description');
			$product->price = Input::get('price');


			$image = Input::file('image');
			$filename = date('Y-m-d-H-i-s')."-".$image->getClientOriginalName();
			$path = public_path('img/products/'.$filename);
			Image::make($image->getRealPath())->resize(468, 249)->save($path);
			$product->image = 'img/products/'.$filename;
			$product->save();

			return Redirect::to('admin/products/index')
			     ->with('message' , 'Product created');
		}

		return Redirect::to('admin/products/index')->with('message' , 'something went wrong')
					->withErrors($validator)->withInput();

	}

	public function postDestroy() {
		$product = Product::find(Input::get('id'));

		if ($product) {
			// the below line actually deletes the file from the folder.
			File::delete('public/'.$product->image);
			$product->delete();
			return Redirect::to('admin/products/index')
			    ->with('message' , 'Product Deleted');
		}

		return Redirect::to('admin/products/index')
		       ->with('message' , 'Something went wrong please try again');
		}

	public function postToggleAvailability() {
		$product = Product::find(Input::get('id'));

		if ($product) {
			$product->availability = Input::get('availability');
			$product->save();
			return Redirect::to('admin/products/index')->with('message' , 'product updated');
		}

		return Redirect::to('admin/products/index')->with('message' , 'Invalid product');
	}	

}

?>