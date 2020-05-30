<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 *
 * @package App
 * @property string $title
*/
class Test extends Model
{
    protected $fillable = ['user_id', 'result', 'qcm_id'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function qcm(){
        return $this->belongsTo(Qcm::class, 'qcm_id');
    }
}
