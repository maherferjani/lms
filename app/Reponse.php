<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TestAnswer
 *
 * @package App
 * @property string $question
 * @property string $option
 * @property tinyInteger $correct
*/
class Reponse extends Model
{
    protected $fillable = ['user_id', 'test_id', 'question_id', 'option_id', 'correct'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
