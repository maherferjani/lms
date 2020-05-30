<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Topic
 *
 * @package App
 * @property string $title
*/
class Qcm extends Model
{
    protected $fillable = ['title'];
    public function questions()
    {
        return $this->hasMany(Question::class, 'qcm_id');
    }
    public function formation(){
        return $this->belongsTo(Formation::class, 'formation_id');
    }
}
