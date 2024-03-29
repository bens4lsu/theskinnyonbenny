<?php
/***********************************************************************

  Copyright (C) 2002-2005  Rickard Andersson (rickard@punbb.org)

  This file is part of PunBB.

  PunBB is free software; you can redistribute it and/or modify it
  under the terms of the GNU General Public License as published
  by the Free Software Foundation; either version 2 of the License,
  or (at your option) any later version.

  PunBB is distributed in the hope that it will be useful, but
  WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston,
  MA  02111-1307  USA

************************************************************************/


// Make sure no one attempts to run this script "directly"
if (!defined('PUN'))
	exit;


//
// Validate an e-mail address
//
function is_valid_email($email)
{
	return preg_match('#^.{1,}@.{2,}\..{2,}$#', $email);
}


//
// Check if $email is banned
//
function is_banned_email($email)
{
	global $db, $pun_bans;

	foreach ($pun_bans as $cur_ban)
	{
		if ($cur_ban['email'] != '' &&
			($email == $cur_ban['email'] ||
			(strpos($cur_ban['email'], '@') === false && stristr($email, '@'.$cur_ban['email']))))
			return true;
	}

	return false;
}


//
// Wrapper for PHP's mail()
//
function pun_mail($to, $subject, $message, $from = '')
{
	global $pun_config, $lang_common;

	// Default sender/return address
	if (!$from)
		$from = '"'.$pun_config['o_board_title'].' '.$lang_common['Mailer'].'" <'.$pun_config['o_webmaster_email'].'>';

	// Make sure the from line doesn't contain a colon (the character, that is :D)
	$from = str_replace(':', ' ', $from);

	// Detect what linebreak we should use for the headers
	if (strtoupper(substr(PHP_OS, 0, 3) == 'WIN'))
		$eol = "\r\n";
	else if (strtoupper(substr(PHP_OS, 0, 3) == 'MAC'))
		$eol = "\r";
	else
		$eol = "\n";

	$headers = 'From: '.$from.$eol.'Date: '.date('r').$eol.'MIME-Version: 1.0'.$eol.'Content-transfer-encoding: 8bit'.$eol.'Content-type: text/plain; charset='.$lang_common['lang_encoding'].$eol.'X-Mailer: PunBB Mailer';

	// Make sure all linebreaks are CRLF in message
	$message = str_replace("\n", "\r\n", pun_linebreaks($message));

	if ($pun_config['o_smtp_host'] != '')
		smtp_mail($to, $subject, $message, $headers);
	else
		mail($to, $subject, $message, $headers);
}


//
// This function was originally a part of the phpBB Group forum software phpBB2 (http://www.phpbb.com).
// They deserve all the credit for writing it. I made small modifications for it to suit PunBB and it's coding standards.
//
function server_parse($socket, $expected_response)
{
	$server_response = '';
	while (substr($server_response, 3, 1) != ' ')
	{
		if (!($server_response = fgets($socket, 256)))
			error('Couldn\'t get mail server response codes. Please contact the forum administrator.', __FILE__, __LINE__);
	}

	if (!(substr($server_response, 0, 3) == $expected_response))
		error('Unable to send e-mail. Please contact the forum administrator with the following error message reported by the SMTP server: "'.$server_response.'"', __FILE__, __LINE__);
}


//
// This function was originally a part of the phpBB Group forum software phpBB2 (http://www.phpbb.com).
// They deserve all the credit for writing it. I made small modifications for it to suit PunBB and it's coding standards.
//
function smtp_mail($to, $subject, $message, $headers = '')
{
	global $pun_config;

	$recipients = explode(',', $to);

	// Are we using port 25 or a custom port?
	if (strpos($pun_config['o_smtp_host'], ':') !== false)
		list($smtp_host, $smtp_port) = explode(':', $pun_config['o_smtp_host']);
	else
	{
		$smtp_host = $pun_config['o_smtp_host'];
		$smtp_port = 25;
	}

	if (!($socket = fsockopen($smtp_host, $smtp_port, $errno, $errstr, 15)))
		error('Could not connect to smtp host "'.$pun_config['o_smtp_host'].'" ('.$errno.') ('.$errstr.')', __FILE__, __LINE__);

	server_parse($socket, '220');

	if ($pun_config['o_smtp_user'] != '' && $pun_config['o_smtp_pass'] != '')
	{
		fwrite($socket, 'EHLO '.$smtp_host."\r\n");
		server_parse($socket, '250');

		fwrite($socket, 'AUTH LOGIN'."\r\n");
		server_parse($socket, '334');

		fwrite($socket, base64_encode($pun_config['o_smtp_user'])."\r\n");
		server_parse($socket, '334');

		fwrite($socket, base64_encode($pun_config['o_smtp_pass'])."\r\n");
		server_parse($socket, '235');
	}
	else
	{
		fwrite($socket, 'HELO '.$smtp_host."\r\n");
		server_parse($socket, '250');
	}

	fwrite($socket, 'MAIL FROM: <'.$pun_config['o_webmaster_email'].'>'."\r\n");
	server_parse($socket, '250');

	$to_header = 'To: ';

	@reset($recipients);
	while (list(, $email) = @each($recipients))
	{
		fwrite($socket, 'RCPT TO: <'.$email.'>'."\r\n");
		server_parse($socket, '250');

		$to_header .= '<'.$email.'>, ';
	}

	fwrite($socket, 'DATA'."\r\n");
	server_parse($socket, '354');

	fwrite($socket, 'Subject: '.$subject."\r\n".$to_header."\r\n".$headers."\r\n\r\n".$message."\r\n");

	fwrite($socket, '.'."\r\n");
	server_parse($socket, '250');

	fwrite($socket, 'QUIT'."\r\n");
	fclose($socket);

	return true;
}
