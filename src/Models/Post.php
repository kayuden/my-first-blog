<?php

namespace Src\Models;

use DateTime;

class Post extends Model {

    public int $id;
    public int $author_id;
    public string $title;
    public string $chapo;
    public string $content;
    public string $creation_date;

    protected  $table = 'posts';

    public function getCreationDate(): string
    {
        return $date = (new DateTime($this->creation_date))->format('d/m/Y à H:i');
    }
}