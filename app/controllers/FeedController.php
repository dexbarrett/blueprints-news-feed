<?php

class FeedController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news_raw = Feed::whereActive(1)
			->whereCategory('News')
			->get();

		$sports_raw = Feed::whereActive(1)
			->whereCategory('Sports')
			->get();
			
		$tech_raw = Feed::whereActive(1)
			->whereCategory('Technology')
			->get();

		return View::make('index')
			->with('categories', array(
								'news' => $news_raw,
								'sports' => $sports_raw,
								'technology' => $tech_raw
								)
			);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('create_feed');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), Feed::$form_rules);

		if ($validation->fails()) {
			return Redirect::route('feed.create')
				->withInput()
				->with('message', $validation->errors()->first());
		}

		$create = Feed::create(Input::all());

		if ($create) {
			return Redirect::route('feed.create')
				->with('message', 'The feed was added successfully!');
		}

		return Redirect::route('feed.create')
			->withInput()
			->with('message', 'The feed could not be added. Please try again later.');
	}

}