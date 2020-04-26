<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailContact extends Model
{
    use Queueable, SerializesModels;
 
    protected $content;
    protected $viewStr;
 
    public function __construct($content, $viewStr = 'to')
    {
        $this->content = $content;
        $this->viewStr = $viewStr;
    }
 
    public function build()
    {
        return $this->text('emails.'.$this->viewStr)
            ->to($this->content['to'], $this->content['to_name'])
            ->from($this->content['from'], $this->content['from_name'])
            ->subject($this->content['subject'])
            ->with([
                'content' => $this->content,
            ]);
    }
}
