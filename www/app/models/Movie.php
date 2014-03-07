<?php

class Movie extends \Eloquent {
    protected $fillable = [ 'id', 'title', 'title_sort', 'summary', 'plex_id', 'section_id' ];
}