<?php

class Service_Email
{
	public static function send($attr)
	{
		// valid $attr['type'] [invite,register,password_reset]

		if (empty($attr['from_name']))
		{
			$attr['from_name'] = $attr['from_addr'];
		}

		if (empty($attr['to_name']))
		{
			$attr['to_name'] = $attr['to_addr'];
		}

		// $email = Email::forge();
		// $email->from($attr['from_addr'], $attr['from_name']);
		// $email->to($attr['to_addr'], $attr['to_name']);
		// $email->subject($attr['subject']);
		// $email->html_body($attr['body']);
		// $email->send();

		$message = array(
			'subject'    => $attr['subject'],
			'from_email' => $attr['from_addr'],
			'from_name'  => $attr['from_name'],
			'to' => array(
				array('email'  => $attr['to_addr'], 'name'   => $attr['to_name'])
			),
			'html'       => $attr['body'],
		);

		$mandrill = new Mandrill('TuKwIsrSRAh7nwWiWVXZyQ');
		$mandrill->messages->send($message, true);

		$log = Service_Email_Log::log_event(array(
			'type'      => $attr['type'],
			'to_name'   => $attr['to_name'],
			'to_addr'   => $attr['to_addr'],
			'from_name' => $attr['from_name'],
			'from_addr' => $attr['from_addr'],
			'subject'   => $attr['subject'],
			'body'      => $attr['body'],
		));

	}
}