<?php

namespace App\Consumer;

use Illuminate\Support\Facades\Log;

class GutendexConsumer extends BaseConsumer
{
    protected $url = 'books/';
    private $page;
    private $result;

    public function __construct($page)
    {
        $this->page = $page;
        $this->all();
    }

    public function hasMorePages()
    {
        if (!$this->result)
            $this->all();
        if ($this->result)
            return !empty($this->result->next);
        return false;
    }

    public function all()
    {
        $this->result = $this->get("?page=$this->page");
        return $this;
    }

    public function getResults()
    {
        if (!empty($this->result))
            $this->all();
        if (!empty($this->result) && !empty($this->result->results))
            return $this->result->results;
        Log::error(json_encode($this->result));
        return [];
    }
}
