<?php

namespace App;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FirstModule extends Model
{
    use ModelTree, AdminBuilder, SoftDeletes;

	protected $fillable = ['article_id', 'status', 'parent_id', 'order', 'language_id'];

	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at','updated_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'first_modules';

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTitleColumn('article_id');
    }

   public function language()
    {
        return $this->belongsTo('App\Language','language_id');
    }

    public function article()
    {
        return $this->hasOne('App\Article','id');
    }
}