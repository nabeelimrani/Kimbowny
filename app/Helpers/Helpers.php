<?php
use Illuminate\Support\Facades\Mail;


 function authfilter($field)
{
  return auth()->user()->$field??old($field);
}
function sendEmail($reciever,$header,$content)
{
  $to = $reciever;
  $subject = $header;
  $message = $content;

  return Mail::raw($message, function ($m) use ($to, $subject) {
    $m->to($to)->subject($subject);
  });
}



