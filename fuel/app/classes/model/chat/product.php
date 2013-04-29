<?php

class Model_Chat_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'chat_id',
		'product_id',
		'description',
		'created_at',
		'updated_at',
	);


	protected static $_belongs_to = array(
		'chat' => array(
			'key_from' => 'chat_id',
			'model_to' => 'Model_Chat',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_one = array(
		'product' => array(
			'key_from' => 'product_id',
			'model_to' => 'Model_Product',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);

	protected static $_has_many = array(
		'votes' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Chat_Product_Vote',
			'key_to' => 'chat_product_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		)
	);


	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);


	public function total_upvotes()
	{
		return Model_Chat_Product_Vote::query()->where('chat_product_id', $this->id)->where('vote', '1')->count();
	}

	public function total_downvotes()
	{
		return Model_Chat_Product_Vote::query()->where('chat_product_id', $this->id)->where('vote', '0')->count();
	}

	public function get_likes()
	{
		return Model_Chat_Product_Vote::query()->where('chat_product_id', $this->id)->where('vote', '1')->get();
	}

	public function get_dislikes()
	{
		return Model_Chat_Product_Vote::query()->where('chat_product_id', $this->id)->where('vote', '0')->get();
	}


	public function list_user_likes()
	{
		return $this->format_user_votes($this->get_likes());
	}

	public function list_user_dislikes()
	{
		return $this->format_user_votes($this->get_dislikes());
	}

	private function format_user_votes($votes)
	{
		$names = '';
		foreach ($votes as $vote)
		{
			$names.= $vote->user->display_name() . '<br>';
		}
		return $names;
	}


	public function has_user_voted($user_id)
	{
		$total = Model_Chat_Product_Vote::query()->where('chat_product_id', $this->id)->where('user_id', $user_id)->count();
		return $total > 0;
	}

	public function like($user_id)
	{
		return Model_Chat_Product_Vote::create_like($this->id, $user_id);
	}

	public function dislike($user_id)
	{
		return Model_Chat_Product_Vote::create_dislike($this->id, $user_id);
	}

}