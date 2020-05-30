<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionsOption
 *
 * @package App
 * @property string $question
 * @property string $option
 * @property tinyInteger $correct
*/
class QuestionsOption extends Model
{
    protected $fillable = ['option', 'correct', 'question_id'];

    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

}
